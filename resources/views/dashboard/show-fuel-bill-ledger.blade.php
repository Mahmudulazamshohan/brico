@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">
      <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-4">
            <div class="text-left" style="font-size: 22px;"><b>Fuel Type:{{$fuel_type}}</b></div>
            <div class="text-left" style="font-size: 22px;"><b>Selection:{{$selection}}</b></div>
            <div class="text-left" style="font-size: 22px;"><b>Year:{{$year}}</b></div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
		<div class="portlet light bordered">
		 <table class="table table-striped table-bordered table-hover" id="sample_1">
		   <thead>
                <tr>
                <th>ID#</th>
                <th>Date</th>
                <th>Year</th>
                <th>Fuel Type</th>
                <th>Selection</th>
                <th>Transport Type</th>
                <th>Litre</th>
                <th>Total Litre</th>
                <th>Amount</th>
                <th>Total Amount</th>
                </tr>
           </thead>
           <tbody>

           @php
           $i=1;
           @endphp
           @foreach($fuel as $k => $f)
           	<tr>
           	    <td>{{$i++}}</td>
                <td>{{$f->date}}</td>
                <td>{{$f->year}}</td>
                <td>{{$f->fuel_type}}</td>
      	        <td>{{$f->selection}}</td>
      	        <td>
                 @if($f->transport_type != null)
                        {{ $f->transport_type }}
                 @else
                      <span class="label label-default">Not Available</span>
                 @endif
                </td>
      	        <td>{{$f->litre}} Litre</td>
      	        <td></td>
      	        <td>{{$f->amount}} Taka</td>
      	        <td></td>
            </tr>
            @endforeach
            <tr>
           	    <td>{{ $i }}</td>
                <td></td>
                <td></td>
                <td></td>
		        <td></td>
		        <td></td>
		        <td></td>
		        <td><b>{{$litre_sum}} Litre</b></td>
		        <td></td>
		        <td><b>{{$amount_sum}} Taka</b></td>
            </tr>
           </tbody>
		 </table>
		</div>

	</div>
	{{-- <div class="col-md-5">
		   


	</div>
	<div class="col-md-3">
		<a href="#" class="btn btn-primary" style="margin-bottom: 5px;">On Load Laser</a>

           <div class="panel panel-primary" style="border-color:#CCFE43;color:#000; ">
             <div class="panel-heading" style="background: #CCFE43;border-color:#CCFE43;color:#000;">
               <h3 class="panel-title" style="text-align: center;">Total Onload</h3>
               <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                </div>
               <div class="panel-body">Total Onload</div>
           </div>

  
	</div> --}}
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
             console.log(result);
        }});
    });
});

</script>

@endsection
@endsection


