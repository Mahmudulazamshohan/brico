@extends('layouts.dashboard')
@section('title', 'Lender Show')
@section('content')

    @if(count($lender))

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
                                <th>SL#</th>
                                <th>Lender Name</th>
                                <th>Lender Email</th>
                                <th>Lender Phone</th>
                                <th>Lender Address</th>
                                <th>Lender Brick</th>
                                <th>Lender Amount</th>
                                <th>Created Date</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 0 @endphp
                            @foreach($lender as $p)
                                @php $i++ @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->phone }}</td>
                                    <td>{{ $p->address }}</td>
                                    <td>{{ $p->brick->name}} - {{ $p->brick_quantity}}</td>
                                    <td>{{ $p->currency->name }} - {{ $p->amount }}</td>
                                    <td>{{ date('d-M-Y',strtotime($p->created_date)) }}</td>
                                    <td>{{ date('d-M-Y',strtotime($p->delivery_date)) }}</td>
                                    <td>
                                        @if($p->status == 0)
                                            <span class="label label-primary"><b>Not Delivery</b></span>
                                        @else
                                            <span class="label label-primary"><b>Delivered</b></span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->status == 0)
                                            <a href="{{ route('lender-delivery',$p->id) }}" class="btn purple btn-sm"><i class="fa fa-check"></i> <b>Delivery Completed</b></a>
                                        @else
                                            <span class="label label-primary"><i class="fa fa-check"></i> <b>Delivered</b></span>
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


        <div class="text-center">
            {!! $lender->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Lender Available</h3>
        </div>
    @endif

@endsection
