<section class="block-wrapper new-dark-style researcher-header">
    <div class="container">
        <!-- block content -->
        <div class="block-content  block-author">
            <div class="">
                <img width="150" src="/storage/general/logo-light-jusoor.png"/>
            </div>
            <div class="author-content-header">
                <br>
                <p><span class="position">{{ __('مركز جسور للدراسات مؤسسة مستقلة متخصصة في إدارة المعلومات ') }}</span></p>
                <p><span class="position">{{ __(' وإعداد الدراسات، والأبحاث المتعلقة بالشأن السياسي, والاجتماعي, السوري  ') }}</span></p>

            </div>

        </div>
    </div>
    </div>
</section>
<section class="researchers-list">
    <div class="container">
        <!-- block content -->

        <div class="row">
            <div class="title-section m-r-7">
                <h1><span>{{__('الإدارة')}}</span></h1>
            </div>
            <div class="col-md-12">
                <div class="block-content block-author" >
                    <a href="/articles/{{ $researchers[0]->id }}">
                        <div class="author-img">
                            <img width="150" src="{{RvMedia::getImageUrl($researchers[0]->image, 'thumb') }}"/>
                        </div>
                    </a>
                    <div class="author-content">
                        <a href="/articles/{{ $researchers[0]->id }}">
                            <h2><span class="author-name">{{ $researchers[0]->name }}</span></h2>
                        </a>
                        <h4><span class="position">{{ $researchers[0]->position }}</span></h4>
                        <br>
                        <p><span class="position">{!! Str::words($researchers[0]->summary)  !!} </span></p>
                    </div>
                </div>
            </div>
        </div>

        @php
            unset($researchers[0]);
        @endphp

        
        <div class="row">

            <div class="title-section m-r-7">
                <h1><span>{{__('الباحثون في المركز')}}</span></h1>
            </div>
            @foreach($researchers as $researcher)
                <div class="col-md-4">
                    <div class="block-content block-author" >
                    <a href="/articles/{{ $researcher->id }}">
                        <div class="author-img">
                            <img width="150" src="{{RvMedia::getImageUrl($researcher->image, 'thumb') }}"/>
                        </div>
                    </a>
                    <div class="author-content">
                        <a href="/articles/{{ $researcher->id }}">
                            <h2><span class="author-name">{{ $researcher->name }}</span></h2>
                        </a>
                        <h4><span class="position">{{ $researcher->position }}</span></h4>
                        <br>
                        <p><span class="position">{!! Str::words($researcher->summary, '15')  !!} </span></p>
                    </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>



<!-- block-wrapper-section
