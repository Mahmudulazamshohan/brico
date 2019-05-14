@extends('layouts.dashboard')
@section('title', 'Customer Edit')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($customer,['route'=>['customer-update',$customer->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $customer->name }}" class="form-control input-lg" type="text" required placeholder="Customer Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="{{ $customer->email }}" class="form-control input-lg" type="email" placeholder="Customer Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer phone : </label>

                            <div class="col-sm-6">
                                <input name="phone" value="{{ $customer->phone }}" class="form-control input-lg" type="text" placeholder="Customer phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Customer Address : </label>

                            <div class="col-sm-6">
                                <input name="address" value="{{ $customer->address }}" class="form-control input-lg" type="text" placeholder="Customer Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brick Category : </label>

                            <div class="col-sm-6">
                                <select name="brick_id" id="" class="form-control input-lg" required >
                                    @foreach($brick as $c)
                                        @if($c->id == $customer->brick_id)
                                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brick Quantity : </label>

                            <div class="col-sm-6">
                                <input name="quantity" value="{{ $customer->quantity }}" class="form-control input-lg" type="number" required placeholder="Brick Quantity">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Update Customer Invoice & Continue</button>
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

