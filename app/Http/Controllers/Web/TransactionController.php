<?php

namespace App\Http\Controllers\Web;

use App\Transaction;
use App\TransactionLog;
use config\Enum;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

abstract class TransactionController
{
    protected $transaction;
    protected $port;
    protected $returnPath;
    public function __construct(Transaction $transaction=null)
    {
        $this->transaction = $transaction;
    }

    public function make($price,Model $model)
    {
        $this->transaction = new Transaction();
        if(!isset($model->id))
            throw new InvalidArgumentException('Transaction Error: Model has no id');
        $this->transaction->refrence_id = $model->id;
        $this->transaction->refrence_type = $model->getMorphClass();
        $this->transaction->ip = Request::ip();
        $this->transaction->port = $this->port;
        $this->transaction->price = $price;
        $this->transaction->save();
        $this->transaction->tracking_code = $this->makeTrackingCode();
        $this->transaction->save();
        Session::put('IRtranaction',$this->transaction->id);


    }

    public static function RetriveTransacton(){
        if(Session::get('IRtranaction')){
            $t = Transaction::findOrFail(Session::get('IRtranaction'));
            return new static($t);
        }
        return null;
    }


    protected function makeTrackingCode(){
        if (!isset($this->transaction->id))
            throw new InvalidArgumentException('Transaction Error: transaction not maked use ->make($price,$model)');
        return Str::random('10').'-'.$this->transaction->id;

    }
    public function getPrice(){
        return $this->transaction->price??null;
    }
    protected function transactionFailed(){
        $this->transaction->status = Enum::TRANSACTION_FAILED;
        $this->transaction->save();
    }
    protected function transactionSucceed(){
        $this->transaction->status = Enum::TRANSACTION_SUCCEED;
        $this->transaction->save();
    }
    protected function newLog($status,$message){
        $log = new TransactionLog();
        $log->transaction_id = $this->transaction->id;
        $log->result_code = $status;
        $log->result_message = $message;
        $log->save();
    }
    public function getId(){
        return $this->transaction->id?? null ;
    }
    public function getCallback(){
        return $this->returnPath;
    }
    protected function setCallback($url){
        $this->returnPath = $url;
    }
    public function getTrackingCode(){
        return $this->transaction->tracking_code?? null ;
    }

}
