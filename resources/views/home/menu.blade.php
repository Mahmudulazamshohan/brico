@extends('layouts.home')
@section('title', "$menu_name" )
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
                <!-- end col-md-6 -->
                <div class="col-md-12 col-sm-12 company-history">
                    <p>{!! $menu_description !!}</p>
                </div>
                <!-- end col-md-5 -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= About Us END =-=-=-=-=-=-= -->


@endsection