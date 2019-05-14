@extends('layouts.dashboard')

@section('title', 'Stock Brick')

@section('style')

    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">

@endsection

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="portlet light bordered">



                <div class="portlet-body form">

                    {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}

                    <div class="form-body">



                        <div class="form-group">

                            <label class="col-sm-3 control-label">Brick Category : </label>

                            <div class="col-sm-6">

                                <select name="brick_id" id="" class="form-control input-lg" required>

                                    <option value="">Select One</option>

                                    @foreach($brick as $c)

                                        <option value="{{ $c->id }}">{{ $c->name }}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>
                        <div class="form-group">

                            <label class="col-sm-3 control-label"> Stock List : </label>



                            <div class="col-sm-6">

                                <input name="stock_list" value="" class="form-control input-lg" type="text" id="stock_list" required placeholder="Stock List">

                            </div>

                        </div>



                        <div class="form-group">

                            <label class="col-sm-3 control-label"> Stock Date : </label>



                            <div class="col-sm-6">

                                <input name="stock_date" value="" class="form-control input-lg" type="text" id="stock_date" required placeholder="Stock Date">

                            </div>

                        </div>



                        <div class="form-group">

                            <label class="col-sm-3 control-label">Brick Quantity</label>



                            <div class="col-sm-6">

                                <input name="quantity" value="" class="form-control input-lg" type="number" required placeholder="Brick Quantity">

                            </div>

                        </div>



                        <div class="form-group">



                            <div class="row">

                                <div class="col-md-offset-3 col-md-6">

                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Stock Brick</button>

                                </div>

                            </div>

                        </div>

                    </div>

                    {!! Form::close() !!}

                </div>



            </div>

        </div>

    </div><!---ROW-->





@endsection

@section('scripts')



    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>



    <script>



        $(function() {

            $('#stock_date').datepicker({

                dateFormat: "yy-mm-dd",

            }).on('changeDate', function(e) {

                $(this).datepicker('hide');

            });



        });

    </script>



@endsection

