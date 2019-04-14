<?php

namespace App\Http\Controllers\Web;

use App\Transaction;
use config\Enum;
use http\Exception\BadMethodCallException;
use Illuminate\Database\Eloquent\Model;
use Larabookir\Gateway\Arianpal\ArianpalException;

class ArianPalController extends TransactionController
{
    protected $serverUrl='http://merchant.arianpal.com/WebService.asmx?wsdl';
    protected $callbackUrl;
    protected $description;
    protected $returnPath='/';

    /**
     * Payer Email Address
     *
     * @var string
     */
    public $email;

    /**
     * Payer Mobile Number
     *
     * @var string
     */
    public $mobileNumber;
    /**
     * Payer paymenter
     *
     * @var string
     */
    public $paymenter;
    /**
     * Payer reponse Number
     *
     * @var string
     */
    public $resnumber;
    /**
     * URL PaymentPath
     *
     * @var string
     */
    protected $paypath;

    /**
     * Address of gate for redirect
     *
     * @var string
     */
    public function __construct(Transaction $transaction = null)
    {
        $this->port = Enum::ARIANPAL;
        $this->setCallback(route('arianal.verify'));
        parent::__construct($transaction);
    }

    public function ready() {
        $fields = array(
            'MerchantID' => config('IRTransaction.arianpal.merchant-id'),
            'Password' => config('IRTransaction.arianpal.password'),
            'Price' => $this->transaction->price,
            'ReturnPath' => $this->getCallback(),
            'ResNumber' => $this->resnumber ? $this->resnumber : config('IRTransaction.arianpal.resnumber', ''),
            'Paymenter' => $this->paymenter ? $this->paymenter : config('IRTransaction.arianpal.paymenter', ''),
            'Description' => $this->description ? $this->description : config('IRTransaction.arianpal.description', ''),
            'Email' => $this->email ? $this->email :config('IRTransaction.arianpal.email', ''),
            'Mobile' => $this->mobileNumber ? $this->mobileNumber : config('IRTransaction.arianpal.mobile', ''),
        );

        try {
            $soap = new \SoapClient($this->serverUrl, ['encoding' => 'UTF-8']);
            $response = $soap->RequestPayment($fields);
            $this->paypath = $response->RequestPaymentResult->PaymentPath;
            $Status = $response->RequestPaymentResult->ResultStatus;

        } catch (\SoapFault $e) {
            $this->transactionFailed();
            $this->newLog('SoapFault', $e->getMessage());
            throw $e;
        }

        if ($Status != 'Succeed') {
            $this->transactionFailed();
            $this->newLog($Status, $Status);
            throw new BadMethodCallException($Status);
        }

        return true;

    }
    public function go(){
        return redirect($this->paypath);
    }
    public function verify() {
        if (!isset($_POST['status']) or $_POST['status'] != 100) {
            $this->transactionFailed();
            $this->newLog($_POST['status'], 'انصراف از پرداخت ، اطلاعات پرداخت دریافت نگردید');
            throw new BadMethodCallException('انصراف از پرداخت ، اطلاعات پرداخت دریافت نگردید');

        }
        $Refnumber = $_POST['refnumber'];
        $this->transaction->ref_id = $Refnumber;
        $this->transaction->save();
        $fields = array(
            'MerchantID' => config('IRTransaction.arianpal.merchant-id'),
            'Password' => config('IRTransaction.arianpal.password'),
            'Price' => intval($this->transaction->price),
            'RefNum' => $Refnumber,
        );

        try {
            $soap = new \SoapClient($this->serverUrl, ['encoding' => 'UTF-8']);
            $response = $soap->PaymentVerification($fields);
            $Status = $response->verifyPaymentResult->ResultStatus;
            $PayPrice = $response->verifyPaymentResult->PayementedPrice;

        } catch (\SoapFault $e) {
            $this->transactionFailed();
            $this->newLog('SoapFault', $e->getMessage());
            throw $e;
        }

        switch ($Status){
            case 'NotMatchMoney':
                $this->transactionFailed();
                $this->newLog($Status, ArianpalException::$errors[$Status]);
                throw new ArianpalException($Status);
            case 'Success':
                $this->trackingCode = $Refnumber;
                $this->transactionSucceed();
                $this->newLog($Status, Enum::TRANSACTION_SUCCEED_TEXT);
                break;
            case 'Verifyed':
                $this->trackingCode = $Refnumber;
                $this->transactionSucceed();
                $this->newLog($Status, Enum::TRANSACTION_SUCCEED_TEXT);
                break;
            case 'InvalidRef':
                $this->transactionFailed();
                $this->newLog($Refnumber, ArianpalException::$errors[$Status]);
                throw new ArianpalException($Status);
            case 'Ready':
                $this->newLog($Status, ArianpalException::$errors[$Status]);
                throw new ArianpalException($Status);
        }
        return true;
    }
}
