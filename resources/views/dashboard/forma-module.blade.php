@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-9">

		<div class="portlet light bordered">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('store-forma-module') }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                <label>Date</label>
                <input type="date" name="date" class="form-control input-lg" >
                <label>Supplier</label>
                <input type="text" name="supplier" class="form-control input-lg" >
                <label>Address</label>
                <input type="text" name="address" class="form-control input-lg" >
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control input-lg" >
                <label>Rate</label>
                <input type="text" name="rate" class="form-control input-lg" >
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control input-lg" >
                
                
               
            
            </div>
            <div class="col-md-6" style="margin-top: 200px;">
                <div class="row">
                    <div class="col-md-4">
                        <label>Distance</label>
                        <input type="number" name="distance" class="form-control input-lg" >
                    </div>
                    <div class="col-md-4">
                        <label>Width</label>
                        <input type="number" name="width" class="form-control input-lg" >
                    </div>
                    <div class="col-md-4">
                        <label>Height</label>
                        <input type="number" name="height" class="form-control input-lg" >
                    </div>
                </div>
                        <center><label>Note</label></center>
                        <input type="text" name="note" class="form-control input-lg" >
                <center>
                <input type="submit" name="" class="btn-lg btn-success" style="background:#FF9900;border-width: 0px;margin-top: 4px; ">
                </center>
            </div>
            </form>
        </div>
		 
			
		</div>

	</div>
	
	<div class="col-md-3" style="padding-top: 200px;">
       <form action="" id="laser">
       <select class="form-control input-lg" id="supplier_laser" style="margin-bottom: 4px;">
           <option>Select Supplier</option>
           @foreach($supplier as $s)
               <option value="{{$s->supplier}}">{{$s->supplier}}</option>
           @endforeach
       </select>
          <input type="date" class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input">
          <button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
        </form>
	</div>
</div>
@section('scripts')
  <script type="text/javascript">

  $("#view_laser_btn").click(function() {
     $('#laser').attr("action","forma-module-laser/"+$("#view_laser_input").val()+"/"+$("#supplier_laser").val());
   });
</script>

@endsection
@endsection


