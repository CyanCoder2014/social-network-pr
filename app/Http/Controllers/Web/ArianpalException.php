<?php

namespace Larabookir\Gateway\Arianpal;



class ArianpalException extends \Exception
{
    public static $errors = array(
        'Ready' => 'هیچ عملیاتی  انجام  نشده  است',
        'NotMatchMoney' => 'مبلغ واریزی با مبلغ درخواستی یکسان نمی باشد',
        'Verifyed' => 'قبلا پرداخت شده است',
        'InvalidRef' => 'شماره رسید قابل قبول نیست',
        'Success' => 'پرداخت انجام شد',
    );

    public function __construct($errorId)
    {

        parent::__construct(self::$errors[$this->errorId].' #'.$this->errorId, $this->errorId);
    }
}
