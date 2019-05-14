@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-4">

		<div class="portlet light bordered">
		 
			<form action="{{ route('store-un-load') }}" method="post">
			                  {{ csrf_field() }}
			    <label>Date</label>
				<input type="date" name="select_date" class="form-control input-lg" style="margin-bottom: 4px;">
				<label>Year</label>
				<input type="number" name="year" value="{{date('Y') }}" class="form-control input-lg">
				<label>Round</label>
				<select class="form-control input-lg" name="round" id="round">
				            <option >Select</option>
			        		@for($i=1;$i<=10;$i++)
			        		<option value="{{$i}}">{{$i}}</option>
			        		@endfor
			        		
			   </select>
			   <label>Current Chamber</label>
				<select class="form-control input-lg" name="current_chamber" id="c_chamber">
				            <option >Select</option>
			        		@for($i=1;$i<=50;$i++)
			        		<option value="{{$i}}">{{$i}}</option>
			        		@endfor
			        		
			   </select>
			   <div class="row">
			   <div class="col-md-6">
			   		<label>Chamber</label>
				    <input type="number" class="form-control input-lg" name="chamber" id="chamber">
			   	</div>
			   	<div class="col-md-6"> 
			   	<label>Radda</label>
				<input type="text" name="radda" class="form-control input-lg" id="radda">
			   </div>
			   	
			   </div>
			  
			   
				            
			        
			   <label>Total Unload</label>
			   <input type="number" name="total_onload" class="form-control input-lg" style="margin-bottom: 4px;" id="total_unload">

			   <label>Rate /Per thousand</label>
			   <input type="number" name="rate_or_per_hour" class="form-control input-lg" style="margin-bottom: 4px;" id="rate_or_per_hour">
			   <label>Total Bill</label>
			   <input type="text" name="total_bill" class="form-control input-lg" style="margin-bottom: 4px;" id="total_bill">
			   <div class="row">
			   	<div class="col-md-4"></div>
			   	<div class="col-md-4">
			   		<input type="submit" class="btn-lg btn-primary" value="Submit" style="background: #FF9900;border-width: 0px;">
			   	</div>
			   	<div class="col-md-4"></div>
			   </div>

			   


			</form>
		</div>

	</div>
	<div class="col-md-3">
		   


	</div>
	<div class="col-md-5">
		
        <form action="" id="laser">
               
				<select class="form-control input-lg" id="round_laser" style="margin-bottom: 4px;">
				            <option >Select Round</option>
			        		@for($i=1;$i<=10;$i++)
			        		<option value="{{$i}}">{{$i}}</option>
			        		@endfor
			        		
			   </select>
        	<input type="date" class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input">
        	<input type="number" class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_year" placeholder="Year" value="<?php echo date('Y');?>">
        	<button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
        </form>

           <div class="panel panel-primary" style="border-color:#CCFE43;color:#000;margin-top:15px; ">
             <div class="panel-heading" style="background: #CCFE43;border-color:#CCFE43;color:#000;">
               <h3 class="panel-title" style="text-align: center;">Total Unload</h3>
               <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                </div>
               <div class="panel-body"><center><b>{{ $total_unload }}</b></center></div>
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
$("#radda").keyup(function() {
      var val =0;
     // alert($('#round').val());

	if( ( $('#c_chamber').val() == 1) || ( $('#c_chamber').val() == 26)  ){
           val =417;
	}else{
		   val =571;	   
	}
	
	var c_chamber = $('#radda').val();
	if($('#chamber').val() > 0){
      $('#total_unload').val(c_chamber * val * 2);
	}else{
      $('#total_unload').val(c_chamber * val);
	}
	

});
$("#rate_or_per_hour").keyup(function() {
	$("#total_bill").val(($("#total_unload").val()/1000)* $("#rate_or_per_hour").val());
});


$("#view_laser_btn").click(function() {
   	 $('#laser').attr("action","show-un-load-laser/"+$("#view_laser_input").val()+"/"+$("#view_laser_year").val()+"/"+$("#round_laser").val());
   });

</script>

@endsection
@endsection


