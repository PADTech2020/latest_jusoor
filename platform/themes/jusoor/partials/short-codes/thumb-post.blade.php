
<div class=" ">
    @if($post)
        <ul class=" col-md-12" style="list-style-type: none;">
                <li class="col-md-6 thumb-box">
                    <div class="col-md-4">
                        <a href="{{$post->url}}"><img width="100%" src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}"
                                                      alt="{{$post->name}}"></a>
                    </div> <div class="col-md-8">
                        <div class="post-content">
                            <h2><a href="{{$post->url}}">{{Str::words($post->name, '10')}}</a></h2>
                            <p>{{Str::words($post->description, '10')}}</p>
                        </div>
                    </div>
                </li>
        </ul>

    @endif
</div>