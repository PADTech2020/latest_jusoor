<?php
$researcher = \Botble\Researchers\Models\Researchers::find($id);

if($id !== 8){
    $r_posts = Botble\Blog\Models\Post::join("language_meta", function ($join) {
        $join->on("language_meta.reference_id", "=", "id")
                ->where(["language_meta.reference_type"=> 'Botble\Blog\Models\Post','language_meta.lang_meta_code'=>'ar']);
    })->where(['status' => Botble\Base\Enums\BaseStatusEnum::PUBLISHED(), 'researcher_id' => $researcher->id])->limit(4)->orderBy('created_at','desc')->get();
}else{
    $r_posts = get_related_posts($post->id, 4);
}

?>

<div id="author-box" class="author-box single-post-box">
    <div class="about-more-autor">
        <div class="autor-box authorbox">
            <a href="/articles/{{ $researcher->id }}"><img src="{{ get_object_image( $researcher->image, 'thumb') }}" alt="{{ $researcher->name }}"></a>
            <div class="autor-content">
                <div class="autor-title">
                <a href="/articles/{{ $researcher->id }}"><h1>{{ $researcher->getName() }}</h1></a>
                    <ul class="autor-social">
                        <li><a href="{{ $researcher->facebook }}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $researcher->twitter }}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $researcher->instagram }}" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <p>{{ str_replace("&nbsp;", "", strip_tags($researcher->summary)) }}</p>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="author-box-posts">
    @foreach ($r_posts as $post)
        <div class="news-post article-post">
            <div class="col-sm-12 autor-box authorbox">
                <div class="post-gallery">
                    <a href="{{ $post->url }}"><img alt="{{ $post->name }}" src="{{ RvMedia::getImageUrl($post->image, 'list_main') }}"></a>
                    <a class="category-post world" href="{{$post->categories->first()->url}}">{{$post->categories->first()->name}}</a>
                </div>
                <div class="post-content">
                    <h5><a href="{{ $post->url }}">{{ $post->name }}</a></h5>
                    <ul class="post-tags">
                        <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}</li>
                        <li><i class="fa fa-user"></i><a href="/articles/{{ $post->researcher->id }}">{{ $post->researcher->getName() }}</a></li>
                        <!-- <li><i class="fa fa-eye"></i>{{ $post->views }}</li> -->
                    </ul>

                </div>
            </div>
        </div>
    @endforeach
</div>
