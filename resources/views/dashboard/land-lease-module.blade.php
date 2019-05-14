@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-6">

		<div class="portlet light bordered">
		 
			<form action="{{ route('store-land-lease-module') }}" method="post" enctype="multipart/form-data">
			                  {{ csrf_field() }}
			    <label>Landowner Name</label>
			    <input type="text" name="landower_name" class="form-control input-lg" >
			    <label>Mobile</label>
			    <input type="text" name="mobile" class="form-control input-lg" >
                <div class="row">
                    <div class="col-md-6">
                        <label>Start</label>
                        <input type="date" name="start" class="form-control input-lg" id="start_date">
                    </div>
                    <div class="col-md-6">
                        <label>End</label>
                        <input type="date" name="end" class="form-control input-lg" id="end_date" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Land Quantity</label>
                        <input type="number" name="land_quantity" class="form-control input-lg" >
                    </div>
                    <div class="col-md-6">
                    <label>Unit</label>
                    <select name="unit" class="form-control input-lg">
                        <option>Select Unit</option>
                        <option value="Hundred">Hundred</option>
                        <option value="Bigha">Bigha</option>
                        <option value="acre">acre</option>
                    </select>
                    </div>
                </div>
                <label>Lease Amount</label>
                <input type="number" name="amount" class="form-control input-lg" >
			    <label>Note</label>
			    <input type="text" name="note" class="form-control input-lg" >

                 <div class="row">
                    <div class="col-md-6">
                        <label>Reminder</label>
                        <input type="date" name="reminder_date" class="form-control input-lg" >
                    </div>
                    <div class="col-md-6">
                        <label>Time</label>
                        <input type="time" name="time" class="form-control input-lg" >
                    </div>
                </div>
			    <center><input type="submit" name="" class="btn-lg btn-success" style="background:#FF9900;border-width: 0px;margin-top: 4px; "></center>
			   

			</form>
		</div>

	</div>
	
	<div class="col-md-4" style="padding-top: 200px;">

        <form action="" id="laser">
        	<select class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input">
        	<option>Select Landwoner Name</option>
        	  @foreach($lease as $l)
               <option value="{{$l->landower_name}}"> {{$l->landower_name}}</option>
              @endforeach   
        	</select>
        	<button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
        </form>
        
  
	</div>
    <div class="col-md-2"></div>
</div>
@section('scripts')
  
  <script type="text/javascript">
  
   $("#view_laser_btn").click(function() {
   	 $('#laser').attr("action","land-lease-module-laser/"+$("#view_laser_input").val());
   });


</script>

@endsection
@endsection


