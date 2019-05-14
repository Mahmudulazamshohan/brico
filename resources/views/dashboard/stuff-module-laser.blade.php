@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="portlet light bordered">
		<div class="row" style="margin-bottom: 30px;">
			<div class="col-md-9">
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; ">Worker Name:{{$stuff->name}}</div>
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; ">Worker ID:{{$stuff->stuff_id}}</div>
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; ">Mobile:{{$stuff->mobile}}</div>
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; ">Address:{{$stuff->address}}</div>
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; ">Position:{{$stuff->position}}</div>
				<div class="text-left" style="font-size: 18px ; ">Join Date:{{$stuff->join_date}}</div>
			</div>
			
			<div class="col-md-3" style="margin-bottom: 120px;">
				<img src="{{ asset('nid-upload/'.$stuff->avater_file_name.'') }}" width="100%" height="200px" style="border:4px solid #ccc;margin-bottom: 4px;"><br>
				<div class="row">
					<div class="col-md-12" style="padding: 0px;">
						<div class="btn btn-default" style=" width: 100%; color:red;font-weight: bold;">National Identification</div><br>
					</div>
					<div class="col-md-6" style="padding: 0px;">
						<a href="{{ asset('nid-upload/'.$stuff->avater_file_name.'') }}" target="download" class="btn btn-default" style="width: 100%;border-radius: 0px;color:#5687FE;font-weight: bold;">View</a>
					</div>
					<div class="col-md-6" style="padding: 0px;">
						<a href="{{ asset('nid-upload/'.$stuff->avater_file_name.'') }}" download="{{$stuff->avater_file_name}}" class="btn btn-default" style="width: 100%;border-radius: 0px;color:#5687FE;font-weight: bold;">Download</a>
					</div>
				</div>
				
				
				

			</div>
			
		</div>

		 
			<table class="table table-striped table-bordered table-hover" id="sample_1">
		   <thead>
                <tr>
                <th>ID#</th>
                <th>Date</th>
                <th>Payment Type</th>
                <th>Current Month</th>
                <th>Amount</th>
                <th>Total</th>
                </tr>
           </thead>
           <tbody>
           @php
           $i=1;
           @endphp
           @foreach($stuff_salary as $s)
           	<tr>
           	    <td>{{$i++}}</td>
                <td>{{$s->date}}</td>
                <td>{{$s->position}}</td>
                <td>{{$s->current_month}}</td>
                <td>{{$s->amount}} TK</td> 
                <td></td> 
            </tr>
            @endforeach
            <td>{{$i}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$total_amount}} TK</td>
           </tbody>
		 </table>
		</div>

	</div>
	
</div>
@section('scripts')
  <script type="text/javascript">
  
</script>

@endsection
@endsection


