@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="portlet light bordered">

		 
			<table class="table table-striped table-bordered table-hover" id="sample_1">
		   <thead>
                <tr>
                <td>Id</td>
                <td>Date</td>
                <td>Stuff type</td>
                <td>Stuff name</td>
                <td>Accessories type</td>
                <td>Quantity</td>
                <td>Waste</td>
                </tr>
           </thead>
           <tbody>
           @php
           $i=1;
           @endphp
           @foreach($accessories as $a)
           <tr>
             <td>{{$i++}}</td>
                <td>{{$a->date}}</td>
                <td>{{$a->stuff_type}}</td>
                <td>{{$a->stuff_name}}</td>
                <td>{{$a->accessories_type}}</td>
                <td>{{$a->quantity}}</td>
                <td>{{$a->waste}}</td>
            </tr>
            @endforeach
          
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


