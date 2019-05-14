@extends('layouts.dashboard')
@section('title', 'Stock Invoice Edit')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">

                <div class="portlet-body form">
                    {!! Form::model($invoice,['route'=>['stock-update',$invoice->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    {{--<input type="hidden" name="invoice_id" value="{{ $invoice->id }}">--}}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brick Category : </label>
                            <div class="col-sm-6">
                                <select name="brick_id" id="" class="form-control input-lg" required>
                                    @foreach($brick as $c)
                                        @if($c->id == $invoice->brick_id)
                                        <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Stock Date : </label>

                            <div class="col-sm-6">
                                <input name="stock_date" value="{{ $invoice->stock_date }}" class="form-control input-lg" type="text" id="stock_date" required placeholder="Stock Date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Brick Quantity</label>

                            <div class="col-sm-6">
                                <input name="quantity" value="{{ $invoice->quantity }}" class="form-control input-lg" type="number" required placeholder="Brick Quantity">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn blue btn-block margin-top-10"><i class="fa fa-paper-plane"></i> Update Stock Brick</button>
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

