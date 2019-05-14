@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">
  <div class="row" style="margin-bottom: 50px;">
    <div class="co-md-4">
      <div class="text-left" style="margin-left: 12px;font-size: 22px;"><b>Year:{{$year}}</b></div>
    </div>
    <div class="co-md-4"></div>
    <div class="co-md-4"></div>
  </div>

		<div class="portlet light bordered">
		 <table class="table table-striped table-bordered table-hover" id="sample_1">
		   <thead>
                <tr>
                <th>ID#</th>
                <th>Date</th>
                <th>Year</th>
                <th>Round</th>
                <th>Current Chamber</th>
                <th>Chamber</th>
                <th>Radda</th>
                <th>Total Load</th>
                <th>Rate</th>
                <th>Total Bill</th> 
                </tr>
           </thead>
           @php
           $i=1;
           @endphp
           <tbody>
           @foreach($unload as $u)
           	<tr>
           	    <td>{{$i++}}</td>
                <td>{{$u->date}}</td>
                <td>{{$u->year}}</td>
                <td>{{$u->round}}</td>
                <td>{{$u->current_chamber}}</td>
                <td>{{$u->chamber}}</td>
                <td>{{$u->radda}}</td> 
                <td>{{$u->total_unload}}</td>
                <td>{{$u->rate_per_thousand}}</td>
                <td>{{$u->total_bill}}/=</td>
                
                
            </tr>
            @endforeach
            <tr>
                <td>{{$i}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="font-weight: bold;">Total Unload:</td> 
                <td>{{$total_unload}}</td>
                <td style="font-weight: bold;">Total Bill:</td>
                <td>{{number_format($total_bill,3) }}/=</td>
                
                
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


