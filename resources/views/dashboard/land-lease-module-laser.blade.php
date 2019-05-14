@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="portlet light bordered">
		<div class="row" style="margin-bottom: 30px;">
			<div class="col-md-9">
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; font-weight: bold; ">Land Owner Name:{{$land_lease->landower_name}}</div>
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; font-weight: bold; ">Land Owner ID:{{str_replace(" ","",strtoupper("Land".$land_lease->landower_name.$land_lease->id))}}</div>
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; font-weight: bold; ">Mobile No:{{$land_lease->mobile}}</div>
			</div>
			
			<div class="col-md-3" style="margin-bottom: 120px;">
				
              <div class="text-left" style="font-size: 18px ;margin-bottom:3px; font-weight: bold; ">Reminder Date:{{$land_lease->reminder_date}}</div>
				<div class="text-left" style="font-size: 18px ;margin-bottom:3px; font-weight: bold; ">Reminder Times:{{$land_lease->time }}</div>
			
			
		</div>

		 
			<table class="table table-striped table-bordered table-hover" id="sample_1">
		   <thead>
                <tr>
                <th>ID#</th>
                <th>Land Owner Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Land Quantity</th>
                <th>Note</th>
                <th>Lease Amount</th>
                <th>Unit</th>
                </tr>
           </thead>
           <tbody>
           @php
            $i=1;
           @endphp
           @foreach($land_leases as $l)
           	<tr>
           	          <td>{{$i++}}</td>
                    <td>{{ $l->landower_name }}</td>
					<td>{{ $l->start }}</td>
					<td>{{ $l->end }}</td>
					<td>{{ $l->land_quantity }}</td>
					<td>{{ $l->note }}</td>
					<td>{{ $l->amount }}/=</td>
					<td>{{ $l->unit }}</td>
				
					
					
            </tr>
            @endforeach
            <tr>
           	        <td>{{$i}}</td>
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;">Total Amount</td>
					<td>{{$total_sum}}/=<td>
					<td><td>	
					
            </tr>
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


