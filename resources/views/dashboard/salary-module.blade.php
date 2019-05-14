@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">

        <div class="portlet light bordered">
         
            <form action="{{ route('store-salary-module') }}" method="post">
                              {{ csrf_field() }}
                              <label>Date</label>
                              <input type="date" name="date" class="form-control input-lg">
                              <label>Category/Position</label>
                              <select type="date" name="position" class="form-control input-lg">
                              <option>Select Position</option>
                              @foreach($stuffG as $sg)
                              <option value="{{$sg->position}}">{{$sg->position}}</option>
                              @endforeach
                              </select>
                              <label>Stuff Name</label>
                              <select  name="stuff_id" class="form-control input-lg">
                              <option>Select Stuff Name</option>
                              @foreach($stuff as $s)
                              <option value="{{$s->stuff_id}}">{{$s->name}}</option>    
                              @endforeach 
                              </select>
                              <label>Payment Type</label>
                              <select type="date" name="payment_type" class="form-control input-lg">
                                      <option>Select Payment</option>
                                      <option value="Salary">Salary</option>
                                      <option value="Advance">Advance</option>
                                      <option value="Bonus">Bonus</option>
                              </select>
                              <label>Current Month</label>
                              <input type="month" name="current_month" class="form-control input-lg">
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


