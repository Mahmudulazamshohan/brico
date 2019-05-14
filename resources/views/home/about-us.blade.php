@extends('layouts.home')
@section('title', 'About Us')
@section('content')



        <!-- =-=-=-=-=-=-= PAGE BREADCRUMB =-=-=-=-=-=-= -->
<section class="breadcrumbs-area parallex">
    <div class="container">
        <div class="row">
            <div class="page-title">
                <div class="col-sm-12 col-md-6 page-heading text-left">
                    <h3></h3>
                    <h2></h2>
                </div>
                <div class="col-sm-12 col-md-6 text-right">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- =-=-=-=-=-=-= PAGE BREADCRUMB END =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= About Us =-=-=-=-=-=-= -->
<section class="padding-top-70 white" id="about-compnay">
    <div class="container">
        <div class="row">
            <div class="about">
                <div class="col-md-4 col-sm-12 hidden-sm col-xs-12">
                    <img class="img-responsive center-block" alt="" src="{{ asset('images') }}/{{ $about->image }}">
                </div>
                <!-- end col-md-6 -->
                <div class="col-md-8 col-sm-12 company-history">
                    <h2>{{ $about->title }}</h2>
                    <p>{!! $about->description !!}</p>
                </div>
                <!-- end col-md-5 -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= About Us END =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= SEPARATOR Fun Facts =-=-=-=-=-=-= -->
<div class="parallex section-padding fun-facts-bg text-center" >
    <div class="container">
        <div class="row">
            <!-- countTo -->
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="{{ $total_laborer }}">
                    <div class="facts-icons"> <span class="flaticon-pie-chart-1"></span> </div>
                    <div class="fact">
                        <span class="percentfactor">{{ $total_laborer }}</span>
                        <p>Total Laborer</p>
                    </div>
                    <!-- end fact -->
                </div>
                <!-- end statistic-percent -->
            </div>
            <!-- end col-xs-6 col-sm-3 col-md-3 -->
            <!-- countTo -->
            @foreach($stock as $s)
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="{{ $s->quantity }}">
                    <div class="facts-icons"> <span class="flaticon-graph-3"></span> </div>
                    <div class="fact">
                        <span class="percentfactor">{{ $s->quantity }}</span>
                        <p>{{ $s->brick->name }}</p>
                    </div>
                    <!-- end fact -->
                </div>
                <!-- end statistic-percent -->
            </div>
            @endforeach
        </div>
        <!-- End row -->
    </div>
    <!-- end container -->
</div>
<!-- =-=-=-=-=-=-= SEPARATOR END =-=-=-=-=-=-= -->

@endsection