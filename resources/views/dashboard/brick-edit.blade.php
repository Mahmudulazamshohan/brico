@extends('layouts.dashboard')
@section('title', 'Brick Edit')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($brick,['route'=>['brick-update',$brick->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brick Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $brick->name }}" class="form-control input-lg" type="text" required placeholder="Brick Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Currency : </label>

                            <div class="col-sm-6">
                                <select name="currency_id" id="" class="form-control input-lg">
                                    @foreach($currency as $c)
                                        @if($c->id == $brick->currency_id)
                                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brick Rate / Pic : </label>

                            <div class="col-sm-6">
                                <input name="rate" value="{{ $brick->rate }}" class="form-control input-lg" type="number" required placeholder="Brick Rate Par Pic">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Update Brick</button>
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

