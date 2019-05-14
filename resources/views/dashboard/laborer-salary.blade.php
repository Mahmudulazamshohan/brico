@extends('layouts.dashboard')
@section('title', 'Today Salary')
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
                        <table class="table table-striped table-bordered table-hover" id="sample_1">

                            <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Salary / Day</th>
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
                                        <a href="{{ route('laborer-bill-pay',$p->id) }}" onclick="return confirm('Are You Sure.')" class="btn purple btn-sm" data-toggle="tooltip2" data-placement="top" title="Pay Laborer Bill"><i class="fa fa-credit-card"></i> Pay Bill</a>
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


    @endif

@endsection

@section('scripts')

    <script>
        $(function () {
            $('[data-toggle="tooltip2"]').tooltip()
        });
    </script>

@endsection

