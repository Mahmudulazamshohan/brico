@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="portlet light bordered">
		

		 
			<table class="table table-striped table-bordered table-hover" id="sample_1">
		   <thead>
                <tr>
                <th>ID#</th>
                  <th> Date</th>
                  <th> Year</th>
                  <th> Mill no</th>
                  <th> Round no</th>
                  <th> Pot no</th>
                  <th> Sordar</th>
                  <th>Even</th>
                  <th>Line</th>   
                  <th>Total raw brick</th>
                </tr>
           </thead>
           <tbody>
           @php
            $i=1;
            $brick_sum =0;
           @endphp
           @foreach($raw as $r)
           	<tr>
                  <td>{{ $i++ }}</td>
                  <td> {{ $r->setup_date }}</td>
                  <td>{{  $r->year }}</td>
                  <td> {{ $r->mill_no}}</td>
                  <td> {{ $r->round_no }}</td>
                  <td> {{ $r->pot_no }}</td>
                  <td> {{ $r->sordar_name }}</td>

                  <td> {{$r->even_no }}</td>
                   <td> {{ $r->line }}</td>          
                  @php
                  $brick_sum +=$r->even_no * $r->line;
                  @endphp
                  <td> {{  $r->even_no * $r->line }}</td>
                </tr>
            @endforeach
            <tr>
                  <td>{{$i++}}</td>
                  <td></td>
                  <td></td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td></td>
                  <td>{{$brick_sum}}</th>
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


