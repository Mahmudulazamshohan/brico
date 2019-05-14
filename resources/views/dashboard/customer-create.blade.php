@extends('layouts.dashboard')

@section('title', 'Customer')

@section('content')



    <div class="row">

        <div class="col-md-12">
            <div class="row" style="background: #FAA001; margin-bottom: 2px;">
                <div class="col-sm-12">
                    <h1 class="text-center"><i class="fa fa-user-plus"></i> Add New Customer</h1>
                    <h3 class="text-center">You can create new customer with the help of the form below</h3>
                </div>
            </div>

            <div class="portlet light bordered">



                <div class="portlet-body form">

                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}

                    <div class="form-body">

                       <input type="hidden" name="date" value="{{date('Y-m-d')}}">


                         <div class="form-group" style="margin-bottom: 40px;">

            
                            <div class="col-sm-12 col-md-12 col-lg-4">

                                <label class="text-left" style="font-size: 22px;">Customer Name</label>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                  <input type="text" name="name" name="name" class="form-control input-lg"  aria-describedby="basic-addon1">
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label class="text-left" style="font-size: 22px;">Customer E-mail</label>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1" style="color: #4D6B8A;font-weight: bold;">@</span>
                                  <input type="text" name="email" class="form-control input-lg" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                 <label class="text-left" style="font-size: 22px;">Customer Phone</label>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                  <input type="text" name="phone" class="form-control input-lg" aria-describedby="basic-addon1">
                                </div>
                            </div>

                        </div>
                        <div class="form-group" style="margin-bottom: 40px;">
                            <div class="col-sm-12">
                                <label class="text-left" style="font-size: 22px;">Customer Address</label>
                                <textarea name="address" class=" form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 40px;">

                            <div class="col-sm-2"></div>
                            <div class="col-sm-12 col-md-12 col-lg-4">

                                <label class="text-left" style="font-size: 22px;">Identifier Name</label>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                  <input type="text" name="identifier_name" class="form-control input-lg"  aria-describedby="basic-addon1">
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <label class="text-left" style="font-size: 22px;">Identifier Phone</label>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon3"><i class="fa fa-phone"></i></span>
                                  <input type="text" name="identifier_mobile_no" class="form-control input-lg"  aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                           

                        </div>

                        
                         

                       

                        <div class="form-group">

                            <div class="row">
                                <div class="col-lg-4"></div>
                               

                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a class="btn btn-default" style="background: #ccc;border-radius: 0px;">Cancel</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-default"  style="background: #ccc;border-radius: 0px; padding-left: 15px;padding-right: 15px;"> Add</button>
                                        </div>
                                    </div>
                                    

                                    

                                </div>
                                 <div class="col-lg-4"></div>

                            </div>

                        </div>


                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div><!---ROW-->





@endsection



