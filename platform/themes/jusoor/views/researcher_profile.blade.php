
<section class="block-wrapper new-dark-style researcher-header">
    <div class="container">
        <!-- block content -->
        <div class="block-content  block-author">
            <div class="author-img">
               <img width="150" src="{{RvMedia::getImageUrl($researcher->image,'thumb') }}"/>
            </div>
            <div class="author-content">
                <h2><span class="author-name">{{ $researcher->name }}</span></h2>

                <p><span class="position">{{ $researcher->position }}</span></p>
                {{--<p>{{ $researcher->summary }}</p>--}}
            </div>

        </div>
    </div>
    </div>
</section>




<!-- block-wrapper-section
