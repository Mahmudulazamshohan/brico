@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('style')
<style type="text/css">
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    
</style>
 @endsection



@section('content')


@php
$color =['dark','blue','red','yellow-gold',"blue-hoki","blue-ebonyclay","purple-studio","green-meadow"];
//echo rand(0,4);
$c=0;
@endphp

<div class="row">
        <!-- START -->

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <div class="dashboard-stat blue-ebonyclay">

        <div class="visual">

            <i class="fa fa-list"></i>

        </div>

        <div class="details">

            <div class="number">{!! $total_customer !!}</div>

            <div class="desc">Total Customer</div>

        </div>

    </div>

</div>

<!-- END -->





<!-- START -->

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <div class="dashboard-stat purple-studio">

        <div class="visual">

            <i class="fa fa-list"></i>

        </div>

        <div class="details">

            <div class="number">{!! $total_laborer !!}</div>

            <div class="desc">Total Laborer</div>

        </div>

    </div>

</div>

<!-- END -->



@foreach($stock as $s)

<!-- START -->


<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      @if($c ==7)
    <div class="dashboard-stat {{$color[rand(0,7)]}}" style="box-shadow: 1px 2px 2px rgba(0,0,0,0.1);">
      @php
      $c=0;
      @endphp
      @else
      <div class="dashboard-stat {{$color[rand(0,7)]}}" style="box-shadow: 1px 2px 2px rgba(0,0,0,0.1);">
      @endif

        <div class="visual">

            <i class="fa fa-list"></i>

        </div>

        <div class="details">

            <div class="number">{{ $s->quantity }} - Pic</div>

            <div class="desc">{{ $s->brick->name }}</div>

        </div>

    </div>

</div>


<!-- END -->

@endforeach
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"></div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

    <div class="dashboard-stat " style="border: 10px solid #d4e157 ;background: #cddc39!important;height: 150px; width: 300px;">

        <div class="visual">

            <i class="fa fa-eye" style="margin-left: 0px;line-height: 80px;color: rgba(255,255,255,0.5); "></i>

        </div>

        <div class="details">

            <div class="number"></div>

            <div class="desc">
                <div id="date" class="btn btn-default">Date</div>
                <div id="month" class="btn btn-default">Month</div>
                <div id="year" class="btn btn-default">Year</div>
                <div id="appendChild" style="margin-top: 4px;margin-bottom: 4px;">
                    
                </div>
                

                <a class="btn btn-default" id="daily_report" style="background: #8bc34a;border-width: 0px; border:2px solid #9ccc65;color:#ffffff;"><i class="fa fa-arrow-right" style="color:#fff;"></i>Daily Report</a>
            </div>

        </div>

    </div>

</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <div class="row" >
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div  style="width: 100%;border:2px solid #32C5D2; box-shadow: 1px 2px 2px rgba(0,0,0,0.4);padding:4px;">
        <canvas id="canvas"></canvas>
        <progress id="animationProgress" max="1" value="0" style="width: 100%"></progress>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 4px;border:2px solid #FF6384;box-shadow: 1px 2px 2px rgba(0,0,0,0.1); ">
   
        <center>
            <div id="canvas-holder" style="width:53%; ">
              <canvas id="chart-area"></canvas>
            </div>
        </center>
   
        
    </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" >
<div class="row">
    <div class="col-lg-6" style="border:2px solid #1BBC9B;margin-top: 6px;box-shadow: 1px 2px 2px rgba(0,0,0,0.1);">
        <div id="container" style="width: 100%;">
        <canvas id="barChart"></canvas>
        </div>
    </div>
    <div class="col-lg-6">
        <div style="width:100%;box-shadow: 1px 2px 2px rgba(0,0,0,0.1);border:2px solid #8E44AD;margin-top: 4px;">
        <canvas id="minMaxChart"></canvas>
    </div>
    </div>
</div>
    
</div>
</div>

    
    

@section('scripts')
    {{-- <script src="http://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
    <script src="http://www.chartjs.org/samples/latest/utils.js"></script> --}}
    <script src="http://ranabricks.zoomerlens.com/assets/global/scripts/Chart.bundle.js"></script>
    <script src="http://ranabricks.zoomerlens.com/assets/global/scripts/utils.js"></script>
<script type="text/javascript">
    $('#date').click(function() {
        $('#appendChild').empty();
        $('#appendChild').append('<input type="date" class="form-control input-sm" name="dates" id="realDate" onchange="realDate(this)">');
        $("#daily_report").removeAttr('href');
        
        
    });
    // $('#daily_report').click(function(event) {
    //     $('#daily_report').attr('href', "{{url('all-my-report')}}"+);
    // });

       
    
     $('#year').click(function() {
        $('#appendChild').empty();
        $('#appendChild').append('<input type="text" class="form-control input-sm" name="dates" id="realDate" value="" onchange="realDate(this)">');
    });
      $('#month').click(function() {
        $('#appendChild').empty();
        $('#appendChild').append('<input type="month" class="form-control input-sm" name="dates" id="realDate" onchange="realDate(this)">');
    });
      function realDate(e){
        
         $('#daily_report').attr('href', "{{url('all-my-report')}}/"+e.value);
       }
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var progress = document.getElementById('animationProgress');
        var config = {
            type: 'line',
            data: {
                label:"Hello",
                labels: MONTHS,
                datasets: [{
                    fill: false,
                    borderColor: window.chartColors.red,
                    backgroundColor: window.chartColors.red,
                    data: [
                        10,
                        12,
                        13,
                        31,
                        21,
                        32,
                        23
                    ]
                }, {
                    label: "My Second dataset ",
                    fill: false,
                    borderColor: window.chartColors.blue,
                    backgroundColor: window.chartColors.blue,
                    data: [
                        14,
                        18,
                        13,
                        32,
                        21,
                        44,
                        26,
                        25
                    ]
                },
                {
                    label: "My Second dataset ",
                    fill: false,
                    borderColor: window.chartColors.green,
                    backgroundColor: window.chartColors.green,
                    data: [
                        12,
                        13,
                        14,
                        378,
                        21,
                        44,
                        26,
                        28
                    ]
                }]
            },
            options: {
                title:{
                    display:true,
                    text: "Line Chart"
                },
                animation: {
                    duration: 2000,
                    onProgress: function(animation) {
                        progress.value = animation.currentStep / animation.numSteps;
                    },
                    onComplete: function(animation) {
                        window.setTimeout(function() {
                            progress.value = 0;
                        }, 2000);
                    }
                }
            }
        };
        var configChartPie = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    50,
                    20,
                    10,
                    12,
                    18,
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow",
                "Green",
                "Blue"
            ]
        },
        options: {
            responsive: true
        }
    };


        var color = Chart.helpers.color;
        var barChartData = {
            labels: MONTHS,
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ]
            }, {
                label: 'Dataset 2',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ]
            }]

        };
         var minMaxChartConfig= {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [10, 30, 50, 20, 25, 44, -10],
                    fill: false,
                }, {
                    label: "My Second dataset",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [100, 33, 22, 19, 11, 49, 30],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Min and Max Settings'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 10,
                            max: 50
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
            var ctx = document.getElementById("chart-area").getContext("2d");
            window.myPie = new Chart(ctx, configChartPie);
             var ctx = document.getElementById("barChart").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            });
            var ctx = document.getElementById("minMaxChart").getContext("2d");
            window.myLine = new Chart(ctx, minMaxChartConfig);
        };

        // document.getElementById('randomizeData').addEventListener('click', function() {
        //     config.data.datasets.forEach(function(dataset) {
        //         dataset.data = dataset.data.map(function() {
        //             return randomScalingFactor();
        //         });
        //     });

        //     window.myLine.update();
        // });
</script>
@endsection


@endsection