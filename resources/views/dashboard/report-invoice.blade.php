@extends('layouts.dashboard')
@section('title', 'Invoice Report')
@section('content')


    @if(count($invoice))

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Brick Category</th>
                                <th>Rate / Pic</th>
                                <th>Quantity / Pic</th>
                                <th>Total Bill</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0;@endphp
                            @foreach($invoice as $p)
                                @php $i++;@endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->customer->name }}</td>
                                    <td>
                                        @if($p->customer->email != null)
                                            {{ $p->customer->email }}
                                        @else
                                            <span class="label label-default">Not Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($p->customer->address != null)
                                            {{ $p->customer->address }}
                                        @else
                                            <span class="label label-default">Not Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->brick->name }}</td>
                                    <td>{{ $p->brick->currency->name }} - {{ $p->brick->rate }}</td>
                                    <td>{{ $p->quantity }} - Pic</td>
                                    <td>{{ $p->brick->currency->name }} - {{ $p->brick->rate * $p->quantity }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div><!-- ROW-->


        <div class="text-center">
            {!! $invoice->render() !!}
        </div>
    @else

        <div class="text-center">
            <h3>No Report Invoice Available</h3>
        </div>
    @endif


@endsection
