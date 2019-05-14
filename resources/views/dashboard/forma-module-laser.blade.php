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
                <th>Date</th>
                <th>Supplier</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Rate</th>
                <th>Quantity</th>
                <th>Distance</th>
                <th>Width</th>
                <th>Height</th>
                <th>Note</th>
                </tr>
           </thead>
           <tbody>
           @php
            $i=0;
           @endphp
           @foreach($forma as $f)
           	<tr>
                  <td>{{$i++}}</td>
                  <td>{{$f->date}}</td>
                  <td>{{$f->supplier}}</td>
                  <td>{{$f->address}}</td>
                  <td>{{$f->mobile}}</td>
                  <td>{{$f->rate}}</td>
                  <td>{{$f->quantity}}</td>
                  <td>{{$f->distance}}</td>
                  <td>{{$f->width}}</td>
                  <td>{{$f->height}}</td>
                  <td>{{$f->note}}</td>
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


