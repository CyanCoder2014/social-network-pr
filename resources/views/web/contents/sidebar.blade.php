
<div class="col-sm-3 col-xs-12">
    <div class="sidebar">
        <div class="search_widget">
            <form name="search_form" method="get"  class="search_form" >
                <input name="s" value="" placeholder="جستجو" type="text" style="display: block;
                                                                                                width: 100%;
                                                                                                background: #fff;
                                                                                                text-shadow: none;
                                                                                                font-size: 14px;
                                                                                                line-height: 20px;
                                                                                                color: #666666;
                                                                                                font-weight: 300;
                                                                                                padding: 6px 15px 7px 15px;
                                                                                                border: 1px #bfbfbf solid;
                                                                                                border-radius: 17px;
                                                                                                -webkit-border-radius: 17px;
                                                                                                margin: 0 0 20px 0;
                                                                                                -webkit-appearance: none !important;
                                                                                                outline: none;">
                <input value="برو" type="submit" style="cursor: pointer;
                                                                        background-color: transparent !important;
                                                                        margin: 0 !important;
                                                                        padding: 0 !important;
                                                                        height: 17px !important;
                                                                        width: 17px !important;
                                                                        border: none !important;
                                                                        box-shadow: none !important;
                                                                        line-height: 17px !important;
                                                                        text-decoration: none;
                                                                        display: block;
                                                                        text-indent: -9999px;
                                                                        position: absolute;
                                                                        top: 9px;
                                                                        right: 13px;
                                                                        z-index: 10;
                                                                        background-color: transparent;
                                                                        background-image: url(../img/sprite.png);
                                                                        background-repeat: no-repeat;
                                                                        background-position: -83px 0;">
            </form>
        </div>
        <div class="widget">
            <h2>اخبار   </h2>
            <div class="title_br"></div>
            <ul>
                @foreach($content_11 as $content_11)
                    <li><a href="<?= Url('/content/'.$content_11->id); ?>">
                            @if(App::getLocale() == 'en')
                                {{$content_11->title}}
                            @elseif(App::getLocale() == 'fa')
                                {{$content_11->title_fa}}
                            @endif</a></li>
                @endforeach
                @foreach($content_22 as $content_22)
                    <li><a href="<?= Url('/content/'.$content_22->id); ?>">
                            @if(App::getLocale() == 'en')
                                {{$content_22->title}}
                            @elseif(App::getLocale() == 'fa')
                                {{$content_22->title_fa}}
                            @endif</a></li>
                @endforeach

            </ul>
        </div>
        <div class="widget">
            <h2>  مقالات</h2>
            <div class="title_br"></div>
            <ul>
                @foreach($content_19 as $content_19)
                    <li><a href="<?= Url('/content/'.$content_19->id); ?>">@if(App::getLocale() == 'en')
                                {{$content_19->title}}
                            @elseif(App::getLocale() == 'fa')
                                {{$content_19->title_fa}}
                            @endif</a></li>
                @endforeach
            </ul>
        </div>




        <div class="widget">
            <h2>برچسب ها</h2>
            <br>
            <div class="title_br"></div>
            <ul class="tag">
                <li><a href="">تست</a></li>
                <li><a href="">تست</a></li>

            </ul>
        </div>

    </div>
</div>
