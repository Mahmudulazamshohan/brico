@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="portlet light bordered">
    <div class="row" style="margin-bottom: 10px;">
      <div class="col-md-4">
        <div class="text-left" style="font-size:22px;font-weight: bold; margin-bottom: 4px;">
          Producer Name:- {{$p->produced_by}}
        </div>
        <div class="text-left" style="font-size: 22px;font-weight: bold; margin-bottom: 4px;">
          Mobile No:- {{$p->phone}}
        </div>
        <div class="text-left" style="font-size: 22px;font-weight: bold; margin-bottom: 4px;">
          Year:- {{$p->year}}
        </div>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
       <div class="col-md-12" style="margin-top: 40px;">
		 <table class="table table-striped table-bordered table-hover" id="sample_1" >
		   <thead>
                <tr>
                <th>ID#</th>
                <th>Date</th>
                <th>Year</th>
                <th>Produced By</th>
                <th>Rate Per Ton</th>
                <th>Quantity / Per Ton</th>
                <th>Imported Country</th>
                <th>Killo-Calorie</th> 
                <th>Amount</th>
               
                </tr>
           </thead>
           <tbody>

           @php
           $i=1;
           @endphp
           @foreach($coal as $c)
           	     <tr>
           	     <td>{{$i++}}</td>
                 <td>{{ $c->date }}</td>
                  <td>{{ $c->year }}</td>
           	     <td>{{ $c->produced_by }}</td>
                 <td>{{ $c->rate_per_ton }}</td>
                  <td>{{ $c->quantity }}</td>
                 <td>{{ $c->import_country }}</td>
                 <td>{{ $c->killo }}</td>
                 <td>{{ $c->amount }}</td>
                 
                  </tr>
            @endforeach
            <tr>
                 <td>{{$i}}</td>
                 <td></td>
                  <td></td>
                 <td></td>
                 <td></td>
                  <td></td>
                 <td></td>
                 <td style="font-weight: bold;">Total Amount</td>
                 <td>{{$total_amount}}</td>
                 
                  </tr>
           
           </tbody>
		 </table>
     </div>
			
		</div>

	</div>
	
	
</div>
@section('scripts')
  <script type="text/javascript">


</script>

@endsection
@endsection


