@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="portlet light bordered">
		 <table class="table table-striped table-bordered table-hover" id="sample_1">
		   <thead>
                <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Customer ID</th>
                <th>Product Type</th>
                <th>Quanity</th>
                <th>Stock ID</th>
                <th>Transport Type</th>
                <th>Year</th>
                </tr>
           </thead>
           @php
           $i=1;
           @endphp
           <tbody>
           @foreach($delivery as $d)
           	<tr>
                <td>{{$i++}}</td>
                <td>{{$d->date}}</td>
                <td>{{$d->customer_id}}</td>
                <td>{{$d->product_type}}</td>
                <td>{{$d->quantity}}</td>
                <td>{{$d->stock_id}}</td>
                <td>{{$d->transport_type}}</td>
                <td>{{$d->year}}</td>
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


