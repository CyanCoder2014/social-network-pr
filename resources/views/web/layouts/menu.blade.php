<?php
    if($menu->type == 2 || $menu->type == 3 || $menu->children->count() > 0 )
        $nested=true;
    else
        $nested=false;
?>
<li class="dropdown-submenu">
    <a class="test" tabindex="-1" href="{!! $menu->link_maker(App::getLocale()) !!}">{{ $menu->name[App::getLocale()] }} <span class="caret"></span></a>
    <ul class="dropdown-menu special-color">

        @if($menu->type != 1)
            @foreach($menu->items() as $item)
                <li><a href="{{$item->link()}}" >

                        @if(App::getLocale() == 'en')
                            {{$item->title}}
                        @elseif(App::getLocale() == 'fa')
                            {{$item->title_fa}}
                        @endif

                    </a></li>
            @endforeach
            @foreach($menu->children as $child)
                @include('layouts.menu',['menu'=> $child])
            @endforeach
        @endif
    </ul>
</li>
