@extends('layouts.dashboard')
@section('title', 'All Salary')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
@endsection
@section('content')


    @if(count($salary))

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
                                {!! Form::open(['route'=>'laborer-bill-search','method'=>'post','class'=>'form-inline margin-bottom-5']) !!}

                                <div class="form-group">
                                    <label for="exampleInputName2">Start Date</label>
                                    <input type="text" name="start_date" class="form-control" id="start_date" placeholder="start Date" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">End Date</label>
                                    <input type="text" name="end_date" class="form-control" id="end_date" placeholder="End Date" required>
                                </div>
                                &nbsp;&nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> View Salary</button>

                                {!! Form::close() !!}

                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Salary / Day</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0; @endphp
                            @foreach($salary as $p)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->laborer->name }}</td>
                                    <td>{{ $p->laborer->code }}</td>
                                    <td>{{ $p->laborer->phone }}</td>
                                    <td>{{ date('d-F-Y',strtotime($p->salary_date)) }}</td>
                                    <td>{{ $p->laborer->currency->name }} - {{ $p->laborer->salary }} / Day</td>
                                    <td>
                                        @if($p->status == 0)
                                            <span class="label label-info"><b><i class="fa fa-times" aria-hidden="true"></i> UnPaid</b></span>
                                        @else
                                            <span class="label label-success"><b><i class="fa fa-check" aria-hidden="true"></i> Paid</b></span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->status == 0)
                                            <a href="{{ route('laborer-bill-pay',$p->id) }}" onclick="return confirm('Are You Sure.')" class="btn purple btn-sm" data-toggle="tooltip2" data-placement="top" title="Pay Laborer Bill"><i class="fa fa-credit-card"></i> Pay Bill</a>
                                        @else
                                            <span class="label label-success"><i class="fa fa-credit-card"></i> Completed</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->

    @else

        <div class="text-center">No Salary Available</div>

    @endif

@endsection

@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip2"]').tooltip()
        });
    </script>

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


