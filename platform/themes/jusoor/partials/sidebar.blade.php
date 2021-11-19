<?php
$num = 5;
// $num = isset($limit) ? $limit : 5;
$isdarat = get_recent_posts($num);
?>

<div class="title-section">
    <h1><span>{{__('آخر الإصدارات')}}</span></h1>
</div>
<div>
    @foreach($isdarat as $key =>$post)
        <div class="item side-post">
            <p class="date"><i class="fa fa-clock-o"></i> {{  ($post->created_at->diffForHumans())}}</p>
            <div class="">
                <a href="{{ $post->url }}"><img src="{{ RvMedia::getImageUrl($post->image ) }}" alt="{{ $post->name }}"></a>
            </div>
            <div class="content">
                <div class="inner-hover">
                    <a class="category-post"
                       href="{{ $post->categories->last()->url }}">{{ $post->categories->last()->name }}</a>
                    <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                </div>
            </div>
        </div>

    @endforeach
</div>

