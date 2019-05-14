@extends('layouts.dashboard')
@section('title', 'Laborer Edit')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($laborer,['route'=>['laborer-update',$laborer->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Laborer Name : </label>

                            <div class="col-sm-6">
                                <input name="name" value="{{ $laborer->name }}" class="form-control input-lg" type="text" required placeholder="Laborer Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Laborer Email : </label>

                            <div class="col-sm-6">
                                <input name="email" value="{{ $laborer->email }}" class="form-control input-lg" type="email" placeholder="Laborer Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Laborer Phone : </label>

                            <div class="col-sm-6">
                                <input name="phone" value="{{ $laborer->phone }}" class="form-control input-lg" type="number" required placeholder="Laborer Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Laborer Salary / Day : </label>

                            <div class="col-sm-2">
                                <select name="currency_id" id="" class="form-control input-lg" required>
                                    @foreach($currency as $c)
                                        @if($c->id != $laborer->currency_id)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input name="salary" value="{{ $laborer->salary }}" class="form-control input-lg" type="number" required placeholder="Laborer Salary Par Day">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Update Laborer</button>
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
