@extends('layouts.dashboard')
@section('title', 'Create Loan')
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
                            <label class="col-sm-3 control-label">Lender Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Lender Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lender Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="" class="form-control input-lg" type="email" required placeholder="Lender Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lender Phone : </label>
                            <div class="col-sm-6">
                                <input name="phone" value="" class="form-control input-lg" type="text" required placeholder="Lender Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lender Address : </label>

                            <div class="col-sm-6">
                                <input name="address" value="" class="form-control input-lg" type="text" required placeholder="Lender Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brick Quantity : </label>

                            <div class="col-sm-2">
                                <select name="brick_id" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @foreach($brick as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input name="brick_quantity" value="" class="form-control input-lg" type="number" required placeholder="Brick Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lender Amount : </label>

                            <div class="col-sm-2">
                                <select name="currency_id" id="" class="form-control input-lg" required>
                                    <option value="">Select One</option>
                                    @foreach($currency as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input name="amount" value="" class="form-control input-lg" type="number" required placeholder="Lender Amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Delivery Date : </label>

                            <div class="col-sm-6">
                                <input name="delivery_date" value="" id="start_date" class="form-control input-lg" type="text" required placeholder="Delivery Date">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Create Lender & Continue</button>
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
            $('#start_date').datepicker({
                dateFormat: "yy-mm-dd",
            }).on('changeDate', function(e) {
                $(this).datepicker('hide');
            });

        });

    </script>

@endsection

