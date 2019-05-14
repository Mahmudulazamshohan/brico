@extends('layouts.dashboard')
@section('title', 'All Expense')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
@endsection
@section('content')


    @if(count($expense))

        <div class="row">
            <div class="col-md-12">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-10">
                                {!! Form::open(['route'=>'expense-search','method'=>'post','class'=>'form-inline margin-bottom-5']) !!}

                                    <div class="form-group">
                                        <label for="exampleInputName2">Start Date</label>
                                        <input type="text" name="start_date" class="form-control" id="start_date" placeholder="start Date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">End Date</label>
                                        <input type="text" name="end_date" class="form-control" id="end_date" placeholder="End Date" required>
                                    </div>
                                    &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> View Expense</button>

                                {!! Form::close() !!}

                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Expense Date</th>
                                <th>Reason</th>
                                <th>Note</th>
                                <th>Amount</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0 @endphp
                            @foreach($expense as $p)
                                @php $i++ @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-y : h:i:s A', strtotime($p->created_at) ) }}</td>
                                    <td>{{ $p->reason }}</td>
                                    <td>
                                        @if($p->note != null)
                                            {{ $p->note }}
                                        @else
                                            <span class="label label-info">Not Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->currency->name }} - {{ $p->amount }} </td>
                                    <td>{{ $p->created_by }} </td>
                                    <td>
                                        <a href="{{ route('expense-edit',$p->id) }}" class="btn purple btn-sm"><i class="fa fa-edit"></i> EDIT</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->


        <div class="text-center">
            {!! $expense->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Expense Available</h3>
        </div>
        @endif

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
        $(function() {
            $('#end_date').datepicker({
                dateFormat: "yy-mm-dd",
            }).on('changeDate', function(e) {
                $(this).datepicker('hide');
            });

        });
    </script>

@endsection

