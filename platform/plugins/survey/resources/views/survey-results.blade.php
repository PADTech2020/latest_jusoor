@extends('core/base::layouts.master')
@push('header')
<?php

$options = [];
        $dates=[];
if ($survey->type == 1) {

    foreach ($results as $result) {
        if (isset($options[$result->answer])) {
            $options[$result->answer] += 1;
        } else {
            $options[$result->answer] = 1;
        }

    }
    foreach ($results as $result) {
        if (isset($dates[date_format($result->created_at,'D M Y')])) {
            $dates[date_format($result->created_at,'D M Y')] += 1;
        } else {
            $dates[date_format($result->created_at,'D M Y')] = 1;
        }

    }
}
$keys=[];
$values=[];
foreach ($options as $key => $value) {
    $keys[]=$key;
    $values[]=$value;
}

$dates_keys=[];
$dates_values=[];
foreach ($dates as $key => $value) {
    $dates_keys[]=$key;
    $dates_values[]=$value;
}


?>
<script>
    "use strict";

</script>
@endpush
@section('content')


    <link href="https://cdn.quilljs.com/1.3.4/quill.bubble.css" rel="stylesheet">
    <div class="main-form col-md-12 ">
        <h2>{{$survey->name}}</h2>
        <p>{{__('العدد الكلي للأصوات')}} : {{count($results)}}</p>
    </div>
    <div class="col-md-12">
        <div class="main-form ">
            <div class="col-md-12 row">
                <div class="col-md-6">
            <div id="chart">
            </div></div>
                <div class="col-md-6"><div id="chart2">
            </div>
            </div> </div>
        </div>
    </div>

@stop

@push('footer')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'صوت',
            data: <?= json_encode($values) ?>
        }],
        xaxis: {
            categories: <?= json_encode($keys) ?>
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();

    var options2 = {
        chart: {
            height: 280,
            type: "area"
        },
        dataLabels: {
            enabled: false
        },
        series: [
            {
                name: "Series 1",
                data:<?= json_encode($dates_values) ?>
            }
        ],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 10, 20, 90]
            }
        },
        xaxis: {
            categories: <?= json_encode($dates_keys) ?>
        }
    };

    var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

    chart2.render();

</script>
<script>
    "use strict";


</script>
@endpush
