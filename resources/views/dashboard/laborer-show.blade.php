@extends('layouts.dashboard')
@section('title', 'All Laborer')
@section('content')


    @if(count($laborer))

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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Code</th>
                                <th>Salary / Day</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=0; @endphp
                            @foreach($laborer as $p)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>
                                        @if($p->email != null)
                                            {{ $p->email }}
                                        @else
                                            <span class="label label-primary">Not Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->phone }}</td>
                                    <td>{{ $p->code }}</td>
                                    <td>{{ $p->currency->name }} - {{ $p->salary }} / Day</td>
                                    <td>
                                        <a href="{{ route('laborer-edit',$p->id) }}" class="btn purple btn-xs" data-toggle="tooltip2" data-placement="top" title="Edit Laborer"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-danger btn-xs delete_button"
                                                data-toggle="modal" data-target="#DelModal"
                                                data-id="{{ $p->id }}" data-toggle="tooltip2" data-placement="top" title="Delete Laborer">
                                            <i class='fa fa-trash'></i> Delete
                                        </button>

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

        <div class="text-center">
            <h3>No Laborer Available</h3>
        </div>
        @endif

                <!-- Modal for DELETE -->
        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                    </div>

                    <div class="modal-body">
                        <strong>Are you sure you want to Delete ?</strong>
                    </div>

                    <div class="modal-footer">

                        <form method="post" action="{{ route('laborer-delete') }}" class="form-inline">
                            {!! csrf_field() !!}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id" class="abir_id" value="0">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

@endsection

@section('scripts')

    <script>
        $(function () {
            $('[data-toggle="tooltip2"]').tooltip()
        });
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>

@endsection

