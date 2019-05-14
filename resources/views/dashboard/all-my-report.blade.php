@extends('layouts.dashboard')

@section('title', 'All Customer')
@section('style')
<style type="text/css">
 
</style>
@php 
use App\Laser;
use App\Payment;
@endphp
@endsection

@section('content')


        <div class="row">

            <div class="col-md-12">
           <div class="row" style="background: #FAA001; margin-bottom: 2px;">
                <div class="col-sm-12">
                    <h1 class="text-center"><i class="fa fa-user"></i> Customer Report</h1>
                    
                </div>
            </div>
  



                <div class="portlet light bordered">

                    <div class="portlet-title">

                        <div class="caption font-dark">
                          
                        </div>

                        <div class="tools" height="40px">
                         
                         </div>

                    </div>

                    <div class="portlet-body">
                      <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <form action="" id="laser">
                          
                              <input type="date" class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input">
                              <button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
                            </form>
                        </div>
                        <div class="col-md-4"></div>
                      </div>
                      @if($nullOrNotNull!=0)
                        <table class="table table-striped table-bordered table-hover" id="sample_1" style="margin-top: 30px;">
       <thead>
                <tr>
                <th>ID#</th>
                <th>Name/Address</th>
                <th>Mobile</th>
                <th>Cash</th>
                <th>Account</th>
                <th>Transport</th>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Total Cash</th>
                </tr>
           </thead>
           
           <tbody>
          @php
          $i=1;
          $c=0;
          @endphp
          @foreach($report_data as $v)
            <tr>
              <td>{{$v->invoice_id}}</td>
              @if($v->address!=null)<td>{{$v->name."/".$v->address}}</td>@else <td>{{$v->name."/"."Not Available"}}</td>@endif
              @if($v->phone!=null)<td>{{$v->phone}}</td>@else<td>Not Available</td>@endif
              <td>{{$report_payment[$c++][0]->payment_amount}}</td>
              @if((Laser::where('customer_id','=',$v->invoice_id)->sum('subtotal')- Payment::where('customer_id','=',$v->invoice_id)->sum('payment_amount'))>0) 
               <td style="background:#FF5F49;color:#fff;font-weight:bold;text-align:center;">{{"Due"}}</td>
              @elseif((Laser::where('customer_id','=',$v->invoice_id)->sum('subtotal')- Payment::where('customer_id','=',$v->invoice_id)->sum('payment_amount'))<0)
               <td style="background:#33C134;color:#fff;font-weight:bold;text-align:center;">{{"Advanced paid"}}</td>
               @else
               <td style="background:#33C134;color:#fff;font-weight:bold;text-align:center;">{{"All Payment Paid"}}</td>
              @endif
              <td>{{$v->transport}}</td>
              <td>{{$v->product_type}}</td>
              <td>{{$v->product_quantity}}</td>
              <td>{{$v->product_rate}}</td>
              <td>{{$v->total}}</td>
              <td>{{$v->total}}</td> 
            </tr>
          @endforeach
         
          
           </tbody>
     </table> 

     @else
     <h1 class="text-center" style="color:red;font-weight:600;">No order added</h1>
     @endif
     
                    </div>

                </div>



            </div>
            

        </div><!-- ROW-->



@section('scripts')
  <script type="text/javascript">

  $("#view_laser_btn").click(function() {
   // alert($("#view_laser_input").val());
     $('#laser').attr("action","http://{{$_SERVER['HTTP_HOST']}}/all-my-report/"+$("#view_laser_input").val());
   });
</script>

@endsection



@endsection





