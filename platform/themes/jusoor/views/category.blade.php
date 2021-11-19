@if(count($posts) > 2)
    <?php
    $f_id=0;
    if(isset($posts[0])){
    $f_id=$posts[0]->id;}
    else{ $f_id=0;}
    $related_posts=get_related_posts($f_id, 4);
    ?>
<section class="block-wrapper new-dark-style">
    <div class="container">
        <!-- block content -->
        <div class="block-content new-dark-style">
            <div class="title-section">
                <h1><span>{{ $category->name }}</span></h1>
            </div>
            <div class="col-md-12">

                <div class="row">
                    @if(isset($posts[0]))
                        <a href="{{$posts[0]->url}}">
                            <div class="col-md-6 col-sm-6">
                                <div class="news-post standard-post">
                                    <div class="post-gallery box1">
                                        <img src="{{ RvMedia::getImageUrl($posts[0]->image) }}"
                                             alt="{{$posts[0]->name}}">
                                        <div class="boxContent">
                                            <h3 class="title">{{$posts[0]->name}}</h3>
                                            <span class="post">{{$posts[0]->name}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if(isset($posts[1]))
                        <a href="{{$posts[1]->url}}">
                            <div class="col-md-6 col-sm-6">
                                <div class="news-post standard-post">
                                    <div class="post-gallery box1">
                                        <img src="{{ RvMedia::getImageUrl($posts[1]->image) }}"
                                             alt="{{$posts[1]->name}}">
                                        <div class="boxContent">
                                            <h3 class="title">{{$posts[1]->name}}</h3>
                                            <span class="post">{{$posts[1]->name}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
                @php

                unset($posts[0]);
                unset($posts[1]);
                @endphp
                <div class="row" style="margin-top: 20px;">
                    @foreach($posts as $post)
                        @if($loop->index<3)
                        <a href="{{$post->url}}">
                            <div class="col-md-4 col-sm-4" >
                                <div class="news-post standard-post small-box">
                                    <div class="post-gallery box1">
                                        <img src="{{ RvMedia::getImageUrl($post->image) }}"
                                             alt="{{$post->name}}">
                                        <div class="boxContent">
                                            <h3 class="title">{{$post->name}}</h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                    @endforeach

                </div>
                @php
                unset($posts[0]);
                unset($posts[1]);
                unset($posts[2]);
                @endphp
            </div>

        </div>
    </div>

</section>
@endif
@if(count($posts) > 2)
<section class="block-wrapper non-sidebar sky-news">
    <div class="container">
        <!-- block content -->
        <div class="block-content non-sidebar">
            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="col-md-9">
                            <div class="title-section">
                                <h1><span>{{ $category->name }}</span></h1>
                            </div>
                            @if(count($posts))
                                <div class="row">
                                    @foreach($posts as $post)
                                        <a href="{{ $post->url }}">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="news-post standard-post">
                                                    <div class="post-gallery">
                                                        <img style="height: 225px;" src="{{ GetMediaImg($post->image, 'list_main') }}"
                                                             alt="{{ $post->name }}">
                                                    </div>
                                                    <div class="post-content">
                                                        <h2>{{ $post->name }}</h2>
                                                        <ul class="post-tags">
                                                            <li>

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
                                {!! Theme::partial('sidebar',['limit'=>4]) !!}
                            </div>
                            <!-- End sidebar -->
                        </div>
                    </div>


                </div>
                <div class="col-12">
                    <!-- carousel box -->
                    <div class="carousel-box owl-wrapper">
                        <div class="title-section">
                            <h1><span>{{__("You might like it.")}}</span></h1>
                        </div>
                        <div class="might-like-carousel owl-carousel" data-num="3">

                            @foreach ($related_posts as $related_item)
                                <div class="item news-post image-post3">
                                    <img src="{{ RvMedia::getImageUrl($related_item->image,'list_main') }}"
                                         alt="{{ $related_item->name }}">
                                    <div class="hover-box">
                                        <h2><a href="{{ $related_item->url }}">{{ $related_item->name }}</a></h2>
                                        <ul class="post-tags">
                                            <li>
                                                <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End carousel box -->
                </div>
            </div>
        </div>
        <!-- End grid-box -->
    </div>
    <!-- End block content -->
    </div>
</section>
@endif

<!-- block-wrapper-section
