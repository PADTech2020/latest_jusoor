@if (is_plugin_active('blog'))
<?php
$isdarat = get_recent_posts(6);
?>

@endif

<!-- heading-news-section2
================================================== -->
<section class="heading-news2 jusoor-slider">
        <div class="">
            <div class="">
                <div class="">
                    @foreach($isdarat as $post)
                            <div class="item image-post">
                                <div class="hero-slider-img">
                                    <img src="{{ RvMedia::getImageUrl($post->image ) }}" alt="{{ $post->name }}">
                                </div>
                                <div class="news-slider-content">
                                    <div class="inner-hover">
                                        <a class="category-post" href="{{ $post->categories->last()->url }}">{{ $post->categories->last()->name }}</a>
                                        <h2><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                        <p>{{ $post->description }}</p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
<!-- End heading-news-section -->