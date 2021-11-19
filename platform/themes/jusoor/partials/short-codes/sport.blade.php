<?php

$sport = \Botble\Blog\Models\Post::getPostsByCategory(75, 4);
$sport_featured= \Botble\Blog\Models\Post::getPostsByCategory(75, 4,1);
?>
<section class="heading-news2 sports">

    <div class="container">
        <div class="title-section">
            <h1><span>{{\Botble\Blog\Models\Category::getCategoryNameCurrentLang(75)}}</span></h1>
        </div>
        <div class="iso-call heading-news-box">
            @if(isset($sport[0]))
                <?php $post=$sport[0];?>
                <div class="news-post image-post default-size">
                    <img src="{{ RvMedia::getImageUrl($post->image, 'under_post') }}" alt="{{$post->name}}">
                    <div class="hover-box">
                        <div class="inner-hover">
                            {{--<a class="category-post" href="politics-category.html">business</a>--}}
                            <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i><span> {{ date('Y/m/d', strtotime($post->published_at)) }} </span></li>
                                <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            @endif

            <div class="image-slider snd-size">
                <span class="top-stories">{{__('Featured News')}}</span>
                <ul class="bxslider">
                    @foreach($sport_featured as $post)

                        <li>
                            <div class="news-post image-post">
                                <img class="main-img" src="{{ RvMedia::getImageUrl($post->image, 'slider_big') }}" alt="{{$post->name}}">
                                <div class="hover-box">
                                    <div class="inner-hover">
                                        {{--<a class="category-post" href="politics-category.html">Elections</a>--}}
                                        <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i> {{ date('Y/m/d', strtotime($post->published_at)) }} </li>
                                            <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a></li>
                                            {{--<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>--}}
                                            {{--<li><i class="fa fa-eye"></i>872</li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>

                @if(isset($sport[1]))
                    <?php $post=$sport[1];?>
                    <div class="news-post image-post default-size">
                        <img src="{{ RvMedia::getImageUrl($post->image, 'under_post') }}" alt="{{$post->name}}">
                        <div class="hover-box">
                            <div class="inner-hover">
                                {{--<a class="category-post" href="politics-category.html">business</a>--}}
                                <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i><span> {{ date('Y/m/d', strtotime($post->published_at)) }} </span></li>
                                    <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->name }}</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endif

                @if(isset($sport[2]))
                    <?php $post=$sport[2];?>
                    <div class="news-post image-post default-size">
                        <img src="{{ RvMedia::getImageUrl($post->image, 'under_post') }}" alt="{{$post->name}}">
                        <div class="hover-box">
                            <div class="inner-hover">
                                {{--<a class="category-post" href="politics-category.html">business</a>--}}
                                <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i><span> {{ date('Y/m/d', strtotime($post->published_at)) }} </span></li>
                                    <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->name }}</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($sport[3]))
                    <?php $post=$sport[3];?>
                    <div class="news-post image-post default-size">
                        <img src="{{ RvMedia::getImageUrl($post->image, 'under_post') }}" alt="{{$post->name}}">
                        <div class="hover-box">
                            <div class="inner-hover">
                                {{--<a class="category-post" href="politics-category.html">business</a>--}}
                                <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i><span> {{ date('Y/m/d', strtotime($post->published_at)) }} </span></li>
                                    <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->name }}</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endif

        </div>
    </div>

</section>