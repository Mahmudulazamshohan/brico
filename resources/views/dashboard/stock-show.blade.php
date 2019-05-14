@extends('layouts.dashboard')

@section('title', 'Stock Brick')

@section('content')



    @if(count($stock))



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

                                <th>Brick Name</th>

                                <th>Brick Rate / Pic</th>

                                <th>Quantity</th>

                                <th>Action</th>

                            </tr>

                            </thead>

                            <tbody>

                            @php $i = 0 @endphp

                            @foreach($stock as $p)

                                @php $i++ @endphp

                                <tr>

                                    <td>{{ $i }}</td>

                                    <td>{{ $p->brick->name }}</td>

                                    <td>{{ $p->brick->currency->name }} - {{ $p->brick->rate }}</td>

                                    <td>{{ $p->quantity }} - Pic</td>

                                    <td>

                                        <a href="{{ route('brick-invoice-id',$p->brick->id) }}" class="btn purple btn-sm"><i class="fa fa-eye"></i> View Invoice</a>

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

            {!! $stock->render() !!}

        </div>

    @else



        <div class="text-center">

            <h3>No Stock Available</h3>

        </div>

        @endif



@endsection

