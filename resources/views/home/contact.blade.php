@extends('layouts.home')
@section('title','Contact Us')
@section('content')

        <!-- =-=-=-=-=-=-= PAGE BREADCRUMB =-=-=-=-=-=-= -->
<section class="breadcrumbs-area parallex">
    <div class="container">
        <div class="row">
            <div class="page-title">
                <div class="col-sm-12 col-md-6 page-heading text-left">

                </div>
                <div class="col-sm-12 col-md-6 text-right">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- =-=-=-=-=-=-= PAGE BREADCRUMB END =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Contact Us =-=-=-=-=-=-= -->
<section id="contact-us" class="section-padding-70">
    <div class="container">
        <!-- Row -->
        <div class="row">
            <div class="col-md-8 col-xs-12 col-sm-12  ">
                <!--  ==================================SESSION MESSAGES==================================  -->
            @if (session()->has('message'))
                <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {!! session()->get('message')  !!}
                </div>
            @endif
            <!--  ==================================SESSION MESSAGES==================================  -->

                {!! Form::open(['route'=>'contact-sent']) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Name -->
                            <div class="form-group">
                                <label>Name<span class="required">*</span></label>
                                <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <!-- End col-sm-6 -->
                        <div class="col-sm-6">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email<span class="required">*</span></label>
                                <input type="email" placeholder="Email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <!-- End col-sm-6 -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Email -->
                            <div class="form-group">
                                <label>Subject<span class="required">*</span></label>
                                <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <!-- End col-sm-12 -->

                    <!-- End col-sm-12 -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Comment -->
                            <div class="form-group">
                                <label>Message<span class="required">*</span></label>
                                <textarea placeholder="Message..." id="message" name="message"  class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- End col-sm-12 -->
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" id="yes" class="btn btn-primary">Send Message</button>
                            <img id="loader" alt="" src="{{ asset('images/loader.gif') }}" class="loader">
                        </div>
                    </div>
                    <!-- End col-sm-6 -->
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12 margin-top-30">

                <div class="location-box"> <a class="media-left pull-left" href="#"> <i class=" icon-map"></i></a>
                    <div class="media-body"> <strong>OUR OFFICE LOCATION</strong>
                        <p>{{ $general->address }}</p>
                    </div>
                </div>
                <div class="location-box"> <a class="media-left pull-left" href="#"> <i class=" icon-envelope"></i></a>
                    <div class="media-body"> <strong>OUR CONTACT E-MAIL</strong>
                        <p>{{ $general->email }}</p>
                    </div>
                </div>
                <div class="location-box"> <a class="media-left pull-left" href="#"> <i class="icon-phone"></i></a>
                    <div class="media-body"> <strong>Call us 24/7</strong>
                        <p>{{ $general->number }} </p>
                    </div>
                </div>

            </div>

            <div class="clearfix"></div>
        </div>
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Contact Us End =-=-=-=-=-=-= -->


@endsection