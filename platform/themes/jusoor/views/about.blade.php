<section class="block-wrapper non-sidebar sky-news">
    <div class="container">
        <!-- block content -->
        <div class="block-content non-sidebar">
            <!-- grid-box -->
            <div class="grid-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="title-section">
                            <h1>
                                <span>{{__("About Jusoor")}}</span>
                            </h1>
                        </div>
                        <div class="block-wrapper new-dark-style researcher-header">
                            <div class="container">
                                <!-- block content -->
                                <div class="block-content  block-author">
                                    <div class="">
                                        <img width="150" src="/storage/general/logo-light-jusoor.png"/>
                                    </div>
                                    <div class="author-content-header">
                                        <br>
                                        <p>
                                            <span class="position">{{ __('مركز جسور للدراسات مؤسسة مستقلة متخصصة في إدارة المعلومات ') }}</span>
                                        </p>
                                        <p>
                                            <span class="position">{{ __(' وإعداد الدراسات، والأبحاث المتعلقة بالشأن السياسي, والاجتماعي, السوري  ') }}</span>
                                        </p>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="content-page">
                            {!! theme_option('about-us') !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- sidebar -->
                        <div class="sidebar">
                            {!! Theme::partial('sidebar',['limit'=>4]) !!}
                        </div>
                        <!-- End sidebar -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End grid-box -->
    </div>
    <!-- End block content -->
    </div>
</section>