@if(count($posts) > 2)
<section class="block-wrapper new-dark-style">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{ $tag->name }}</span></h1>
            </div>
            <div class="row">
                @if(isset($posts[0]))
                <?php $post = $posts[0];?>
                    <div class="post post-dark col-lg-6 col-12 mb-20">
                        <div class="post-wrap">
                            <div id="dark-main-img" class="">
                                <a href="{{$post->url}}"><img style="height: 385px;"
                                            src="{{ GetMediaImg($post->image , 'post_big_main' ) }}"
                                    /></a>
                                <div class="content">
                                    <a href="{{$post->url}}"><h3>
                                        {{$post->name}}
                                    </h3></a>
                                    <p> {{Str::words($post->description, '15')}} </p>
                                </div>
                            </div>


                        </div>
                    </div>

                @endif
                @if(isset($posts[1]))
                <?php $post = $posts[1];?>
                    <div class="post post-dark col-lg-6 col-12 mb-20">
                        <div class="post-wrap">
                            <div id="dark-main-img" class="">
                                <a href="{{$post->url}}"><img style="height: 385px;"
                                            src="{{ GetMediaImg($post->image , 'post_big_main' ) }}"
                                    /></a>
                                <div class="content">
                                    <a href="{{$post->url}}"><h3>
                                        {{$post->name}}
                                    </h3></a>
                                    <p> {{Str::words($post->description, '15')}} </p>
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
@endif

<section class="block-wrapper non-sidebar sky-news">
    <div class="container">
        <!-- block content -->
        <div class="block-content non-sidebar">
            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="title-section">
                            <h1><span>{{ $tag->name }}</span></h1>
                        </div>
                        @if(count($posts))
                            <div class="row">
                                @foreach($posts as $post)
                                    <a href="{{ $post->url }}">
                                        <div class="col-md-4">
                                            <div class="news-post standard-post">
                                                <div class="post-gallery">
                                                    <img style="height: 225px;" src="{{ GetMediaImg($post->image, 'list_main') }}"
                                                         alt="{{ $post->name }}">
                                                </div>
                                                <div class="post-content">
                                                    <h2>{{ $post->name }}</h2>
                                                    <ul class="post-tags">
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div> <div class="pagination-box">
                                {!! $posts->links() !!}
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <p>{{ __('There is no data to display!') }}</p>
                            </div>
                        @endif
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

<!-- block-wrapper-section
