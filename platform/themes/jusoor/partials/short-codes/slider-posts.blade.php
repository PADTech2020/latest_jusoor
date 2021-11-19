@if (is_plugin_active('blog'))
<?php


$slider = Botble\Blog\Models\Post::getSlider(6);

$latest_articles_top = Botble\Blog\Models\Post::getLatestNews(4);


?>

@endif




<section class="featured-wrap hero-slider heading-news2">

    <div class="container" class="active">


        <div class="iso-call heading-news-box">
            @if(count($slider)>=2)
            <div class="image-slider snd-size">
                <span class="top-stories">{{__("Featured News")}}</span>
                <div id="top-slider" class="owl-carousel">
                    <?php $counter = 0; ?>
                    @foreach($slider as $slide)
                        @if($counter<6)
                            <?php $counter++;?>
                            <div class="item">
                                <div class="news-post image-post">
                                    <img class="main-img" src="{{ RvMedia::getImageUrl($slide->image ) }}"
                                         alt="{{$slide->name}}">

                                    <div class="hover-box">
                                        <a class="category-post sport" href="{{$slide->categories->first()->url}}">{{$slide->categories->first()->name}}</a>
                                        <div class="inner-hover">
                                            <h2><a href="{{$slide->url}}">{{$slide->name}}</a></h2>
                                            <ul class="post-tags">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
            @if(isset($latest_articles_top[0]))
            <div class="news-post image-post">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[0]->image,  'under_post' ) }}" alt="{{$latest_articles_top[0]->name}}">
                <div class="hover-box">
                    <a class="category-post tech" href="{{$latest_articles_top[0]->categories->first()->url}}">{{$latest_articles_top[0]->categories->first()->name}}</a>
                    <div class="inner-hover">
                        <h2><a href="{{$latest_articles_top[0]->url}}">{{$latest_articles_top[0]->name}}</a></h2>
                        <p>{{$latest_articles_top[0]->description}}</p>
                    </div>
                </div>
            </div>
            @endif
            @if(isset($latest_articles_top[1]))
            <div class="news-post image-post default-size">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[1]->image,  'under_post' ) }}" alt="{{$latest_articles_top[1]->name}}">
                <div class="hover-box">
                    <a class="category-post sport" href="{{$latest_articles_top[1]->categories->first()->url}}">{{$latest_articles_top[1]->categories->first()->name}}</a>
                    <div class="inner-hover">
                        <h2><a href="{{$latest_articles_top[1]->url}}">{{$latest_articles_top[1]->name}}</a></h2>
                        <p>{{$latest_articles_top[1]->description}}</p>
                    </div>
                </div>
            </div>
            @endif
            @if(isset($latest_articles_top[2]))
            <div class="news-post image-post">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[2]->image,  'under_post' ) }}" alt="{{$latest_articles_top[2]->name}}">
                <div class="hover-box">
                    <a class="category-post travel" href="{{$latest_articles_top[2]->categories->first()->url}}">{{$latest_articles_top[2]->categories->first()->name}}</a>
                    <div class="inner-hover">
                        <h2><a href="{{$latest_articles_top[2]->url}}">{{$latest_articles_top[2]->name}}</a></h2>
                        <p>{{$latest_articles_top[2]->description}}</p>
                    </div>
                </div>
            </div>
            @endif
            @if(isset($latest_articles_top[3]))
            <div class="news-post image-post">
                <img src="{{ RvMedia::getImageUrl($latest_articles_top[3]->image,  'under_post' ) }}" alt="{{$latest_articles_top[3]->name}}">
                <div class="hover-box">
                    <a class="category-post top-stories" href="{{$latest_articles_top[3]->categories->first()->url}}">{{$latest_articles_top[3]->categories->first()->name}}</a>
                    <div class="inner-hover">
                        <h2><a href="{{$latest_articles_top[3]->url}}">{{$latest_articles_top[3]->name}}</a></h2>
                        <p>{{$latest_articles_top[3]->description}}</p>
                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>
</section>