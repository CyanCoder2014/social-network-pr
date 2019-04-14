<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'names' => ['setting' => 'تنظیمات سایت',
//        'service1'=> 'خدمات 1',
        'service2'=> 'اهداف باشگاه انرژی ', //service2
        'service3'=> 'خدمات باشگاه ', //service3
        'about_us'=> 'درباره ما',
//        'skill'=> 'مهارت ها',
        'slider'=> 'اسلایدر',
        'slider_2'=> 'اسلایدر صفحه اصلی (بالا)',
        'slider_3'=> 'اسلایدر صفحه اصلی (وسط)',
//        'team' => 'گروه ما',
//        'customers' => 'مشتریان ما',
        'contact' => 'تماس با ما',
        'footer_title' => 'عناوین فوترها',
        'footer_1' => 'فوتر1',
        'footer_2' => 'فوتر 2',
        'footer_3' => 'فوتر3',
        'faq' => 'فکت'

    ],
    'types' => [
        'setting',
//        'service1',
        'service2',
        'service3',
        'about_us',
//        'skill',
        'slider',
        'slider_2',
        'slider_3',
//        'team',
//        'customers',
        'contact',
        'contact' ,
        'footer_title',
        'footer_1',
        'footer_2' ,
        'footer_3',
        'faq'
    ],
    'forms' => [             //  name       type            label
        'setting' => [
                        'title_fa' => ['type'=>'text','label'=>'نام سایت فارسی','style'=>null,'values' => array()],
                        'title' => ['type'=>'text','label'=>'نام سایت انگلیسی','style'=>null,'values' => array()],
//                        'name1_fa' => ['type'=>'text','label'=>'قسمت اول نام شرکت فارسی','style'=>null,'values' => array()],
//                        'name2_fa' => ['type'=>'text','label'=>'قسمت دوم نام شرکت فارسی','style'=>null,'values' => array()],
//                        'name1' => ['type'=>'text','label'=>'قسمت اول نام شرکت انگی','style'=>null,'values' => array()],
//                        'name2' => ['type'=>'text','label'=>'قسمت دوم نام شرکت فارسی','style'=>null,'values' => array()],
                        'image' => ['type'=>'file','label'=>'لوگو شرکت','style'=>null,'values' => array()],
//                        'banner' => ['type'=>'file','label'=>'بنر بالای صفحه','style'=>null,'values' => array()],
                        'about_us' => ['type'=>'text','label'=>'درباره ما فوتر انگلیسی','style'=>null,'values' => array()],
                        'about_us_fa' => ['type'=>'text','label'=>'درباره ما فوتر فارسی','style'=>null,'values' => array()],
        ],
        'slider' => [   'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
                        'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
//                        'image' => ['type'=>'file','label'=>'عکس اسلایدر','style'=>null,'values' => array()],
                        'description_fa' => ['type'=>'textarea','label'=>'توضیحات فارسی','style'=>null,'values' => array()],
                        'description' => ['type'=>'textarea','label'=>'توضیحات انگلیسی','style'=>null,'values' => array()],
                        'button1_fa' => ['type'=>'text','label'=>'متن دکمه 1 فارسی','style'=>null,'values' => array()],
                        'button1' => ['type'=>'text','label'=>'متن دکمه 1 انگلیسی','style'=>null,'values' => array()],
                        'link1_fa' => ['type'=>'text','label'=>'لینک دکمه 1 فارسی','style'=>null,'values' => array()],
                        'link1' => ['type'=>'text','label'=>'لینک دکمه 1 انگلیسی','style'=>null,'values' => array()],
                        'button2_fa' => ['type'=>'text','label'=>'متن دکمه 2 فارسی','style'=>null,'values' => array()],
                        'button2' => ['type'=>'text','label'=>'متن دکمه 2 انگلیسی','style'=>null,'values' => array()],
                        'link2_fa' => ['type'=>'text','label'=>'لینک دکمه 2 فارسی','style'=>null,'values' => array()],
                        'link2' => ['type'=>'text','label'=>'لینک دکمه 2 انگلیسی','style'=>null,'values' => array()]
        ],
        'slider_2' => [
                        'image' => ['type'=>'file','label'=>'لوگو اسلایدر','style'=>null,'values' => array()],
                        'intro1' => ['type'=>'text','label'=>'توضیحات 1 ','style'=>null,'values' => array()],
                        'intro2' => ['type'=>'text','label'=>'توضیحات 2 ','style'=>null,'values' => array()],
                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','style'=>null,'values' => array()],
                        'link' => ['type'=>'text','label'=>'لینک انگلیسی','style'=>null,'values' => array()]
        ],
        'slider_3' => [
            'image' => ['type'=>'file','label'=>'لوگو اسلایدر','style'=>null,'values' => array()],
            'link_fa' => ['type'=>'text','label'=>'لینک فارسی','style'=>null,'values' => array()],
            'link' => ['type'=>'text','label'=>'لینک انگلیسی','style'=>null,'values' => array()]
        ],
        'service2' => [ 'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
            'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
            'image' => ['type'=>'file','label'=>'لوگو','style'=>null,'values' => array()],
            'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','style'=>null,'values' => array()],
            'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','style'=>null,'values' => array()],
//                        'link' => ['type'=>'text','label'=>'لینک انگلیسی','style'=>null,'values' => array()],
//                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','style'=>null,'values' => array()]
        ],

        'service3' => [ 'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
            'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
            'image' => ['type'=>'file','label'=>'لوگو','style'=>null,'values' => array()],
            'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','style'=>null,'values' => array()],
            'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','style'=>null,'values' => array()],
//                        'link' => ['type'=>'text','label'=>'لینک انگلیسی','style'=>null,'values' => array()],
//                        'link_fa' => ['type'=>'text','label'=>'لینک فارسی','style'=>null,'values' => array()]
        ],
        'about_us' => [ 'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
                        'image' => ['type'=>'file','label'=>'لوگو','style'=>null,'values' => array()],
                        'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','style'=>null,'values' => array()],
                        'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','style'=>null,'values' => array()],
                        'button_fa' => ['type'=>'text','label'=>'متن دکمه فارسی','style'=>null,'values' => array()],
                        'button' => ['type'=>'text','label'=>'متن دکمه انگلیسی','style'=>null,'values' => array()],
                        'link_fa' => ['type'=>'text','label'=>'لینک دکمه فارسی','style'=>null,'values' => array()],
                        'link' => ['type'=>'text','label'=>'لینک دکمه انگلیسی','style'=>null,'values' => array()],
        ],
        'footer_1' =>   [
                            'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
                            'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
                            'link_fa' => ['type'=>'text','label'=>'لینک فارسی','style'=>null,'values' => array()],
                            'link' => ['type'=>'text','label'=>'لینک انگلیسی','style'=>null,'values' => array()],
        ],
        'footer_2' =>   [
                            'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
                            'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
                            'link_fa' => ['type'=>'text','label'=>'لینک فارسی','style'=>null,'values' => array()],
                            'link' => ['type'=>'text','label'=>'لینک انگلیسی','style'=>null,'values' => array()],
        ],
        'footer_3' =>   [
                            'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
                            'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
                            'link_fa' => ['type'=>'text','label'=>'لینک فارسی','style'=>null,'values' => array()],
                            'link' => ['type'=>'text','label'=>'لینک انگلیسی','style'=>null,'values' => array()],
        ],
        'footer_title' =>   [
                            'title1' => ['type'=>'text','label'=>'عنوان فوتر 1 انگلیسی','style'=>null,'values' => array()],
                            'title1_fa' => ['type'=>'text','label'=>'عنوان فوتر 1 فارسی','style'=>null,'values' => array()],
                            'title2' => ['type'=>'text','label'=>'عنوان فوتر 2 انگلیسی','style'=>null,'values' => array()],
                            'title2_fa' => ['type'=>'text','label'=>'عنوان فوتر 2 فارسی','style'=>null,'values' => array()],
                            'title3' => ['type'=>'text','label'=>'عنوان فوتر 3 انگلیسی','style'=>null,'values' => array()],
                            'title3_fa' => ['type'=>'text','label'=>'عنوان فوتر 3 فارسی','style'=>null,'values' => array()],
        ],
//        'customers' => ['name' => ['type'=>'text','label'=>'نام انگلیسی','style'=>null,'values' => array()],
//                        'name_fa' => ['type'=>'text','label'=>'نام فارسی','style'=>null,'values' => array()],
//                        'c_name' => ['type'=>'text','label'=>'نام شرکت انگلیسی','style'=>null,'values' => array()],
//                        'c_name_fa' => ['type'=>'text','label'=>'نام شرکت فارسی','style'=>null,'values' => array()],
//                        'image' => ['type'=>'file','label'=>'عکس','style'=>null,'values' => array()],
//                        'description' => ['type'=>'text','label'=>'توضیحات انگلیسی','style'=>null,'values' => array()],
//                        'description_fa' => ['type'=>'text','label'=>'توضیحات فارسی','style'=>null,'values' => array()],
//        ],
        'contact' => [  'email' => ['type'=>'text','label'=>'پست الکترونیک','style'=>null,'values' => array()],
                        'phone' => ['type'=>'text','label'=>'شماره تلفن','style'=>null,'values' => array()],
                        'description' => ['type'=>'textarea','label'=>'توضیحات انگلیسی تماس باما','style'=>null,'values' => array()],
                        'description_fa' => ['type'=>'textarea','label'=>'توضیحات فارسی تماس باما','style'=>null,'values' => array()],
                        'mobile' => ['type'=>'text','label'=>'شماره همراه','style'=>null,'values' => array()],
                        'adress' => ['type'=>'text','label'=>'ادرس انگلیسی','style'=>null,'values' => array()],
                        'adress_fa' => ['type'=>'text','label'=>'ادرس فارسی','style'=>null,'values' => array()],
                        'twitter_link' => ['type'=>'text','label'=>'لینک توئیتر','style'=>null,'values' => array()],
                        'linkedin_link' => ['type'=>'text','label'=>'لینک لینکیداین','style'=>null,'values' => array()],
                        'instagram_link' => ['type'=>'text','label'=>'لینک اینستاگرام','style'=>null,'values' => array()]
        ],
        'faq' => [
                        'text' => ['type'=>'textarea','label'=>'متن','style'=>null,'values' => array()],
                        'subtitle' => ['type'=>'text','label'=>'زیرنویس متن','style'=>null,'values' => array()],

        ],
//        'skill' => [    'title' => ['type'=>'text','label'=>'عنوان انگلیسی','style'=>null,'values' => array()],
//                        'title_fa' => ['type'=>'text','label'=>'عنوان فارسی','style'=>null,'values' => array()],
//                        'number' => ['type'=>'text','label'=>'تعداد','style'=>null,'values' => array()]
//        ]

    ],
    'addable' => ['setting' => false,
//        'service1'=> false,
        'service2'=> false,
        'service3'=> false,
        'about_us'=> true,
//        'skill'=> false,
        'slider'=> true,
        'slider_2'=> true,
        'slider_3'=> true,
//        'team' => true,
//        'customers' => true,
        'contact' => false,
        'footer_title' => true,
        'footer_1' => true,
        'footer_2' => true,
        'footer_3' => true,
        'faq' => true
    ]



];
