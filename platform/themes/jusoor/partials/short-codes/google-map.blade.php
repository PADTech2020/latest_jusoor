{{--<div style="height: 400px; width: 100%; position: relative; text-align: right;">--}}
    {{--<div  style="height: 400px; width: 100%; overflow: hidden; background: none!important;">--}}
        {{--<iframe width="100%" height="550" src="https://maps.google.com/maps?q={{ addslashes($address) }}%20&t=&z=13&ie=UTF8&iwloc=&output=embed"--}}
                {{--frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>--}}
    {{--</div>--}}
{{--</div>--}}

<div style="height: 450px;" id="map"></div>
<script>
    function initMap() {
        // The location of Uluru
        const uluru = { lat:"<?=  theme_option('map-lat') ?>", lng:" <?=  theme_option('map-long') ?>" };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
</script>