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

<!-- contact info box -->
<div class="contact-info-box">
    <div class="title-section">
        <h1><span>{{__('Contact Us')}}</span></h1>
    </div>



    <p>{{theme_option('who_we_are')}} </p>
    <div class="inner-container info-box">

        <div class="info-inner">
            <div class="row clearfix">
                <div class="top-inner mb-55">
                    <div class="sec-title text-center">
                        <p>{{__('Contact Details')}}</p>

                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-box">
                        <div class="hidden-icon"><i class="flaticon-pin"></i></div>
                        <div class="box">
                            <div class="icon-box"><i class="flaticon-pin"></i></div>
                            <h4 class="text-center">{{__('Address')}}</h4>
                            <p class="text-center">{{ theme_option('address') }}</p>
                        </div>
                        <div class="text">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-box">
                        <div class="hidden-icon"><i class="flaticon-music"></i></div>
                        <div class="box">
                            <div class="icon-box"><i class="flaticon-music"></i></div>
                            <h4 class="text-center">{{__('Phone')}}</h4>
                            <p class="text-center"><a href="tel: {{ theme_option('phone') }}"> {{ theme_option('phone') }}</a></p>

                        </div>
                        <div class="text">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                    <div class="info-box">
                        <div class="hidden-icon"><i class="flaticon-gmail"></i></div>
                        <div class="box">
                            <div class="icon-box"><i class="flaticon-gmail"></i></div>
                            <h4 class="text-center">{{__('Email')}}</h4>
                            <p class="text-center"><a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a></p>

                        </div>
                        <div class="text">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End contact info box -->

<!-- contact form box -->
<div class="contact-form-box">

    {!! do_shortcode('[contact-form][/contact-form]') !!}
</div>
<!-- End contact form box -->

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