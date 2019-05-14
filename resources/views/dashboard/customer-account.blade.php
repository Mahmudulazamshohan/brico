@extends('layouts.dashboard')

@section('title', 'All Customer')

@section('content')


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
                           <th>Customer-ID</th>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Address</th>
                           <th>Identifier Name</th>
                           <th>Total Paid Amount</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                       @php
                       $i=1;
                       @endphp
                       

                    @foreach($customer as $p)
                         <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{$p->invoice_id}}</td>
                           <td>{{ $p->name }}</td>
                           @if(!empty($p->phone))
                           <td>{{ $p->phone }}</td>
                           @else
                           <td> Not Available </td>
                           @endif
                           @if(!empty($p->address))
                           <td>{{ $p->address }}</td>
                           @else
                           <td> Not Available </td>
                           @endif
                           @if(!empty($p->identifier_name))
                           <td>{{ $p->identifier_name }}</td>
                           @else
                           <td> Not Available </td>
                           @endif
                           <td>{{$p->payment}}/=</td>
                           <td>
                         
                           <a href="{{ url('customer-account-show',$p->invoice_id)  }}" class="btn purple btn-md"><i class="fa faedit"></i> Enter Customer Payment</a>
                      
                           <a href="{{ url('customer-account-laser',$p->invoice_id)  }}" class="btn btn-success btn-md"><i class="fa fa-eye"></i> View Customer Laser</a>
                           </td>
                         </tr>
                        @endforeach
                          
                           
                       </tbody>
                       </table>
                     
                    </div>

                </div>



            </div>

        </div><!-- ROW-->



@section('scripts')

@endsection



@endsection





