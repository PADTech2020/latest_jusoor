<?php
$cats_color = [
    'home',
    'nedaa',
    'home',
    'nedaa',
    'home',
    'nedaa',
    'home',
    'nedaa',
    'home',
    'nedaa',
    'home',
    'nedaa',
    'home',
    'nedaa',
    'home',
    'nedaa',
    'home',
    'nedaa',
];
$counter = 0;
?>
<nav class="mainmenu">
    <div class="header_links">
        <ul>
            <li class="header_links_item share"><a href="/"> {{__('شارك قصتك')}}</a></li>
            <li class="header_links_item join"><a href="/"> {{__('انضم الى فريقنا')}}</a></li>
            {{--<li class="header_links_item trends" >{{__('تريند')}}</li>--}}
        </ul>
    </div>
    <ul {!! $options !!}>
        @foreach ($menu_nodes as $key => $row)
        <li class="{{ $row->css_class }} @if ($row->url == Request::url()) current @endif  @if ($row->has_child) drop @endif">
            <a href="{{ $row->url }}" target="{{ $row->target }}" class="{{$cats_color[$counter]}}">
                <i class='{{ trim($row->icon_font) }}'></i> <span>{{ $row->name }}</span>
            </a>
            @if ($row->has_child)
            {!! Menu::generateMenu([
            'slug' => $menu->slug,
            'parent_id' => $row->id,
            'options' => ['class' => 'nav dropdown'],
            ]) !!}
            @endif
        </li>
        <?php $counter++; ?>
        @endforeach

        @if (is_plugin_active('blog'))
        <!-- <li>
            <form class="navbar-form navbar-left" role="search" accept-charset="UTF-8" action="{{ route('public.search') }}" method="GET" >
                <input type="text" id="search" name="search" placeholder="البحث">
                <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
            </form>
        </li> -->

        @endif

    </ul>
    
</nav>