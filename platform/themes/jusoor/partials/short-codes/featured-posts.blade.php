@if (is_plugin_active('blog'))
<?php

$trends = Botble\Blog\Models\Post::getSlider(4);
$featured = get_featured_posts(8);
$counter = 0;
$articles = [];
$hero_posts = [];
$temp = [];
$trends_posts = [];
foreach ($trends as $art) {
    if (count($art->categories) > 0) {
        $art['cats'] = $art->categories[0]->name;
        $trends_posts[] = $art;
    }
}
foreach ($featured as $art) {
    if (count($art->categories) > 0) {
        $art['cats'] = $art->categories[0]->name;
        $temp[] = $art;
    }

    if ($counter <= 8) {
        $articles[] = $art;
    }
    $counter++;
}
?>

@endif

        <!-- heading-news-section
    ================================================== -->
<section class="heading-news hero">

    <div class="iso-call heading-news-box">

        @if(isset($articles[0]))
            <div class="news-post image-post default-size">
                <img src="{{ RvMedia::getImageUrl($articles[0]->image, 'medium') }}" alt="{{$articles[0]->name}}">
                <div class="hover-box">
                    <div class="inner-hover">
                        <a class="category-post travel" href="">{{$articles[0]->cats}}</a>
                        <h2><a href="{{$articles[0]->url}}">{{$articles[0]->name}}</a></h2>
                        <ul class="post-tags">
                            <li>
                                <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[0]->published_at)) }}</span>
                            </li>
                            {{--<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>--}}
                        </ul>
                        <p>{{$articles[0]->description}}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="image-slider snd-size">
            <span class="top-stories">تريند</span>
            @if(count($trends_posts)>2)
                <ul class="bxslider">
                    @foreach($trends_posts as $slide)
                        <li>
                            <div class="news-post image-post">
                                <img src="{{ RvMedia::getImageUrl($slide->image,  'medium' ) }}" alt="{{$slide->name}}">
                                <div class="hover-box">
                                    <div class="inner-hover">
                                        <a class="category-post world" href="{{$slide->categories->first()->url}}">{{$slide->categories->first()->name}}</a>
                                        <h2><a href="{{$slide->url}}">{{$slide->name}} </a></h2>
                                        <ul class="post-tags">
                                            <li>
                                                <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($slide->published_at)) }}
                                            </li>
                                            {{--<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>--}}
                                            {{--<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>--}}
                                            {{--<li><i class="fa fa-eye"></i>872</li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        @if(isset($articles[1]))
            <div class="news-post image-post">
                <img src="{{ RvMedia::getImageUrl($articles[1]->image, 'medium') }}" alt="{{$articles[1]->name}}">
                <div class="hover-box">
                    <div class="inner-hover">
                        <a class="category-post food" href="">{{$articles[1]->cats}}</a>
                        <h2><a href="{{$articles[1]->url}}">{{$articles[1]->name}}</a></h2>
                        <ul class="post-tags">
                            <li>
                                <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[1]->published_at)) }}</span>
                            </li>
                        </ul>
                        <p>{{$articles[1]->description}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($articles[2]))
            <div class="news-post image-post">
                <img src="{{ RvMedia::getImageUrl($articles[2]->image, 'medium') }}" alt="{{$articles[2]->name}}">
                <div class="hover-box">
                    <div class="inner-hover">
                        <a class="category-post food" href="">{{$articles[2]->cats}}</a>
                        <h2><a href="{{$articles[2]->url}}">{{$articles[2]->name}}</a></h2>
                        <ul class="post-tags">
                            <li>
                                <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[2]->published_at)) }}</span>
                            </li>
                        </ul>
                        <p>{{$articles[2]->description}}</p>
                    </div>
                </div>
            </div>
        @endif

            @if(isset($articles[3]))
                <div class="news-post image-post">
                    <img src="{{ RvMedia::getImageUrl($articles[3]->image, 'medium') }}" alt="{{$articles[3]->name}}">
                    <div class="hover-box">
                        <div class="inner-hover">
                            <a class="category-post food" href="">{{$articles[3]->cats}}</a>
                            <h2><a href="{{$articles[3]->url}}">{{$articles[3]->name}}</a></h2>
                            <ul class="post-tags">
                                <li>
                                    <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[3]->published_at)) }}</span>
                                </li>
                            </ul>
                            <p>{{$articles[3]->description}}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($articles[4]))
                <div class="news-post image-post">
                    <img src="{{ RvMedia::getImageUrl($articles[4]->image, 'medium') }}" alt="{{$articles[4]->name}}">
                    <div class="hover-box">
                        <div class="inner-hover">
                            <a class="category-post food" href="">{{$articles[4]->cats}}</a>
                            <h2><a href="{{$articles[4]->url}}">{{$articles[4]->name}}</a></h2>
                            <ul class="post-tags">
                                <li>
                                    <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[4]->published_at)) }}</span>
                                </li>
                            </ul>
                            <p>{{$articles[4]->description}}</p>
                        </div>
                    </div>
                </div>
            @endif


            @if(isset($articles[5]))
                <div class="news-post image-post">
                    <img src="{{ RvMedia::getImageUrl($articles[5]->image, 'medium') }}" alt="{{$articles[5]->name}}">
                    <div class="hover-box">
                        <div class="inner-hover">
                            <a class="category-post food" href="">{{$articles[5]->cats}}</a>
                            <h2><a href="{{$articles[5]->url}}">{{$articles[5]->name}}</a></h2>
                            <ul class="post-tags">
                                <li>
                                    <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[5]->published_at)) }}</span>
                                </li>
                            </ul>
                            <p>{{$articles[5]->description}}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($articles[6]))
                <div class="news-post image-post">
                    <img src="{{ RvMedia::getImageUrl($articles[6]->image, 'medium') }}" alt="{{$articles[6]->name}}">
                    <div class="hover-box">
                        <div class="inner-hover">
                            <a class="category-post food" href="">{{$articles[6]->cats}}</a>
                            <h2><a href="{{$articles[6]->url}}">{{$articles[6]->name}}</a></h2>
                            <ul class="post-tags">
                                <li>
                                    <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[6]->published_at)) }}</span>
                                </li>
                            </ul>
                            <p>{{$articles[6]->description}}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($articles[7]))
                <div class="news-post image-post">
                    <img src="{{ RvMedia::getImageUrl($articles[7]->image, 'medium') }}" alt="{{$articles[7]->name}}">
                    <div class="hover-box">
                        <div class="inner-hover">
                            <a class="category-post food" href="">{{$articles[7]->cats}}</a>
                            <h2><a href="{{$articles[7]->url}}">{{$articles[7]->name}}</a></h2>
                            <ul class="post-tags">
                                <li>
                                    <i class="fa fa-clock-o"></i><span>{{ date('Y/m/d', strtotime($articles[7]->published_at)) }}</span>
                                </li>
                            </ul>
                            <p>{{$articles[7]->description}}</p>
                        </div>
                    </div>
                </div>
            @endif

    </div>

</section>
<!-- End heading-news-section -->

