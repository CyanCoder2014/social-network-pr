@if($post->intro != '...')


    <?php
    $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
    $string = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', nl2br($post->intro));
    echo $string;                        ?>


@endif
<br>

@if($post->text != 'null')
    {!!$post->text!!}
@endif