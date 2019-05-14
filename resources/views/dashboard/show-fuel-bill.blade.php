@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-4">

		<div class="portlet light bordered">
		    
		 
			<form action="{{ route('store-fuel-bill') }}" method="post">
			                  {{ csrf_field() }}
			    <label>Date</label>
				<input type="date" name="select_date" class="form-control input-lg" style="margin-bottom: 4px;">
				<label>Year</label>
				<input type="number" name="year" class="form-control input-lg" value="{{date('Y')}}">
				<label>Fuel</label>
				<select class="form-control input-lg" name="fuel_type">
			                <option>Select Fuel Type</option>
			        		<option value="Diesel Fuel">Diesel Fuel</option>
			        		<option value="Mobil Fuel">Mobil Fuel</option>    		
			   </select>
			   <label>Selection</label>
				<select class="form-control input-lg" name="selection" id="sec" >
				            <option>Select Selection Type</option>
			        		<option value="Transport">Transport</option>
			        		<option value="Pak Mill">Pak Mill</option>
			        		<option value="Air Mill">Air Mill</option>
			        		
			        		
			   </select>
			   <label>Transport Type</label>
				<select class="form-control input-lg" name="tranport" id="transport" disabled="true" >
			        		<option>Select Transport Type</option>
			        		<option value="Truck">Truck</option>
			        		<option value="Nosimon">Nosimon</option>
			        		<option value="Korimon">Korimon</option>
			        		
			   </select>
			   <div class="row">
			   	<div class="col-md-6">
			   	 <label>Litre</label>
					   	<input type="number" name="litre" class="form-control input-lg" style="margin-bottom: 4px;" step="0.01" id="litre">
			   	</div>
			   	<div class="col-md-6">
			   	<label>Amount</label>
					   	<input type="number" name="amount" class="form-control input-lg" style="margin-bottom: 4px;" id="amount" step="0.01">
			   	</div>
			   </div>
			   <div class="row">
			   	<div class="col-md-12">
			   		   <label>Total Amount</label>
					   	<input type="text" name="total_amount" class="form-control input-lg" style="margin-bottom: 4px;" id="total_amount">
			   	</div>
			   </div>
			   <div class="row">
			   	<div class="col-md-4"></div>
			   	<div class="col-md-4">
			   	<input type="submit" class="btn btn-primary btn-lg" value="Save" style="background: #FF9900;border-color: #FF9900; border-width: 0px;">
			   	</div>
			   	<div class="col-md-4"></div>
			   </div>
			   


			</form>
		</div>

	</div>
	<div class="col-md-5">
		   


	</div>
	<div class="col-md-3" style="padding-top: 200px;">

        <form action="" id="laser">
             <select class="form-control input-lg" id="fuel_type" style="margin-bottom: 4px;">
			                <option>Select Fuel Type</option>
			        		<option value="Diesel Fuel">Diesel Fuel</option>
			        		<option value="Mobil Fuel">Mobil Fuel</option>    		
			   </select>
			   <select class="form-control input-lg" id="section" style="margin-bottom: 4px;">
				            <option>Select Selection Type</option>
			        		<option value="Transport">Transport</option>
			        		<option value="Pak Mill">Pak Mill</option>
			        		<option value="Air Mill">Air Mill</option>
			        		
			        		
			   </select>
        	<input type="date" class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input">
        	<input type="number" class="form-control input-lg" style="margin-bottom: 4px;" id="year" value="{{date('Y')}}">
        	<button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
        </form>
        
  
	</div>
</div>
@section('scripts')
  <script type="text/javascript">
   $("#view_laser_btn").click(function() {
   	 $('#laser').attr("action","show-fuel-bill-ledger/"+$("#view_laser_input").val()+"/"+$("#fuel_type").val()+"/"+$("#section").val()+"/"+$("#year").val());
   });
   $('#sec').change(function(){
   	if($('#sec').val() =='Transport')
   	{
          $('#transport').removeAttr("disabled","false");
   	}else{
   		  $('#transport').attr("disabled","true");
   	}
   });
   $("#amount").keyup(function() {
   	  $("#total_amount").val($("#litre").val()*$("#amount").val());
   });
   $("#litre").keyup(function() {
   	  $("#total_amount").val($("#litre").val()*$("#amount").val());
   });
</script>

@endsection
@endsection


