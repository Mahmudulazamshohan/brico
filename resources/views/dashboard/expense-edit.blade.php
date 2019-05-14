@extends('layouts.dashboard')
@section('title', 'Expense Edit')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($expense,['route'=>['expense-update',$expense->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-body">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Expense Reason : </label>

                            <div class="col-sm-6">
                                <input name="reason" value="{{ $expense->reason }}" class="form-control input-lg" type="text" required placeholder="Expense Reason">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Expense Note : </label>

                            <div class="col-sm-6">
                                <textarea name="note" id="" cols="30" rows="3"
                                          class="form-control input-lg" placeholder="Expense Note">{{ $expense->note }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Expense Currency : </label>

                            <div class="col-sm-6">
                                <select name="currency_id" id="" class="form-control input-lg">
                                    @foreach($currency as $c)
                                        @if($c->id == $expense->currency_id)
                                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Expense Amount: </label>

                            <div class="col-sm-6">
                                <input name="amount" value="{{ $expense->amount }}" class="form-control input-lg" type="number" required placeholder="Expense Amount">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10">Update Expense</button>
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

