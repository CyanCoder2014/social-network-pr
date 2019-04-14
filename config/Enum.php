<?php


namespace config;

class Enum
{
    const MELLAT = 'MELLAT';
    const SADAD = 'SADAD';
    const ZARINPAL = 'ZARINPAL';
    const ARIANPAL = 'ARIANPAL';
    const PAYLINE = 'PAYLINE';
    const JAHANPAY = 'JAHANPAY';
    const PARSIAN = 'PARSIAN';
    const PASARGAD = 'PASARGAD';
    const SAMAN = 'SAMAN';
    const ASANPARDAKHT = 'ASANPARDAKHT';
    const PAYPAL = 'PAYPAL';
    const PAYIR = 'PAYIR';
    const PORTS=[
        'MELLAT',
       'SADAD',
       'ZARINPAL',
       'ARIANPAL',
       'PAYLINE',
       'JAHANPAY',
       'PARSIAN',
       'PASARGAD',
       'SAMAN',
       'ASANPARDAKHT',
       'PAYPAL',
       'PAYIR',
    ];

    const TRANSACTION_STATUSES = [
        'INIT',
        'SUCCEED',
        'FAILED'
    ];
    const TRANSACTION_DEFAULT= Enum::TRANSACTION_STATUSES[0];
    const TRANSACTION_STATUS_TEXT = [
        'INIT' => 'تراکنش ایجاد شد.' ,
        'SUCCEED' => 'پرداخت با موفقیت انجام شد.',
        'FAILED' => 'عملیات پرداخت با خطا مواجه شد.'
    ];

    /**
     * Status code for status field in poolport_transactions table
     */
    const TRANSACTION_INIT = 'INIT';
    const TRANSACTION_INIT_TEXT = 'تراکنش ایجاد شد.';

    /**
     * Status code for status field in poolport_transactions table
     */
    const TRANSACTION_SUCCEED = 'SUCCEED';
    const TRANSACTION_SUCCEED_TEXT = 'پرداخت با موفقیت انجام شد.';

    /**
     * Status code for status field in poolport_transactions table
     */
    const TRANSACTION_FAILED = 'FAILED';
    const TRANSACTION_FAILED_TEXT = 'عملیات پرداخت با خطا مواجه شد.';

}
