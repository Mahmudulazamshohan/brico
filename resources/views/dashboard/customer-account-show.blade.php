@extends('layouts.dashboard')

@section('title', 'All Customer')

@section('content')


        <div class="row">

            <div class="col-md-12">
           <div class="row" style="background: #FAA001; margin-bottom: 2px;">
                <div class="col-sm-12">
                    <h1 class="text-center"><i class="fa fa-user-plus"></i> New Payment Account</h1>
                    
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
                       
                    <div class="row">
                    	<div class="col-md-3"></div>
                      <div class="col-md-5">
                      	<div class="rectangle" style="border:2px solid #22BE34;padding-left: 4px; border-radius: 2px;box-shadow: 0px 1px 0px rgba(0,0,0,0.1);">
                      		<h4 class="text-left" style="font-weight: bold;">
                          <?php 
                          use App\Laser;
                         $laser = Laser::where('customer_id',$customer->invoice_id)->orderBy('updated_at','desc')->first(); 
                         
 
                           ?>
                        Customer Name:{{$customer->name}}</h4>
                        <h4 class="text-left" style="font-weight: bold;">Customer ID:{{$customer->invoice_id}}</h4>
                        <h4 class="text-left" style="font-weight: bold;">Customer Address:@if($customer->address){{$customer->address}}@else {{"Not Available"}} @endif</h4>
                      	</div>
                        
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-2" style="padding-right: 20px">
                        <a href="{{url('customer-account-laser',$user_id)}}" class="btn btn-success" style="margin-bottom: 4px;">Customer Laser</a>
                         <a href="{{url('customer-show')}}" class="btn purple btn-success" style="margin-bottom: 4px;">Customer Invoice</a>
                         @if(count($laser))
                         <a href="{{route('create-delivery')."?id=".$customer->invoice_id."&date=".date('Y-m-d')."&month=".date('Y-m')."&product_type=".$laser->product_type."&product_quantity=".$laser->product_quantity."&transport_type="
                         . $laser->transport}}" class="btn btn-success" style="margin-bottom: 4px;">Delivery</a>
                         @else
                          <a href="{{route('create-delivery')."?id=".$customer->invoice_id}}" class="btn btn-success" style="margin-bottom: 4px;">Delivery</a>     
                         @endif
                      </div>
                    </div>
                           
                           <div id="appendParent">
                           <div class="row">
                               <div class="col-md-6">
                                  <div class="text-center" style="font-weight: bold;"><h3>Current account(চলতি হিসাব)</h3></div> 
                                   <div class="text-center" style="font-weight: bold;">
                                      <h3> {{ $current_account_balance }}/= </h3>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                          <h3 class="text-center" style="font-weight: bold;"> Due(বাকি)</h3>
                                     <div class="text-center">
                                         <h3>{{ $due }}/=</h4>
                                     </div>
                               </div>
                               
                        
                               
                           </div>
                          
                          <!--  desposite -->
                          <div class="row" style="margin-top: 20px;">
                          <form action="/customer-payment-received" method="post">
                          <input type="hidden" value="{{ csrf_token() }}" name="_token">
                          <input type="hidden" name="id" value="{{ $user_id }}">
                              <div class="col-md-4">
                                 <div class="input-group">
                                 	<span class="input-group-addon" id="basic-addon1" style="background: #22BE34;color:#fff;border: 2px solid #22BE34;"><i class="fa fa-dollar"></i></span>
                                   <input name="payment_amount" value="" class="form-control input-lg" type="number" required placeholder="Payment Amount" aria-describedby="basic-addon1" style="border: 2px solid #22BE34;">
                               
                             </div>
                              </div>
                              <div class="col-md-2">
                              
                                 <select name="payment_type" id="payment_type1" class="form-control input-lg" required="" style="border: 2px solid #22BE34">
                                        <option value="Cash">Cash(নগদ)</option>
                                        <option value="Cheque">Cheque(চেক)</option>
                                        
                                </select>
                              </div>
                               <div class="col-md-4">
                               	<div class="input-group">
                               	 <span class="input-group-addon" id="basic-addon1" style="background: #22BE34;color:#fff;border: 2px solid #22BE34;"><i class="fa fa-sort-numeric-asc"></i></span>
                               	  <input name="cheque_or_cash" value="" class="form-control input-lg" type="text" placeholder="Cheque Number" aria-describedby="basic-addon1" style="border: 2px solid #22BE34;" id="disablecash">
                               	</div>
                              
                              </div>
                              <div class="col-md-2" style="padding: 0px;">
                              <label class="control-label"> </label>
                                  <button type="submit" class="btn btn-default"  style="background: #ccc;border-radius: 0px; padding-left: 15px;padding-right: 15px;">Save(সঁচয় করা)</button>
                              </div> 
                              </form>
                            
                          </div>

                           <div class="row">
                             <div class="col-md-2">
                               <h4 class="text-center" style="color:#ccc;border-bottom: 2px solid #ccc;padding:2px;font-weight: bold;">Product Type</h4>
                             </div>
                             <div class="col-md-2">
                               <h4 class="text-center" style="color:#ccc;border-bottom: 2px solid #ccc;padding:2px;font-weight: bold;">Transport</h4>
                             </div>
                             <div class="col-md-2">
                               <h4 class="text-center" style="color:#ccc;border-bottom: 2px solid #ccc;padding:2px;font-weight: bold;">Quantity</h4>
                             </div>
                             <div class="col-md-2">
                               <h4 class="text-center" style="color:#ccc;border-bottom: 2px solid #ccc;padding:2px;font-weight: bold;">Rate</h4>
                             </div>
                             <div class="col-md-2">
                               <h4 class="text-center" style="color:#ccc;border-bottom: 2px solid #ccc;padding:2px;font-weight: bold;">Cost</h4>
                             </div>
                             <div class="col-md-2">
                              
                             </div>
                           </div>
                           <!--    
                           Product/Price/Total/Ammount -->
                          <div class="row" style="margin-top: 20px;">
                           <form action="/customer-account-show" method="post" id="form1">
                           <input type="hidden" value="{{ csrf_token() }}" name="_token">
                           <input type="hidden" name="id" value="{{ $user_id }}">
                              <div class="col-md-2">
                                   <select name="brick_rate" id="myselect1" class="form-control input-lg" required="" style="border: 2px solid #22BE34;">
                                        <option value="">Product Type(পণ্যের ধরন)</option>
                                        @foreach($brick as $c)
                                         <option value="{{$c->rate}}">{{$c->name}}</option> 
                                        @endforeach
                                </select>
                              </div>
                              <input type="hidden" name="brick_name" id="brick_name1">
                              <div class="col-md-2">
                                   <input name="transport" class="form-control input-lg" type="text" required placeholder="Transport" style="border: 2px solid #22BE34;">
                              </div>

                              <div class="col-md-2">
                                   <input name="quantity" id="product_quantity1" value="" class="form-control input-lg" type="number" required placeholder="Product Quantity" style="border: 2px solid #22BE34">
                              </div>
                              <div class="col-md-2">
                                <input name="brick_rate_alt" id="brick_rate_alt1" value="" class="form-control input-lg" type="number" required placeholder="Brick Rate" step="0.01" style="border: 2px solid #22BE34;">
                              </div>
                              <div class="col-md-2">
                                  <input name="cost" id="cost1" value="" class="form-control input-lg" type="text" required placeholder="Cost" style="border: 2px solid #22BE34;">
                              </div>
                              <div class="col-md-2">
                                   <button type="submit" class="btn btn-default"  style="background: #ccc;border-radius: 0px; padding-left: 15px;padding-right: 15px;">Save</button> 
                              </div>
                              </form>
                          </div>
                          </div>
                            
                         

                          <div class="row" style="margin-top: 10px;">
                               
                              <div class="col-md-4">
                                <!--   <button class="btn-lg btn-info btn-circle" id="appendbtn">+</button> -->
                              </div>
                              <div class="col-md-4">
                                  <form>
                                  	<label class="control-label" style="font-weight: bold;">Total Amount(সর্বমোট পরিমাণ): </label>
                                  	<div class="input-group">
                                  		<span class="input-group-addon" id="basic-addon1" style="background: #22BE34;color:#fff;border: 2px solid #22BE34;"><i class="fa fa-sort-numeric-asc"></i></span>
                                      <input name="name" value="" id="totalamount" class="form-control input-lg" type="number" placeholder="Payment Amount" aria-describedby="basic-addon1">
                                  	</div>
                                      
                                       </div>
                                       
                                  </form>
                              </div>
                              
                          </div>

                            
              
                    

                    </div>

                </div>



            </div>
            <div id="demo">
                
            </div>

        </div><!-- ROW-->



@section('scripts')
<script type="text/javascript">
	$("#payment_type1").click(function(event) {
		/* Act on the event */
		if($(this).val() == "Cash"){
			$("#disablecash").attr('disabled','true');
		}else{
			$("#disablecash").removeAttr('disabled');
		}
		
		
	});
   
    var totalamount={};
    $('#product_quantity1').on('keyup', function() {
             var a = $('#myselect1').val();
             var b = $('#product_quantity1').val();
             totalamount=a*b;
             $('#cost1').val(a*b);
              $('#totalamount').val(a*b);
    });

    $('#myselect1').on('click',  function() {
        var a = $("#myselect1 option:selected").text();
          $("#brick_rate_alt1").val($("#myselect1 option:selected").val());
          $('#brick_name1').val(a);
    });
     $('#myselect2').on('click',  function() {
        var a = $("#myselect2 option:selected").text();
        $("#brick_rate_alt2").val($("#myselect2 option:selected").val());
         $('#brick_name2').val(a);
    });
      $('#myselect3').on('click',  function() {
        var a = $("#myselect3 option:selected").text();
        $("#brick_rate_alt3").val($("#myselect3 option:selected").val());
         $('#brick_name3').val(a);
    });
    $('#product_quantity2').on('keyup', function() {
             var a = $('#myselect2').val();
             var b = $('#product_quantity2').val();
             totalamount=a*b;
             $('#cost2').val(a*b);
    });
    $('#product_quantity3').on('keyup', function() {
             var a = $('#myselect3').val();
             var b = $('#product_quantity3').val();
             totalamount=a*b;
             $('#cost3').val(a*b);
    });

   


    $('#brick_rate_alt1').on('keyup', function() {
             var a = $('#brick_rate_alt1').val();
             var b = $('#product_quantity1').val();
             totalamount=a*b;
             $('#cost1').val(a*b);
    });
 $('#brick_rate_alt2').on('keyup', function() {
             var a = $('#brick_rate_alt2').val();
             var b = $('#product_quantity2').val();
             totalamount=a*b;
             $('#cost2').val(a*b);
    });
    $('#brick_rate_alt3').on('keyup', function() {
             var a = $('#brick_rate_alt3').val();
             var b = $('#product_quantity3').val();
             totalamount=a*b;
             $('#cost3').val(a*b);
    });
     
 
</script>
@endsection



@endsection





