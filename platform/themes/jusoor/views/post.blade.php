<!-- block-wrapper-section
================================================== -->
<section class="block-wrapper article-page">
    <div class="container">
        <div class="row">
            <div class="col-12 row">
                <div class="col-md-9 col-sm-8">

                    <!-- block content -->
                    <div class="block-content">

                        <!-- single-post box -->
                        <div class="single-post-box">

                            <div class="title-post new-dark-style">
                                <p class="dark-bg">{{ date('Y/m/d', strtotime($post->created_at)) }}</p>
                                <br>
                                <ul class="post-tags">
                                    <li><a class="cat"
                                                href="{{ $post->categories->last()->url }}">{{ $post->categories->last()->name }}</a>
                                    </li>
                                </ul>
                                <h1 class="post-title">{{ $post->name }}</h1>
                                <div class="share-post-box">
                                    <ul class="share-box">
                                        <li><a class="facebook" target="_blank"
                                               href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                                        class="fa fa-facebook"></i><span></span></a></li>
                                        <li><a class="twitter" target="_blank"
                                               href="https://twitter.com/share?url={{ urlencode(url()->current()) }}&text={{ $post->description }}"><i
                                                        class="fa fa-twitter"></i><span></span></a></li>

                                        <li><a class="whatsapp"
                                               href="whatsapp://send?text={{ url()->current() }}"
                                               data-action="share/whatsapp/share"><i
                                                        class="fa fa-whatsapp" aria-hidden="true"></i><span></span></a></li>
                                        <li><a class="telegram"
                                               href="javascript:window.open('https://t.me/share/url?url={{ url()->current() }}')"><i
                                                        class="fa fa-telegram" aria-hidden="true"></i><span></span></a></li>
                                        <li><a class="linkedin" target="_blank"
                                               href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}"><i
                                                        class="fa fa-linkedin"></i><span></span></a></li>
                                        <li><a class="google" target="_blank"
                                               href="mailto:?subject={{ $post->name }}&body={{ urlencode($post->url) }} <br> {{ $post->description }}"><i
                                                        class="fa fa-envelope"></i><span></span></a></li>
                                        @if($post->short_link)
                                            <li style="position: relative"><a id="short_link_ico2" class="linkedin"><i
                                                            class="fa fa-link"></i><span>
                                        </span></a>
                                                <div id="short_link" class="short_link"><a class="copy-link "><i
                                                                class="fa fa-copy"></i></a>
                                                    <input class="text_short_link" id="text_short_link" type="text"
                                                           value="https://nedaa-post.com/article/{{ $post->short_link }}"/>
                                                </div>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>

                            <div class="post-gallery">
                                <img src="{{ RvMedia::getImageUrl($post->image) }}"
                                        alt="{{ $post->name }}">
                                <span class="image-caption">{{ $post->caption }}</span>
                            </div>

                            {!!  $post->content !!}

                            <div class="post-tags-box">
                                <ul class="tags-box">
                                    @if (!$post->tags->isEmpty())
                                        <li><i class="fa fa-tags"></i><span>{{__("الكلمات المفتاحية")}}:</span></li>
                                        @foreach ($post->tags as $tag)
                                            <li><a href="{{ $tag->url }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- End block content -->
                </div>

                <div class="col-md-3 col-sm-4">

                    <!-- sidebar -->
                    <div class="sidebar large-sidebar">
                        {!! Theme::partial('sidebar',['limit'=>6]) !!}
                    </div>
                    <!-- End sidebar -->

                </div>
            </div>

            <div class="col-12">
                <section class="block-wrapper block-3">
                    <div class="container">
                        <!-- block content -->
                        <div class="block-content">
                            <!-- grid-box -->
                            <div class="grid-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="title-section">
                                            <h1><span>{{__("You might like it.")}}</span>
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                            <div class="partners-slider  owl-carousel owl-theme">
                                            @foreach (get_related_posts($post->id, 4) as $related_item)
                                                    <div class=" partners item">
                                                        <div class="news-post standard-post">
                                                            <div class="post-gallery ">
                                                                <a href="{{$related_item->url}}"><img src="{{ RvMedia::getImageUrl($related_item->image,'list_main') }}"
                                                                    alt="{{$related_item->name}}"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End grid-box -->
                    </div>
                    <!-- End block content -->
                </section>
            </div>
        </div>
    </div>
</section>

<!-- End block-wrapper-section -->