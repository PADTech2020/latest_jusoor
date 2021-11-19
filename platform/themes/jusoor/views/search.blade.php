<?php
$q = Request::input('q');
$limit = 20;
$data = Botble\Researchers\Models\Researchers::select('researchers.*');

    $data = $data->where('researchers.name', 'LIKE', '%' . $q . '%');




$researchers = $data->orderBy('researchers.created_at', 'desc')->limit($limit)->get();



?>

@if(count($posts) > 2)
    <section class="block-wrapper new-dark-style">
        <div class="container">
            <!-- block content -->
            <div class="block-content new-dark-style">
                <div class="title-section">
                    <h1><span>{{__("Search Result")}} : {{ Request::input('q') }}</span></h1>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        @if(isset($posts[0]))
                            <a href="{{$posts[0]->url}}">
                                <div class="col-md-6">
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
                                <div class="col-md-6">
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
                                    <div class="col-md-4" >
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

{{--@if(count($researchers) > 0)--}}

    {{--<section class="researchers-list">--}}
        {{--<div class="container">--}}
            {{--<!-- block content -->--}}
            {{--<div class="title-section">--}}
                {{--<h1><span>{{__("Search Result")}} {{__('الكُتٌاب')}} : {{ Request::input('q') }}</span></h1>--}}
            {{--</div>--}}
            {{--<br>--}}
            {{--<div class="row">--}}

                {{--@foreach($researchers as $researcher)--}}
                    {{--@if($researcher->id!=8 && $researcher->id!=16)--}}
                        {{--<div class=" col-md-3">--}}
                            {{--<div class="block-content new-dark-style block-author" >--}}
                                {{--<a href="/articles/{{ $researcher->id }}">--}}
                                    {{--<div class="author-img">--}}
                                        {{--<img width="150" src="{{RvMedia::getImageUrl($researcher->image, 'thumb') }}"/>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<div class="author-content">--}}
                                    {{--<a href="/articles/{{ $researcher->id }}">--}}
                                        {{--<h2><span class="author-name">{{ $researcher->name }}</span></h2>--}}
                                    {{--</a>--}}
                                    {{--<p><span class="position">{{ $researcher->position }}</span></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</section>--}}


{{--@endif--}}


<section class="block-wrapper non-sidebar sky-news">
    <div class="container">
        <!-- block content -->
        <div class="block-content non-sidebar">
            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="title-section">
                            <h1><span>{{__("Search Result")}} : {{ Request::input('q') }}</span></h1>
                        </div>
                        @if(count($posts))
                            <div class="row">
                                <ul class="list-posts">
                                    @foreach ($posts as $post)

                                        <li class="col-md-6">
                                            <a href="{{$post->url}}"><img
                                                        src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                        alt="{{$post->name}}"></a>
                                            <div class="post-content">
                                                <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a><br> <i class="fa fa-clock-o"></i>  {{ date('Y/m/d', strtotime($post->published_at)) }}</h2>

                                            </div>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>
                            <div class="pagination-box">
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
        </div>
        <!-- End grid-box -->
    </div>
    <!-- End block content -->
    </div>
</section>

<!-- block-wrapper-section
