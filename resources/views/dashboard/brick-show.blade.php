@extends('layouts.dashboard')

@section('title', 'All Brick')

@section('content')



    @if(count($brick))



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

                                <th>Action</th>

                            </tr>

                            </thead>

                            <tbody>

                            @php $i = 0 @endphp

                            @foreach($brick as $p)

                                @php $i++ @endphp

                                <tr>

                                    <td>{{ $i }}</td>

                                    <td>{{ $p->name }}</td>

                                    <td>{{ $p->currency->name }} - {{ $p->rate }}</td>

                                    <td>



                                        <a href="{{ route('brick-edit',$p->id) }}" class="btn purple btn-sm"><i class="fa fa-edit"></i> EDIT</a>
                                        <a href="{{ url('delete-brick',$p->id) }}" class="btn red btn-sm"><i class="fa fa-edit"></i> DELETE</a>

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

            {!! $brick->render() !!}

        </div>

    @else



        <div class="text-center">

            <h3>No Brick Available</h3>

        </div>

    @endif





@endsection









