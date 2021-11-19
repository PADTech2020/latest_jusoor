@if (is_plugin_active('blog'))
<?php
    $slider = \Botble\Slider\Models\Slider::getSlider(4);
?>
@endif

<!-- heading-news-section2
================================================== -->
<section class="heading-news2 jusoor-slider">
    <div id="hero-slider" class="hero-slider owl-carousel owl-theme">
        @foreach($slider as $slide)
            <div class="item image-post">
                <div class="hero-slider-img">
                    <img src="{{ RvMedia::getImageUrl($slide->image ) }}" alt="{{ $slide->name }}">
                </div>
                <div class="news-slider-content">
                    <div class="inner-hover">
                        <a class="category-post">{{ $slide->category }}</a>
                        <img width="60" src="https://staging.jusoor.co/storage/general/logo-preview-4.png" alt="Nedaa Post logo">
                        <h2><a href="{{ $slide->url }}">{{ $slide->name }}</a></h2>
                        <p>{!! $slide->content !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- End heading-news-section -->