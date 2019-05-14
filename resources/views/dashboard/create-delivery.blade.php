@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-9">
		<div class="portlet light bordered">
			@php
            use App\Customer;
            if(isset($_GET['id'])){
                $c = Customer::where('invoice_id',$_GET['id'])->first();
                $customerName = $c->name;
                
            }


			@endphp
		 
			<form action="{{ route('store-delivery') }}" method="post">
			                  {{ csrf_field() }}
			    <label>Year</label>
				<input type="month" name="select_year" class="form-control input-lg" style="width: 30%;margin-bottom: 4px;"
                 @if(isset($_GET['month']))
                 value="{{$_GET['month']}}" 
                 @endif
				>
				<label>Date</label>
				<input type="date" name="select_date" class="form-control input-lg" style="width: 45%;margin-bottom: 4px;"
                 @if(isset($_GET['date']))
                 value="{{$_GET['date']}}" 
                 @endif
				>

				<div class="form-group">
				<label>Customer Id</label>
                <div class='input-group date' id='datetimepicker8' style="width: 45%; margin-bottom: 4px;">

                <input type='text' name="customer_id" class="form-control input-lg" id="search" 
                @if(isset($_GET['id']))
                 value="{{$_GET['id']}}" 
                @endif
                 />
                <span class="input-group-addon" style="background: #98DCB7;cursor: pointer;" id="search-user">
                    <span class="fa fa-search" >
                    </span>
                </span>
		        </div>
		        </div>
		        <div class="row">
		        	<div class="col-md-8 col-sm-8 col-xs-8">
		        		<div id="searchResults" style=" margin-bottom: 4px;"></div>
		        	</div>
		        </div>
		        <div class="row">
		        	<div class="col-md-4 col-sm-4 col-xs-4">
		        	    <label>Product Type</label>
			        	<select class="form-control input-lg" name="product_type" id="product_type">
			        		@if(isset($_GET['product_type']))
			                <option value="{{$_GET['product_type']}}">{{$_GET['product_type']}}</option> 
			                @else

			        		@foreach($brick as $b)
                               <option value="{{ $b->name }}">{{$b->name}}</option>
			        		@endforeach

			        		@endif
			        	</select>
		        	</div>
		        	<div class="col-md-4 col-sm-4 col-xs-4">
				        <label>Product Quantity</label>
				        <input type="number" name="product_quantity" class="form-control input-lg" style="margin-bottom: 4px;" id="product_quantity"
                        @if(isset($_GET['product_quantity']))
		                 value="{{$_GET['product_quantity']}}" 
		                @endif 
				        >
		        	</div>
		        	<div class="col-md-4 col-sm-4 col-xs-4">
		        	    <label>Stock</label>
		        		<select class="form-control input-lg" name="stock_id">
		        		      <option>Select</option>
			        		 @foreach($stock as $s)
                               <option value="{{ $s->stock_list }}">{{$s->stock_list}}</option>
			        		 @endforeach
			        	</select>
		        	</div>
		        </div>
		        <div class="row">
		        	<div class="col-md-4 col-sm-4 col-xs-4">
		        	    <label>Transport</label>
		        		<select class="form-control input-lg" name="transport_type">
		        			@if(isset($_GET['transport_type']))
			                <option value="{{$_GET['transport_type']}}">{{$_GET['transport_type']}}</option> 
			                @else
                            <option disabled="true">Select</option>
			        		<option value="Truck">Truck</option>
			        		<option value="Van">Van</option>
			        		<option value="Nosimon">Nosimon</option>
			        		<option value="Korimon">Korimon</option>

			        		@endif
		        		    
			        	</select>
		        	</div>
		        	<div class="col-md-4 col-sm-4 col-xs-4">
		        	    <label>Transport Cost</label>
		        		<input type="number" name="transport_cost" class="form-control input-lg" style="margin-bottom: 4px;">
		        	</div>
		        	<div class="col-md-4 col-sm-4 col-xs-4"></div>
		        </div>
		        <div class="row" style="margin-top: 10px;">
		        	<div class="col-md-3 col-sm-3 col-xs-3">
		        		<input type="submit" class="btn-lg btn-success" name="" value="Save">
		        		</form>
		        	</div>
		        	</div>
		        	<div class="row">
		        	<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
		        		@if(isset($_GET['id']) && isset($_GET['date']))
		        	      <center><a href="{{ url('customer-gatepass',$_GET['id'])."/".$_GET['date'] }}" class="btn btn-info">Customer Gatepass</a></center>
				        @else
                         <center>
		        	    	<div class='input-group date' id='datetimepicker8' style="width: 45%; margin-bottom: 4px;">
		                <input type='text' class="form-control input-lg" id="search-all" placeholder="Customer Gatepass" 
	                        @if(isset($_GET['id']))

	                          value="{{$customerName}}" 
	                        @else
	                           value="" 
	                        @endif
			                />
			                <span class="input-group-addon" style="background: #423e95;cursor: pointer;" id="search-customers">
			                    <span class="fa fa-search" style="color:#fff;" >
			                    </span>
			                </span>
					        </div>
					       </center>
					        <div id="gatepass-result-show" style="box-shadow: 1px 3px 3px rgba(0,0,0,0.1);">
					        	
	                           
					        </div>
				        @endif
		        		{{-- <a href="#" class="btn-lg btn-info" style="text-decoration: none;" >Gatepass Print</a> --}}
		        	</div>
		        </div>


			
		</div>

	</div>
	<div class="col-md-3">
		   <div class="panel panel-primary" style="border-color:#dd541c; ">
             <div class="panel-heading" style="background: #dd541c;border-color:#dd541c;">
               <h3 class="panel-title" style="text-align: center;">Today Delivery</h3>
               <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                </div>
               <div class="panel-body"><center><b>{{ $today_delivery }}</b></center></div>
           </div>

           <div class="panel panel-primary" style="border-color:#41bedd; ">
             <div class="panel-heading" style="background: #41bedd;border-color:#41bedd;">
               <h3 class="panel-title" style="text-align: center;">Total Delivery</h3>
               <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                </div>
               <div class="panel-body"><center><b>{{ $total_delivery }}</b></center></div>
           </div>

           <div class="panel panel-primary" style="border-color:#a589d6; ">
             <div class="panel-heading" style="background:#a589d6;border-color:#a589d6;">
               <h3 class="panel-title" style="text-align: center;">Delivery Report</h3>
               <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                </div>
               <div class="panel-body">
		            <form action="" id="laser">
		            <input class="form-control input-lg" id="search_customer_id" required style="margin-bottom: 4px;" placeholder="Customer Name"
                       @if(isset($_GET['id']))

                          value="{{$customerName}}" 
                        @else
                           value="" 
                        @endif
		            >
		            
		                     <input type="date" class="form-control input-lg" id="search_year" required style="margin-bottom: 4px;">
		        	<button  class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn" >View Laser</button>
		        </form>
               </div>
           </div>

           <div class="panel panel-primary" style="border-color:#333645; ">
             <div class="panel-heading" style="background: #333645;border-color:#333645;">
               <h3 class="panel-title" style="text-align: center;">Stock Edit</h3>
               <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                </div>
               <div class="panel-body" style="padding: 0px;border-radius: 0px;"><center><a href="{{ route('stock-invoice')}}" class="btn purple btn-sm" style="width:100%;height: 100%;">Click</a></center></div>
           </div>


	</div>
</div>
@section('scripts')
  <script type="text/javascript">

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('fa fa-plus').addClass('fa fa-minus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('fa fa-minus').addClass('fa fa-plus');
    }
});
$(document).ready(function(){
    $("#search-user").click(function(){
    	var searchVal = $('#search').val();
        $.ajax({
        	type:'GET',
        	url: "search",
        	data:{'search':searchVal},
        	 success: function(result){
             $('#searchResults').html(result);
             
        }});
    });
});

$(document).ready(function(){
    $("#search-customers").click(function(){
    	var searchVals = $('#search-all').val();
        $.ajax({
        	type:'GET',
        	url: "search-delivery",
        	data:{'search_delivery':searchVals},
        	 success: function(result){
             $('#gatepass-result-show').html(result);
            
        }});
    });
});



$("#view_laser_btn").click(function() {
     $('#laser').attr("action","http://{{$_SERVER['HTTP_HOST']}}/laser-delivery/"+$('#search_customer_id').val()+"/"+$("#search_year").val());
   });
</script>

@endsection
@endsection


