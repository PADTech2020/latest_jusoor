<?php
$newsTab = get_recent_posts(10);
?>
<div class="ticker__container">
    <div class="breaking-news">{{__('أحدث المواد')}}</div>
    <div class="container">
        <div class="ticker__viewport" style="">
            <ul class="ticker__list" data-ticker="list">
                @foreach($newsTab as $post)
                <li class="ticker__item" data-ticker="item" style="direction:rtl">
                    <span class="time-news" style='margin-left: 20px'><img width="25px" height="20px" style="background: #ffffff;"
                                                                      src="/storage/general/logo-preview.png"
                                                                      alt="jusoor logo"></span >
                    <a href="{{$post->url}}"> {{ $post->name }}</a>
                </li>
              @endforeach
            </ul>
        </div>
    </div>
</div>
