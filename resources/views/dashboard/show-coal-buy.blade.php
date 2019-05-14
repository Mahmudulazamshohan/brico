
@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-10">

		<div class="portlet light bordered">
		 <div class="row">
		 	<div class="col-md-6" >
		 	      <form action="{{ route('store-coal-producer') }}" method="post">
		 	                      {{ csrf_field() }}
		 	     <div style="border:2px solid #ccc;padding:30px;" class="col-md-12">
		 		    <label>Produced By</label>
		 		    <input type="text" name="produced_by" class="form-control input-lg"">
		 		    <label>Year</label>
		 		    <input type="number" name="year" class="form-control input-lg" value="<?php echo date('Y');?>">
		 		    <label>Contact Number</label>
		 		    <input type="text" name="contact_number" class="form-control input-lg"">
		 		    <center>
		 		    <input type="submit" value="Save" class="btn-lg btn-info" style="margin-top: 4px; background: #FF9900;border-width: 0px;">
		 		    </center>
		 	       </div>
		 	       </form>
		 	</div>
		 	<div class="col-md-6" >
		 		 <div style="border:2px solid #ccc;padding: 30px;" class="col-md-12">
		 		    <form action="{{route('store-coal-buy')}}" method="post">
			                  {{ csrf_field() }}
		 		 	<label>Year</label>
		 		    <input type="number" name="year" class="form-control input-lg" value="<?php echo date('Y');?>">
		 		     <label>Date</label>
		 		    <input type="date" name="date" class="form-control input-lg">	
		 		    <label>Produced By</label>
		 		    <select type="text" name="produced_by" class="form-control input-lg">
		 		          <option>Select</option>
		 		        @foreach($producer as $p)
                           <option value ="{{$p->produced_by}}">{{$p->produced_by}}</option>
                        @endforeach
		 		    </select>
		 		    <label>Imported Country</label>
		 		    <input type="text" name="import_country" class="form-control input-lg">
		 		    <label>Killo-Calorie</label>
		 		    <input type="number" name="killo" class="form-control input-lg">	
		 		    <label>Rate / Per Ton</label>
		 		    <input type="text" name="rate_per_ton" class="form-control input-lg">	
		 		    <label>Quantity / Per Ton</label>
		 		    <input type="number" name="quantity" class="form-control input-lg">	
		 		     <label>Total Amount</label>
		 		    <input type="number" name="amount" class="form-control input-lg">	
		 		    <center>
		 		    <input type="submit" value="Save" class="btn-lg btn-info" style="margin-top: 4px; background: #FF9900;border-width: 0px;">
		 		    </center>
		 		    </form>
		 		 </div>
		 	</div>
		 </div>		 
	
		</div>

	</div>
	<div class="col-md-2">
		<form action="" id="laser">
		    <label>Produced By</label>
        	<select  class="form-control input-lg"  id="view_laser_input">
        	            <option>Select</option>
		 		        @foreach($producers as $p)
                           <option value ="{{$p->produced_by}}">{{$p->produced_by}}</option>
                        @endforeach
        	</select>
        	 <label>Year</label>
        	 <input type="number" class="form-control input-lg" id="search_year" style="margin-bottom: 4px;" value="<?php echo date('Y');?>">
        	<button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
        </form>
	</div>
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4" style="height: 100px;">
		
	</div>
	<div class="col-md-4"></div>
</div>

@section('scripts')
  <script type="text/javascript">

 $("#view_laser_btn").click(function() {
   	 $('#laser').attr("action","show-coal-buy-ledger/"+$("#view_laser_input").val()+"/"+$("#search_year").val());
   });
</script>

@endsection
@endsection


