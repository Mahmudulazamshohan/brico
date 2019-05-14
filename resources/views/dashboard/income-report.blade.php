@extends('layouts.dashboard')
@section('title', 'All Sell Report')
@section('content')


    @if(count($sell))

        <div class="row">
            <div class="col-md-12">


                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Date</th>
                                <th>Total Sell</th>
                                <th>Total Expense</th>
                                <th>Laborer Salary</th>
                                <th>Net Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0 @endphp
                            @foreach($sell as $p)
                                @php $i++ @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date('d-F-Y',strtotime($p->sell_date)) }}</td>
                                    <td>{{ $p->currency->name}} - {{ $p->amount }}</td>
                                    <td>
                                        @if($p->expense_bill != null)
                                            {{ $p->currency->name }} - {{ $p->expense_bill }}
                                        @else
                                            <span class="label label-primary"><b>No Expense</b></span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->laborer_bill != null)
                                            {{ $p->currency->name }} - {{ $p->laborer_bill }}
                                        @else
                                            <span class="label label-primary"><b>No Laborer Bill</b></span>
                                        @endif
                                    </td>
                                    <td>{{ $p->currency->name }} - {{ $p->total_sell }}</td>
                                    <td>
                                        <a href="{{ route('report-invoice',date('Y-m-d',strtotime($p->sell_date)) ) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View Invoice</a>
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
            {!! $sell->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Sell Report Available</h3>
        </div>
        @endif



@endsection
