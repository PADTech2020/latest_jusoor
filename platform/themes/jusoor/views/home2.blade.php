<?php

$partners = get_partners(12);
$our_news = get_posts_by_category(268, 3);
$vid = get_posts_by_category(274, 4);
$isdarat = get_recent_posts(3);
$mawqif = get_posts_by_category(265, 4);
$infographic = get_posts_by_category(277, 2);
$studies = get_posts_by_category(310, 4);
$translations = get_posts_by_category(328, 4);
$translations2 = get_posts_by_category(340, 4);
$events = get_posts_by_category(332, 4);
$underscope = get_posts_by_category(316, 4);
$analyse = get_posts_by_category(304, 4);
$religious_movements = get_posts_by_category(337, 4);
$book_reviews = get_posts_by_category(336, 2);
$situation_estimate = get_posts_by_category(265, 3);
$info_report = get_posts_by_category(286, 2);
$analytics_map = get_posts_by_category(289, 2);
$Images_sy = get_posts_by_category(271, 5);


$meta = new \Botble\SeoHelper\SeoOpenGraph;
$meta->setImage('https://nedaa-post.com//storage/nedaa-post.jpg');
$meta->setTitle('جسور للدراسات');
$meta->setDescription(theme_option('who_we_are'));
$meta->setUrl('https://nedaa-post.com');
$meta->setType('Website');
$meta->addProperty('site-name', 'جسور للدراسات');

\SeoHelper::setSeoOpenGraph($meta);
?>


{!! do_shortcode('[slider-posts-2][/slider-posts-2]') !!}

        <!--  $situation_estimate -->
<section class="block-wrapper block-4 studies new-dark-style lifestyle m-b-0">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">

            <div class="partners-slider  owl-carousel owl-theme">
                @foreach($studies as $post)

                    <div class=" partners item">
                        <div class="news-post standard-post">
                            <div class="post-gallery box1">
                                <img src="{{ RvMedia::getImageUrl($post->image,'featured') }}" alt="{{$post->name}}">
                                <div class="boxContent">
                                    <p>{{__('دراسات')}}</p>
                                    <h3 class="title"><a href="{{ $post->url }}">{{$post->name}}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
    </div>
</section>


<!-- الإصدارات -->
<section class="block-wrapper block-3 non-sidebar sky-news ">
    <div class="container">

        <!-- block content -->
        <div class="block-content non-sidebar">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="title-section m-r-7">
                        <!-- <h1><span>{{__('الإصدارات')}}</span></h1> -->
                    </div>
                    @foreach($isdarat as $post)
                    <div class="col-md-4 col-sm-6 box5">
                        <div class="topic-title">{{ $post->categories->first()->name }}</div>
                        <img src="{{ RvMedia::getImageUrl($post->image,'featured') }}" alt="{{ $post->name }}">
                        <h3 class="title"><a href="{{ $post->url }}">{{ $post->name }}</a></h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End grid-box -->
    </div>
    <!-- End block content -->
</section>

<!--  $situation_estimate -->
<section class="block-wrapper block-4 new-dark-style lifestyle m-b-0">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(265)}}</span></h1>
            </div>
            <div class="row">
                @foreach($situation_estimate as $post)
                <div class="post post-dark col-lg-4 col-12 col-sm-6 mb-20">
                    <div class="post-wrap">
                        <div id="dark-main-img">
                            <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image ) }}" /></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="title-section">
                <a href=""><h4><span>{{__("more")}}</span></h4></a>
            </div>
        </div>
    </div>
    </div>
</section>


<div class="block-wrapper about">
    <div class="foreground">
        <div class="container">
            <div class="block-content new-dark-style">
                <div class="row">
                    <div class="col-md-8">
<h1 class="light title">{{__('من نحن')}}</h1>
                        <div class="about-text">
                            <p>{{theme_option('who_we_are')}}</p>
                            <div class="button-list"> <a class="button teal" href="/experts/">خبراؤنا</a></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-12">
                        <h1 class="light title">{{__('الجهات المتعاونة')}}</h1>
                        <div class="">

                            @if(count($partners)>0)
                                <div class="partners-slider  owl-carousel owl-theme">
                                    @foreach($partners as $partner)

                                        <div class=" partners item">
                                            <div class="news-post standard-post">
                                                <div class="post-gallery box1">
                                                    <img src="{{ RvMedia::getImageUrl($partner->logo,'item_post') }}" alt="{{$partner->name}}">
                                                    <div class="boxContent">
                                                        <h3 class="title">{{$partner->name}}</h3>
                                                        <ul class="social-icons">
                                                            <li><a target="_blank" href="{{$partner->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a target="_blank" href="{{$partner->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a target="_blank" href="{{$partner->url}}" class="youtube"><i class="fa fa-external-link"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            @endif

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--  $situation_estimate -->
<section class="block-wrapper block-4 new-dark-style lifestyle m-b-0">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{__('Our News')}}</span></h1>
            </div>
            <div class="row">
                @foreach($our_news as $post)
                    <div class="post post-dark col-lg-4 col-12 col-sm-6 mb-20">
                        <div class="post-wrap">
                            <div id="dark-main-img">
                                <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image ) }}" /></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="title-section">
                <a href=""><h4><span>{{__("more")}}</span></h4></a>
            </div>
        </div>
    </div>
    </div>
</section>


<!--  Video -->
<section class="block-wrapper block-vids block-4 new-dark-style lifestyle m-b-0">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>أحدث الفيديوهات</span></h1>
            </div>

            <div class="row col-md-10" style="margin: 0 auto;float:none">
                <div class="col-md-12">
                    @if(count($vid)>0)
                       {!! convertYoutube($vid[0]->youtube_link) !!}
                        @endif
                 </div>
                @foreach($vid as $post)
                    @if($post->youtube_link)<div class="col-md-4">

                        {!! convertYoutube($post->youtube_link) !!}

                </div> @endif
                @endforeach
            </div>
            <div class="title-section col-md-12">
                <a href=""><h4><span>{{__("more")}}</span></h4></a>
            </div>
        </div>
    </div>
    </div>
</section>


<!-- دولي الشرق الأوسط ملفات رأي -->
<section class="block-wrapper block-3 bg-attachment" style="display: none;">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{__('تقرير تحليلي')}}</span></h1>
                            </div>
                            @if(count($analyse)>0)
                            <div class="row">
                                <a href="{{$analyse[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery box3">
                                                <img src="{{ RvMedia::getImageUrl($analyse[0]->image) }}" alt="{{$analyse[0]->name}}">
                                                <div class="box3-layer layer-1"></div>
                                                <div class="box3-layer layer-2"></div>
                                                <div class="box3-layer layer-3"></div>
                                                <div class="box3-content">
                                                    <h4 class="title">{{$analyse[0]->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @php
                            unset($analyse[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach($analyse as $post)
                                <li>
                                    <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                    <div class="post-content">
                                        <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(337)}}</span></h1>
                            </div>
                            @if(count($religious_movements)>0)
                            <div class="row">
                                <a href="{{$religious_movements[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery box3">
                                                <img src="{{ RvMedia::getImageUrl($religious_movements[0]->image) }}" alt="{{$religious_movements[0]->name}}">
                                                <div class="box3-layer layer-1"></div>
                                                <div class="box3-layer layer-2"></div>
                                                <div class="box3-layer layer-3"></div>
                                                <div class="box3-content">
                                                    <h4 class="title">{{$religious_movements[0]->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>@endif
                            @php
                            unset($religious_movements[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($religious_movements as $post)

                                <li>
                                    <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                    <div class="post-content">
                                        <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(328)}}</span></h1>
                            </div>
                            @if(count($translations)>0)
                            <div class="row">
                                <a href="{{$translations[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery box3">
                                                <img src="{{ RvMedia::getImageUrl($translations[0]->image) }}" alt="{{$translations[0]->name}}">
                                                <div class="box3-layer layer-1"></div>
                                                <div class="box3-layer layer-2"></div>
                                                <div class="box3-layer layer-3"></div>
                                                <div class="box3-content">
                                                    <h4 class="title">{{$translations[0]->name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @php
                            unset($translations[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($translations as $post)

                                <li>
                                    <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                    <div class="post-content">
                                        <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End grid-box -->

        </div>
        <!-- End block content -->
    </div>
</section>


<!-- اقتصاد -->
<section class="block-wrapper block-4 features-today" style="display: none;">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="title-section m-r-7">
                    <h1><span>{{__('دراسات')}}</span></h1>
                </div>
                <div class="features-today-box owl-wrapper">
                    <div class="" data-num="4">
                        <div class="uk-section">
                            <div class="uk-container row">
                                @if(count($studies)>0)
                                @foreach($studies as $post)
                                <div class="news-post standard-post col-md-3 col-sm-6">
                                    <a href="{{ $post->url }}">
                                        <div class="post-gallery">
                                            <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{$post->name}}">
                                            <div class="rate-level">
                                                <h3> {{Str::words($post->name, '10')}}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- انفوغرافيك -->
<section class="block-wrapper new-dark-style" style="display: none;">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{__("الخرائط التحليلية")}}</span></h1>
            </div>
            <div class="row">
                <?php $post = $analytics_map[0]; ?>
                @if($post)

                <div class="post post-dark col-lg-6 col-12 mb-20">
                    <div class="post-wrap">
                        <div id="dark-main-img" class="box">
                            <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image) }}" /></a>
                            <div class="box-content">
                                <a href="{{$post->url}}">
                                    <h3 class="title">{{$post->name}}</h3>
                                </a>
                                <a href="{{ $post->categories->last()->url }}"><span class="post">{{ $post->categories->last()->name }}</span></a>
                            </div>
                        </div>


                    </div>
                </div>

                @endif
                <?php $post = $analytics_map[1]; ?>
                @if($post)
                <div class="post post-dark col-lg-6 col-12 mb-20">
                    <div class="post-wrap">
                        <div id="dark-main-img" class="box">
                            <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image , 'post_big_main' ) }}" /></a>
                            <div class="box-content">
                                <a href="{{$post->url}}">
                                    <h3 class="title" style="z-index: 9999;">{{$post->name}}</h3>
                                </a>
                                <a href="{{ $post->categories->last()->url }}"><span class="post">{{ $post->categories->last()->name }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
    </div>
</section>
@if(1==2)
<section class="block-wrapper block-3">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <!-- صحة -->
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(265)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$situation_estimate[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($situation_estimate[0]->image) }}" alt="{{$situation_estimate[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$situation_estimate[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($situation_estimate[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach($situation_estimate as $post)
                                <li>
                                    <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                    <div class="post-content">
                                        <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- الفعاليات -->
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{__('الفعاليات')}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$events[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($events[0]->image) }}" alt="{{$events[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$events[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($events[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach($events as $post)
                                <li>
                                    <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                    <div class="post-content">
                                        <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>

                        <!--  تحت المجهر -->
                        <div class="col-md-4">
                            <div class="title-section">
                                <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(316)}}</span>
                                </h1>
                            </div>
                            <div class="row">
                                <a href="{{$underscope[0]->url}}">
                                    <div class="col-md-12">
                                        <div class="news-post standard-post">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($underscope[0]->image) }}" alt="{{$underscope[0]->name}}">
                                                <div class="rate-level">
                                                    <h3>{{$underscope[0]->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                            unset($underscope[0]);
                            @endphp
                            <ul class="list-posts">
                                @foreach ($underscope as $post)

                                <li>
                                    <a href="{{$post->url}}">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                    <div class="post-content">
                                        <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(336)}}</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach($book_reviews as $post)
                                        <li>
                                            <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <!-- <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->created_at)) }} -->
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(265)}}</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach($info_report as $post)
                                        <li>
                                            <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{$post->name}}"></a>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li>
                                                        <!-- <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->created_at)) }} -->
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End sidebar -->
                    </div>

                </div>
            </div>
            <!-- End grid-box -->

        </div>
        <!-- End block content -->
    </div>
</section>
@endif

<section class="block-wrapper block-3" style="display: none;">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h1><span>{{__('Images')}}</span>
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="row">
                            @if(isset($Images_sy[0]))
                            <a href="{{$Images_sy[0]->url}}">
                                <div class="col-md-6">
                                    <div class="news-post standard-post">
                                        <div class="post-gallery box1">
                                            <img src="{{ RvMedia::getImageUrl($Images_sy[0]->image) }}" alt="{{$Images_sy[0]->name}}">
                                            <div class="boxContent">
                                                <h3 class="title">{{$Images_sy[0]->name}}</h3>
                                                <span class="post">{{$Images_sy[0]->name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                            @if(isset($Images_sy[1]))
                            <a href="{{$Images_sy[1]->url}}">
                                <div class="col-md-6">
                                    <div class="news-post standard-post">
                                        <div class="post-gallery box1">
                                            <img src="{{ RvMedia::getImageUrl($Images_sy[1]->image) }}" alt="{{$Images_sy[1]->name}}">
                                            <div class="boxContent">
                                                <h3 class="title">{{$Images_sy[1]->name}}</h3>
                                                <span class="post">{{$Images_sy[1]->name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                        </div>
                        @php
                        unset($Images_sy[0]);
                        unset($Images_sy[1]);
                        @endphp
                        <div class="row" style="margin-top: 20px;">
                            @foreach($Images_sy as $post)
                            <a href="{{$post->url}}">
                                <div class="col-md-4">
                                    <div class="news-post standard-post">
                                        <div class="post-gallery box1">
                                            <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{$post->name}}">
                                            <div class="boxContent">
                                                <h3 class="title">{{$post->name}}</h3>
                                                <span class="post">{{$post->name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach

                        </div>
                    </div>


                </div>


            </div>
        </div>
        <!-- End grid-box -->

    </div>
    <!-- End block content -->
    </div>
</section>


<section class="block-wrapper block-3" style="display: none;">
    <div class="container">
        <!-- block content -->
        <div class="block-content">

            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h1><span>{{__('')}}</span>
                            </h1>
                        </div>
                    </div>


                </div>


            </div>
        </div>
        <!-- End grid-box -->

    </div>
    <!-- End block content -->
    </div>
</section>