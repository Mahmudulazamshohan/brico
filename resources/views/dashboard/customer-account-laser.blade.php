@extends('layouts.dashboard')

@section('title', 'All Customer')

@section('content')


        <div class="row">

            <div class="col-md-12">

                           @php
                            $sum_total_payment =0;
                            foreach($customer_payment  as $payment){
                               $sum_total_payment+=$payment->payment_amount;
                            }
                            @endphp

                             @php
                            $sum_total_order=0; 
                            foreach($customer_order as $customers){
                              $sum_total_order+=$customers->subtotal;
                            }
                            @endphp

                <div class="portlet light bordered">

                    <div class="portlet-title">

                        <div class="caption font-dark">

                        </div>

                        <div class="tools"> </div>

                    </div>

                    <div class="portlet-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="text-left">
                          <h4 style="font-weight: bold;">Name:{{ $customer->name }}</h4>
                        </div>
                        @if(!empty($customer->phone))
                        <div class="text-left">
                          <h4 style="font-weight: bold;">Mobile Number:{{ $customer->phone }}</h4>
                        </div>
                        @else
                         <div class="text-left">
                          <h4 style="font-weight: bold;">Mobile Number:Not Available</h4>
                        </div>
                        @endif
                        @if(!empty($customer->address))
                        <div class="text-left">
                          <h4 style="font-weight: bold;">Address:{{ $customer->address }}</h4>
                        </div>
                        @else
                        <div class="text-left">
                          <h4 style="font-weight: bold;">Address:Not Available</h4>
                        </div>
                        @endif
                      </div>
                      <div class="col-sm-4">
                         <div class="text-left">
                          <h4 style="font-weight: bold;">Customer No:{{ $customer->invoice_id }}</h4>
                        </div>
                        <div class="text-left">
                          <h4 style="font-weight: bold;">Balance:{{ ( $sum_total_order - $sum_total_payment ) }} /=</h4>
                        </div>
                
                      </div>
                      <div class="col-sm-2">
                      	<button class="btn btn-info" onclick="printP()" id="print" style="margin-bottom: 4px;">Print</button>
                        <a href="{{ url('customer-account-show',$customer->invoice_id) }}" class="btn purple btn-default" style="margin-bottom: 4px;" id="ca">Customer Account</a>
                        <a href="{{ route('customer-show') }}" class="btn btn-success" id="ci" style="margin-bottom: 4px;">Customer Invoice</a>
                      </div>
                            
        
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                         <!--Table start-->
                           
                           <table class="table table-striped table-bordered table-hover" >
                             
                            <thead>
                            <tr>
                              <th style="background: #B5DE82">Date</th>
                              <th style="background: #B5DE82">Cheque/Cash</th>
                              <th style="background: #B5DE82">Payment Amount</th>
                            </tr>

                            </thead>
                            <tbody>
                            
                            @foreach($customer_payment  as $payment)
                            <tr>
                               <td>{{ $payment->payment_date }}</td>
                               <td style="text-align: center;">{{ $payment->cheque_or_cash }}<br>{{ $payment->cheque_no }}</td>
                               <td>{{ $payment->payment_amount }}/=</td>
                               </tr>
                            @endforeach
                               <tr>
                               <td></td>
                               <td colspan="2" style="font-weight: bold;">Total Amount: {{ $sum_total_payment }} /= </td>
                               </tr>
                            </tbody>

                           </table>

                      </div>
                      <div class="col-sm-8">
                         <table class="table table-striped table-bordered table-hover">
                             
                            <thead>
                            <tr>
                              <th style="background: #B5DE82">Date</th>
                              <th style="background: #B5DE82">Transport</th>
                              <th style="background: #B5DE82">Product Type</th>
                              <th style="background: #B5DE82">Quantity</th>
                              <th style="background: #B5DE82">Rate</th>
                              <th style="background: #B5DE82">Total Amount</th>
                              <th style="background: #B5DE82">Payment Amount</th>
                            </tr>

                            </thead>
                            <tbody>
                           
                            @foreach($customer_order as $customers)
                            <tr>
                              <td>{{ $customers->payment_date }}</td>
                              <td>{{ $customers->transport }}</td>
                              <td>{{ $customers->product_type }}</td>
                              <td>{{ $customers->product_quantity }}</td>
                              <td>{{ $customers->product_rate}}</td>
                              <td>{{ $customers->subtotal }}/=</td>
                              <td></td>
                              </tr>
                              @endforeach
                              <tr>
                               <td colspan="4"></td>
                               <td colspan="2" style="font-weight: bold;">Total:  {{ ( $sum_total_order) }}/=</td>
                                <td style="font-weight: bold;">{{ ( $sum_total_order - $sum_total_payment ) }} /=</td>
                              </tr>
                            </tbody>

                           </table>
                      </div>
                
                    </div>
                   
                              
                    </div>


                    </div>

                </div>



          
            
        </div><!-- ROW-->



@section('scripts')
<script type="text/javascript">

	function printP() {
		var e = document.getElementById('print');
    var ca =document.getElementById('ca');
    var ci = document.getElementById('ci');
		
		
		    e.style.visibility = 'hidden';
        ca.style.visibility = 'hidden';
        ci.style.visibility = 'hidden';
		     window.print();
        e.style.visibility = 'visible';
        ca.style.visibility = 'visible';
        ci.style.visibility = 'visible';
		}
</script>

@endsection



@endsection





