@extends('layouts.home')
@section('title','Home Page')

@section('content')


        <!-- =-=-=-=-=-=-= HOME Banner =-=-=-=-=-=-= -->
<div class="hero-3 full-section " id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>{{ $home->top_title }}</h2>
                <p class="lead">{!! $home->top_description !!}</p>
            </div>
        </div>
    </div>
</div>
<!--======= HOME Banner END =========-->
<!-- =-=-=-=-=-=-= Services =-=-=-=-=-=-= -->
<section class="custom-padding services no-border white">
    <div class="container">
        <!-- title-section -->
        <div class="main-heading text-center">
            <h2>{{ $home->bottom_title }}</h2>
        </div>
        <!-- End title-section -->
        <!-- Row -->
        <div class="row">
            <div id="services-2">
                <!-- Service Item List -->
                <div class="col-md-12">
                    <p class="lead text-center">
                        {!! $home->bottom_description !!}
                    </p>
                </div>
                <div class="clearfix hidden-sm"></div>
                <!-- Service Item List End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Our Services-end =-=-=-=-=-=-= -->


<!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
<section id="blog" class="custom-padding">
    <div class="container">
        <!-- title-section -->
        <div class="main-heading text-center">
            <h2>our Partners</h2>
        </div>
        <!-- End title-section -->
        <!-- Row -->
        <!-- Row -->
        <div class="row">
            <div id="clients" class="text-center">
                <!-- Service Item List -->
                @foreach($partner as $p)
                    <div class="item">
                        <img class="img-responsive" alt="" src="{{ asset('images') }}/{{ $p->image }}">
                    </div>
                @endforeach
                <!-- Service Item List End -->
            </div>
        </div>
        <!-- Row End -->
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->

@endsection