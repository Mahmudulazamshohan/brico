@extends('layouts.dashboard')

@section('title', 'All Customer')

@section('content')





    @if(count($customer))



        <div class="row">

            <div class="col-md-12">

                 <div class="row" style="background: #FAA001; margin-bottom: 2px;">
                <div class="col-sm-12">
                    <h1 class="text-center"><i class="fa fa-user"></i> Add List Customer</h1>
                    
                </div>
                </div>



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

                                <th>Address</th>

                                <th>Phone</th>

                                <th>Identifier Name</th>

                                <th>Identifier Phone</th>

                                <th>Action</th>

                            </tr>

                            </thead>



                            <tbody>

                            @php 
                            $i=0;
                            @endphp

                            @foreach($customer as $p)

                                @php $i++;@endphp

                                <tr>

                                    <td>{{ $i }}</td>

                                    <td>
                                    @if($p->name != null)

                                            {{ $p->name }}

                                        @else

                                            <span class="label label-default">Not Available</span>

                                        @endif</td>

                                    <td>

                                        @if($p->email != null)

                                            {{ $p->email }}

                                        @else

                                            <span class="label label-default">Not Available</span>

                                        @endif

                                    </td>

                                    <td>

                                        @if($p->address != null)

                                            {{ $p->address }}

                                        @else

                                            <span class="label label-default">Not Available</span>

                                        @endif

                                    </td>
                                     

                                    <td>
                                       @if($p->phone != null)

                                            {{ $p->address }}

                                        @else

                                            <span class="label label-default">Not Available</span>

                                        @endif
                                    </td>

                                    <td>
                                    @if($p->identifier_name != null)

                                            {{ $p->address }}

                                        @else

                                            <span class="label label-default">Not Available</span>

                                        @endif

                                    </td>

                                    <td>
                                     @if($p->identifier_mobile_no != null)

                                            {{ $p->address }}

                                        @else

                                            <span class="label label-default">Not Available</span>

                                        @endif

                                     </td>

                                    

                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                 <i class="fa fa-user fa-2x"></i>
                                                 <i class="fa fa-pencil" style="border-width:0px;color:#fff;border-radius: 50px;padding: 2px;background: #32C5D2; margin-left: -9px;border-width: 0px;"></i>
                                                  <a href="{{ route('customer-edit',$p->id) }}" class="btn purple btn-sm" style="margin-bottom: 4px; background: #230AED; margin-left: -5px;"> Edit invoice</a>
                                            </div>
                                            <div class="col-sm-12">
                                                <i class="fa fa-user fa-2x"></i>
                                                 <i class="fa fa-eye" style="border: 2px solid #ccc;color:#fff;border-radius: 50px;padding: 2px;background: #32C5D2; margin-left: -9px; border-width: 0px;"></i>
                                                 <a href="{{ route('customerId-invoice',$p->id) }}" class="btn btn-info btn-sm" style="margin-bottom: 4px; margin-left: -6px; border-radius: 30px;background: #230AED;"> View Invoice</a>
                                            </div>
                                            <div class="col-sm-12">
                                                 <i class="fa fa-user fa-2x"></i> 
                                                 <i class="fa fa-pencil" style="border: 2px solid #ccc;color:#fff;border-radius: 50px;padding: 2px;background: #32C5D2; margin-left: -9px; border-width: 0px;"></i>
                                                 <a href="{{ url('customer-account-show',$p->invoice_id)  }}" class="btn purple btn-sm" style="margin-bottom: 4px; margin-left: -6px;border-radius: 30px;background: #230AED; ">Customer Account</a>
                                            </div>
                                            <div class="col-sm-12">
                                                <i class="fa fa-user fa-2x"></i> 
                                                <i class="fa fa-dollar" style="border: 2px solid #ccc;color:#fff;border-radius: 100px;padding: 3px;background: #5CCE78; margin-left: -9px; border-width: 0px;"></i>
                                                <a href="{{ url('customer-account-laser',$p->invoice_id)  }}" class="btn btn-success btn-sm" style="margin-bottom: 4px; margin-left: -6px; border-radius: 30px;background: #230AED;"> Customer Laser</a>
                                            </div>
                                            <div class="col-sm-12">
                                                <i class="fa fa-user fa-2x"></i> 
                                                <i class="fa fa-close" style="border-width: 0px;color:#fff;border-radius: 50px;padding: 2px;background: red; margin-left: -9px;"></i>
                                                <a href="{{ url('customer-delete-interface',$p->invoice_id)  }}" class="btn red btn-sm" style="margin-bottom: 4px; margin-left: -6px;border-radius: 30px;">Delete Account</a>
                                            </div>
                                        </div>


                                      

                                         

                                        
                                         
                                         

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

           

        </div>

    @else



        <div class="text-center">

            <h3>No Customer Available</h3>

        </div>

    @endif



@endsection





