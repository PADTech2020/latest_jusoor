<?php
$middle_east = [];
$sy = \Botble\Blog\Models\Post::getPostsByCategory(68, 5);

$sy_categories = \Botble\Blog\Models\Category::getChildren(68);

$international = \Botble\Blog\Models\Post::getAllPostsByCategory(70, 5);
$middle_east = \Botble\Blog\Models\Post::getAllPostsByCategory(69, 5);

$helth = \Botble\Blog\Models\Post::getAllPostsByCategory(82, 4);
$discover = \Botble\Blog\Models\Post::getAllPostsByCategory(83, 4);
$social = \Botble\Blog\Models\Post::getAllPostsByCategory(84, 4);

$sport = \Botble\Blog\Models\Post::getPostsByCategory(75, 4);
$translate = \Botble\Blog\Models\Post::getAllPostsByCategory(72, 3);

$lifestyle = \Botble\Blog\Models\Post::getAllPostsByCategory(76, 3);

$economy = \Botble\Blog\Models\Post::getAllPostsByCategory(71, 4);
$ra2i = \Botble\Blog\Models\Post::getAllPostsByCategory(73, 3);

$files = \Botble\Blog\Models\Post::getAllPostsByCategory(90, 2);

$mjtama3 = \Botble\Blog\Models\Post::getAllPostsByCategory(87, 5);

$art = \Botble\Blog\Models\Post::getAllPostsByCategory(85, 3);
$cinema = \Botble\Blog\Models\Post::getAllPostsByCategory(86, 5);
$vid = \Botble\Blog\Models\Post::getPostsByCategory(89, 5);


$gallery=[];
$gallery=( \Botble\Gallery\Models\Gallery::find((int)theme_option('gallery_id')));
//dd($gallery);

$meta = new \Botble\SeoHelper\SeoOpenGraph;
$meta->setImage('https://nedaa-post.com//storage/nedaa-post.jpeg');
$meta->setTitle('نداء بوست');
$meta->setDescription( theme_option('who_we_are') );
$meta->setUrl( 'https://nedaa-post.com' );
$meta->setType('Website');
$meta->addProperty('site-name',  'نداء بوست' );



\SeoHelper::setSeoOpenGraph($meta);


?>


{!! do_shortcode('[slider-posts][/slider-posts]') !!}


        <!-- features-today-section
    ================================================== -->

<section class="block-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-8 content-blocker">

                <!-- block content -->
                <div class="block-content">

                    <!-- grid box -->
                    <div class="grid-box">

                        <div class="title-section">
                            <h1><span>{{__("Syria")}}</span></h1>
                        </div>

                        <ul class="category-filter-posts">
                            <li><a class="active" href="/sorya">{{__('All')}}</a></li>
                            @foreach($sy_categories as $cat)
                                <li><a href="{{$cat->url}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>

                        <div class="image-post-slider">
                            <ul class="bxslider">
                                @foreach($sy as $post)
                                    <li>
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img class="sy-img"
                                                     src="{{ RvMedia::getImageUrl($post->image, 'featured') }}" alt="{{$post->name}}">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <a class="category-post"
                                                           href="{{$post->categories->last()->url}}">{{$post->categories->last()->name}}</a>
                                                        <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                        <ul class="post-tags">

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="row">
                            <div class=" col-md-12 col-sm-12">
                                <br>
                                @foreach($sy_categories as $category)

                                    <ul class="list-posts row">
                                        @foreach($posts = \Botble\Blog\Models\Post::getPostsByCategory($category->id, 2) as $post)
                                            <li class="col-md-6">
                                                <div class="w-box">
                                                    <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                         alt="{{$post->name}}">
                                                    <div class="post-content">
                                                        <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                        <ul class="post-tags">
                                                            <li>
                                                                <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                        @endforeach
                                    </ul>

                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- End grid box -->


                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">

                <!-- sidebar -->
                <div class="sidebar">

                    <!-- latest and featured EN -->
                    <div class="widget tab-posts-widget">

                        <ul class="nav nav-tabs" id="myTab">
                            <li>
                                <a href="#option1" data-toggle="tab">{{__('Popular')}}</a>
                            </li>
                            <li class="active">
                                <a href="#option2" data-toggle="tab">{{__('Latest')}}</a>
                            </li>
                            <li>
                                <a href="#option3" data-toggle="tab">ا{{__('Featured')}}</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane " id="option1">
                                <ul class="list-posts">
                                    @foreach (get_popular_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar', false, RvMedia::getDefaultImage()) }}"
                                                 alt="{{$post->name}}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
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
                            <div class="tab-pane active" id="option2">
                                <ul class="list-posts">
                                    @foreach (get_recent_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar', false, RvMedia::getDefaultImage()) }}"
                                                 alt="{{$post->name}}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
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


                            <div class="tab-pane" id="option3">
                                <ul class="list-posts">

                                    @foreach (get_featured_posts(5) as $post)
                                        <li>
                                            <img src="{{ RvMedia::getImageUrl($post->image, 'side_bar', false, RvMedia::getDefaultImage()) }}"
                                                 alt="{{$post->name}}">
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a></h2>
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

                    <!-- Ra2i Posts -->
                    <div class="widget tags-widget">
                        <div>
                            <div class="title-section">
                                <h1><span>{{__('رأي')}}</span></h1>
                            </div>
                            <ul class="list-posts">
                                @foreach($ra2i as $post)
                                    <li class="Ra2i">
                                        <a href="/articles/{{ $post->researcher->id }}"><img
                                                    src="{{ get_object_image( $post->researcher->image) }}"
                                                    alt="{{ $post->name }}"></a>
                                        <div class="post-content">
                                            <h2><a href="{{ $post->url }}">{{ $post->name }} </a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-quote-right"></i><a
                                                            href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!--<li style=""><h2>{{__('المقالات المنشورة في "نداء بوست" تعبّر عن آراء كتابها وليس بالضرورة عن رأي الموقع.')}}</h2></li>-->
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Ra2i Posts  -->

                </div>
                <!-- End sidebar -->
            </div>
        </div>
    </div>
</section>
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- grid box -->
                    <div class="grid-box">

                        <div class="title-section">
                            <h1><span>الشرق الأوسط</span></h1>
                        </div>

                        @if(count($middle_east)>0)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <img src="{{ RvMedia::getImageUrl($middle_east[0]->image, RvMedia::getDefaultImage()) }}"
                                                 alt="{{$middle_east[0]->name}}">
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <a class="category-post tech"
                                                       href="{{ $middle_east[0]->categories->last()->url }}">{{ $middle_east[0]->categories->last()->name }}</a>
                                                    <h2><a href="{{$middle_east[0]->url}}">{{$middle_east[0]->name}}</a>
                                                    </h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($middle_east[0]->published_at)) }}
                                                        </li>
                                                        <li><i class="fa fa-user"></i> <a
                                                                    href="/articles/{{ $middle_east[0]->researcher->id }}">{{ $middle_east[0]->researcher->name }}</a>
                                                        </li>
                                                        <li><i class="fa fa-eye"></i>{{ $middle_east[0]->views }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @php
                                unset($middle_east[0]);
                                @endphp

                                @foreach($middle_east as $post)
                                    <div class="col-md-6">
                                        <ul class="list-posts">
                                            <li>
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}">
                                                <div class="post-content">
                                                    <a href="{{ $post->categories->last()->url }}">{{ $post->categories->last()->name }}</a>
                                                    <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="title-section">
                            <h1><span>دولي</span></h1>
                        </div>

                        @if(count($international)>0)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <img src="{{ RvMedia::getImageUrl($international[0]->image, RvMedia::getDefaultImage()) }}"
                                                 alt="{{$international[0]->name}}">
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <a class="category-post tech"
                                                       href="{{ $international[0]->categories->last()->url }}">{{ $international[0]->categories->last()->name }}</a>
                                                    <h2>
                                                        <a href="{{$international[0]->url}}">{{$international[0]->name}}</a>
                                                    </h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($international[0]->published_at)) }}
                                                        </li>
                                                        <li><i class="fa fa-user"></i> <a
                                                                    href="/articles/{{ $international[0]->researcher->id }}">{{ $international[0]->researcher->name }}</a>
                                                        </li>
                                                        <li><i class="fa fa-eye"></i>{{ $international[0]->views }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @php
                                unset($international[0]);
                                @endphp

                                @foreach($international as $post)
                                    <div class="col-md-6">
                                        <ul class="list-posts">
                                            <li>
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                     alt="{{$post->name}}">
                                                <div class="post-content">
                                                    <a href="{{ $post->categories->last()->url }}">{{ $post->categories->last()->name }}</a>
                                                    <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <!-- End grid box -->

                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">
                <!-- sidebar -->
                <div class="sidebar">
                    <div class="widget features-slide-widget">
                        <div class="title-section">
                            <h1><span>{{__('ترجمات')}}</span></h1>
                        </div>
                        <div class="image-post-slider">
                            <ul class="bxslider">
                                @foreach($translate as $post)
                                    <li>
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'featured_images') }}" alt="{{$post->name}}">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                        <ul class="post-tags">
                                                            <li><br></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End sidebar -->
            </div>

            <div class="col-sm-4">
                <!-- sidebar -->
                <div class="sidebar">

                    <!-- subscribe -->
                    <div class="widget subscribe-widget">
                        {!! do_shortcode('[subscribe-form][/subscribe-form]') !!}
                    </div>

                    <!-- files -->
                    <div class="widget features-slide-widget">
                        <div class="title-section">
                            <h1><span>{{__('ملفات')}}</span></h1>
                        </div>
                        <div class="image-post-slider">
                            <ul class="bxslider">

                                @foreach($files as $post)
                                    <li>
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'featured_images') }}"
                                                     alt="{{ $post->name }}">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="{{ $post->url }}">{{ $post->name }} </a></h2>
                                                        <ul class="post-tags">
                                                            <li><br></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
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
</section>
<!-- End features-today-section -->
<section class="features-today med-inter-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="title-section">
                    <h1><span>{{__('اقتصاد')}}</span></h1>
                </div>
                <div class="features-today-box owl-wrapper">
                    <div class="owl-carousel" data-num="4">

                        @if(count($economy)>0)
                            @foreach($economy as $post)
                                <div class="item news-post standard-post">
                                    <div class="post-gallery">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}" alt="{{$post->name}}">
                                        <!-- <a class="category-post world" href="{{ $post->url }}">{{ date('Y/m/d', strtotime($post->published_at)) }}</a> -->
                                    </div>
                                    <div class="post-content">
                                        <h2><a href="{{ $post->url }}">{{$post->name}}</a></h2>
                                        <ul class="post-tags">
                                            <li>
                                                {{--<i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}--}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                            @endforeach
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- block-wrapper-section
    ================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- carousel box -->
                    <div class="carousel-box tech owl-wrapper">

                        <div class="title-section">
                            <h1><span class="world">علوم وتكنولوجيا</span></h1>
                        </div>

                        <div class="owl-carousel" data-num="2">
                            @if(count($helth)>0)
                                <div class="item">
                                    @if(isset($helth[0]))
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($helth[0]->image, 'featured') }}"
                                                     alt="{{$helth[0]->name}}">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="{{$helth[0]->url}} ">{{$helth[0]->name}} </a></h2>
                                                        <ul class="post-tags">
                                                            <li>
                                                                <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($helth[0]->published_at)) }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-posts">
                                            @foreach($helth as $post)
                                                @if (!$loop->first)
                                                    <li>
                                                        <img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}"
                                                             alt="{{$post->name}}">
                                                        <div class="post-content">
                                                            <h2><a href="{{$post->url}}">{{$post->name}} </a>
                                                            </h2>
                                                            <ul class="post-tags">
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endif
                            @if(count($discover)>0)
                                <div class="item">
                                    @if(isset($discover[0]))
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($discover[0]->image, 'featured') }}"
                                                     alt="{{$discover[0]->name}}">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="{{$discover[0]->url}}">{{$discover[0]->name}} </a>
                                                        </h2>
                                                        <ul class="post-tags">
                                                            <li>
                                                                <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($discover[0]->published_at)) }}
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-posts">
                                            @foreach($discover as $post)
                                                @if (!$loop->first)
                                                    <li>
                                                        <img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}"
                                                             alt="{{$post->name}}">
                                                        <div class="post-content">
                                                            <h2><a href="{{$post->url}}">{{$post->name}} </a>
                                                            </h2>
                                                            <ul class="post-tags">
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endif
                            @if(count($social)>0)
                                <div class="item">
                                    @if(isset($social[0]))
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($social[0]->image, 'featured') }}"
                                                     alt="{{$social[0]->name}}">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="{{$social[0]->url}}">{{$social[0]->name}} </a></h2>
                                                        <ul class="post-tags">
                                                            <li>
                                                                <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($social[0]->published_at)) }}
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <ul class="list-posts">
                                            @foreach($social as $post)
                                                @if (!$loop->first)

                                                    <li>
                                                        <img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}"
                                                             alt="{{$post->name}}">
                                                        <div class="post-content">
                                                            <h2><a href="{{$post->url}}">{{$post->name}} </a>
                                                            </h2>
                                                            <ul class="post-tags">
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endif

                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </div>
                    <!-- End carousel box -->


                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">

                <!-- sidebar -->
                <div class="sidebar">


                    <div class="widget features-slide-widget">
                        <div class="title-section">
                            <h1><span>{{__('ثقافة وفن')}}</span></h1>
                        </div>
                        <div class="image-post-slider tr-slider">
                            <ul class="bxslider">

                                @foreach($art as $post)
                                    <li>
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ RvMedia::getImageUrl($post->image, 'featured_images') }}" alt="{{$post->name}}">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                                        <ul class="post-tags">
                                                            <li><br></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
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
</section>
<!-- End block-wrapper-section -->
{!! do_shortcode('[sport][/sport]') !!}
<section class="latest-videos-section sports hidden">
    <div class="container">
        <div class="title-section">
            <h1><span>{{__('رياضة')}}</span></h1>
        </div>

        <!-- slider-caption-box -->
        <div class="slider-caption-box2">

            <div class="slider-holder">

                <div class="news-post iframe-post">
                    <div class="image-post-slider">
                        <ul class="bxslider">
                            @foreach($sport as $post)
                                <li><img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}" alt="{{$post->name}}"></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div id="bx-pager">
                <ul class="list-posts">
                    @foreach($sport as $post)
                        <li>
                            <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                 alt="{{$post->name}}">
                            <div class="post-content">
                                <h2><a href="{{$post->url}}">{{$post->name}} </a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                    </li>
                                </ul>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
        <!-- End slider-caption-box -->
    </div>
</section>
<!-- feature-video-section
    ================================================== -->

<!-- End feature-video-section -->

<!-- block-wrapper-section
    ================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">
                    <div class="title-section">
                        <h1><span>{{__('مجتمع')}}</span></h1>
                    </div>
                    <!-- carousel box -->
                    <div class="latest-articles iso-call ">
                        @foreach($mjtama3 as $post)
                            <div class="news-post standard-post2 default-size">
                                <div class="post-gallery">
                                    <img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}" alt="{{$post->name}}">
                                </div>
                                <div class="post-title">
                                    <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                    <ul class="post-tags">
                                        <li>
                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <!-- End carousel box -->


                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">
                <!-- sidebar -->
                <div class="sidebar">
                    <div class="widget tags-widget">
                        <div>
                            <div class="title-section">
                                <h1><span>{{__('سينما وتلفزيون')}}</span></h1>
                            </div>
                            <ul class="list-posts">
                                @foreach($cinema as $post)
                                    <li>
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                             alt="{{$post->name}}">
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
</section>
<!-- End block-wrapper-section -->
<section class="feature-video">
    <div class="container">
        <div class="title-section white">
            <h1><span>فيديوهات مميزة</span></h1>
        </div>

        <div class="features-video-box owl-wrapper">
            <div class="owl-carousel" data-num="3">
                @if(count($vid)>0)
                    @foreach($vid as $post)
                        <div class="item news-post video-post">
                            <img src="{{ RvMedia::getImageUrl($post->image, 'featured') }}" alt="{{$post->name}}">
                            <a href="{{$post->youtube_link}}" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                            <div class="hover-box">
                                <h2><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                    </li>
                                </ul>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- grid box -->
                    <div class="grid-box">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="title-section">
                                    <h1><span class="fashion">لايف ستايل</span></h1>
                                </div>
                                <div class="image-post-slider">
                                    <ul class="bxslider">
                                        @foreach($lifestyle as $post)
                                            <li>
                                                <div class="news-post image-post2">
                                                    <div class="post-gallery">
                                                        <img src="{{ RvMedia::getImageUrl($post->image, 'featured_images') }}"
                                                             alt="{{ $post->name }}">
                                                        <div class="hover-box">
                                                            <div class="inner-hover">
                                                                <h2><a href="{{$post->url}}">{{ $post->name }}</a>
                                                                </h2>
                                                                <ul class="post-tags">
                                                                    <li>
                                                                        <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                                    </li>
                                                                    <li><i class="fa fa-user"></i> <a
                                                                                href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->name }}</a>
                                                                    </li>
                                                                    <li><i class="fa fa-eye"></i>{{ $post->view }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="title-section">
                                    <h1><span class="world">منوع</span></h1>
                                </div>

                                <div class="owl-wrapper">
                                    <div class="owl-carousel" data-num="1">

                                        <div class="item">
                                            <ul class="list-posts">
                                                <?php $counter = 1; ?>
                                                @foreach($art as $post)
                                                    <?php if ($counter < 3) {
                                                    $counter++; ?>
                                                    <li>
                                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                             alt="{{ $post->name }}">
                                                        <div class="post-content">
                                                            <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                                            <ul class="post-tags">
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="item">
                                            <ul class="list-posts">
                                                <?php $counter = 1; ?>
                                                @foreach($cinema as $post)
                                                    <?php if ($counter < 3) {
                                                    $counter++; ?>
                                                    <li>
                                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                             alt="{{ $post->name }}">
                                                        <div class="post-content">
                                                            <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                                            <ul class="post-tags">
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- End grid box -->


                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">

                <!-- sidebar -->
                <div class="sidebar">


                    <div class="widget tags-widget">

                        <div class="title-section">
                            <h1><span><h1><span>{{__("Tags")}}</span></h1></span></h1>
                        </div>

                        <ul class="tag-list">
                            @foreach (get_popular_tags(8) as $tag)
                                <li><a href="{{ $tag->url }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<section class="feature-video">
    <div class="container">
        <div class="title-section white">
            <h1><span>{{__('البوم صور')}}</span></h1>
        </div>

        <div class="features-video-box owl-wrapper">
            <div class="owl-carousel" data-num="5">
                @if($gallery)
                    @foreach (gallery_meta_data($gallery) as $image)
                        @if ($image)
                        <div class="item news-post video-post">
                            <img class="gallery-img" src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}"
                                 alt="{{ clean(Arr::get($image, 'description')) }}">
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

{{--@if($gallery)--}}
    {{--@foreach (gallery_meta_data($gallery) as $image)--}}
        {{--@if ($image)--}}
            {{--<div class="item project-img" data-src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}"--}}
                 {{--data-sub-html="{{ clean(Arr::get($image, 'description')) }}">--}}
                {{--<div class="photo-item">--}}
                    {{--<div class="thumb">--}}
                        {{--<a href="{{ clean(Arr::get($image, 'description')) }}">--}}
                            {{--<img src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}"--}}
                                 {{--alt="{{ clean(Arr::get($image, 'description')) }}">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    {{--@endforeach--}}
{{--@endif--}}
                    {{--<!-- End block-wrapper-section -->--}}