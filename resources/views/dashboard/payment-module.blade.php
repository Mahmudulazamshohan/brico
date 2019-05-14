@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
    <div class="col-md-4">

    </div>
	<div class="col-md-4">

		<div class="portlet light bordered">
		 
			<form action="{{ route('store-payment-module') }}" method="post" enctype="multipart/form-data">
			                  {{ csrf_field() }}
                              <label>Date</label>
                              <input type="date" name="date" class="form-control input-lg">
                              <label>Category/Position</label>
                              <select type="date" name="position" class="form-control input-lg">
                              <option>Select Category/Position</option>
                              @foreach($stuffG as $sg)
                                 <option value="{{$sg->position}}">{{$sg->position}}</option>
                              @endforeach
                              </select>
                              <label>All Category/Stuff Name</label>
                              <select type="date" name="stuff_name" class="form-control input-lg">
                              <option>Select Category/Position</option>
                              @foreach($stuff as $s)
                                 <option value="{{$s->name}}">{{$s->name}}</option>
                              @endforeach
                              </select>
                              <label>Description</label>
                              <input type="text" name="note" class="form-control input-lg">
                              <label>Amount</label>
                              <input type="number" name="amount" class="form-control input-lg">
                              <center>  <input type="submit" class="btn btn-info" style="background:#FF9900;border-width: 0px;margin-top: 4px;">
                              </center>
	
			</form>
		</div>

	</div>
	
	
    <div class="col-md-4"></div>
</div>
@section('scripts')


</script>

@endsection
@endsection


