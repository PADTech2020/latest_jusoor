<div id="subscribe-form" name="mc-embedded-subscribe-form"
     class="subscribe-form validate">

    <form class="subscribe-form">
        <h1>{{__('Subscribe To Our Newsletter')}}</h1>
        <input id="csrf" name="csrf" type="hidden" value=" {{ csrf_token() }}">
        <div style="position: relative">
            <input id="mce-email" type="email" name="email" placeholder="{{__("Your Email")}}" >
            <button type="submit" value="Subscribe" id="submit-subscribe">
                <i class="fa fa-arrow-circle-left" ></i>

        </button>
        </div>
        <p>{{__('Subscribe Now To Our Newsletter')}}</p>
    </form>


</div>
<div class="custom-model-main">
    <div class="custom-model-inner">
        <div class="close-btn">×</div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <img style="width: 150px;margin: 0 auto; display: block;" src="https://nedaa-post.com/storage/logo-1.png">
                <br/>
                <br/>
                <p id="pop-up-text"></p>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>
<script>


</script>
