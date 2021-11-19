@php
SeoHelper::setTitle(__('404 خطأ الصفحة غير متوفرة'));
Theme::fire('beforeRenderTheme', app(\Botble\Theme\Contracts\Theme::class));
@endphp
{!! Theme::partial('header') !!}
<?php


        ?>
<section class="block-wrapper non-sidebar sky-news">
    <div class="container">
        <!-- block content -->
        <div class="block-content non-sidebar">
            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <!-- block content -->
                        <div class="block-content">

                            <!-- error box -->
                            <div class="error-box">
                                <div class="error-banner">
                                    <h1>خطأ <span>404</span></h1>
                                    <p>يبدو أن الصفحة التي تبحث عنها غير موجودة, يرجى إعادة البحث من جديد</p>
                                
                                </div>
                                <div class="search-box">
                                    <form accept-charset="UTF-8" action="{{ route('public.search') }}" method="GET" >
                                        <input type="text" id="search" name="q" placeholder="أدخل كلمة البحث">
                                        <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- End error box -->

                            <!-- grid box -->
                            <div class="grid-box">
                                <div class="title-section">
                                    <h1><span>آخر المنشورات</span></h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-posts">
                                            @foreach (get_recent_posts(5) as $post)
                                            <li>
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}" alt="{{$post->name}}">
                                                <div class="post-content">
                                                    <a href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                                    <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                                    </ul>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-posts">
                                            @foreach (get_featured_posts(5) as $post)
                                            <li>
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar') }}" alt="{{$post->name}}">
                                                <div class="post-content">
                                                    <a href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                                    <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                                                    </ul>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End grid box -->

                        </div>
                        <!-- End block content -->
                    </div>
                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            <div class="widget tags-widget">
                                <div>
                                    <div class="title-section">
                                        <h1>
                                            <span>زوارنا يتصفحون الآن</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach(get_featured_posts(2) as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img
                                                            src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                            alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
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
                                            <span>الأكثر قراءة</span>
                                        </h1>
                                    </div>
                                    <ul class="list-posts">
                                        @foreach(get_popular_posts(3) as $post)
                                            <li>
                                                <a href="{{$post->url}}"><img
                                                            src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                            alt="{{$post->name}}"></a>
                                                <div class="post-content">
                                                    <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
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
        </div>
        <!-- End grid-box -->
    </div>
    <!-- End block content -->
    </div>
</section>


{!! Theme::partial('footer') !!}
