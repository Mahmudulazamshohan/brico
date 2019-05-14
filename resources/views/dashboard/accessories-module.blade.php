@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
    
    <div class="col-md-12">

        <div class="portlet light bordered">
         
            <form action="{{ route('store-accessories-module') }}" method="post">
                              {{ csrf_field() }}
                   <div class="row">
                     <div class="col-md-4">
                       <label>Date</label>
                       <input type="date" name="date" class="form-control input-lg">
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4"></div>
                   </div>
                   <div class="row">
                     <div class="col-md-4">
                     <label>Stuff Type</label>
                       <select class="form-control input-lg" name="stuff_type">
                         <option>Stuff Type</option>
                         @foreach($position as $p)
                         <option value="{{$p->position}}">{{$p->position}}</option>
                         @endforeach
                       </select>
                     </div>
                     <div class="col-md-4"> 
                     </div>
                     <div class="col-md-4"></div>
                   </div>
                   <div class="row">
                     <div class="col-md-4">
                        <label>Select Stuff Name</label>
                        <select name="stuff_name" class="form-control input-lg">
                          <option value="">Select</option>
                          @foreach($stuff as $s)
                           <option value="{{$s->name}}">{{$s->name}}</option>
                          @endforeach
                        </select>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4"></div>
                   </div>
                   <div class="row">
                     <div class="col-md-4">
                       <label>Accessories Type</label>
                       <select name="accessories_type" class="form-control input-lg">
                                <option value="">Select</option>
                                <option value="Drum Bait">Drum Bait</option>
                                <option value="Hook big">Hook big</option>
                                <option value="Hook medium">Hook medium</option>
                                <option value="Hook small">Hook small</option>
                                <option value="Coal spoon">Coal spoon</option>
                                <option value="Padding">Padding</option>
                                <option value="Big Bucket">Big Bucket</option>
                                <option value="Small Bucket">Small Bucket</option>
                                <option value="Kettle">Kettle</option>
                                <option value="Cup">Cup</option>
                                <option value="Formi">Formi</option>
                                <option value="Turning">Turning</option>
                                <option value="Pitcher">Pitcher</option>
                                <option value="Snakes">Snakes</option>
                                <option value="Clog">Clog</option>
                                <option value="Ballet">Ballet</option>
                                <option value="Holder">Holder</option>
                                <option value="Spade"> Spade </option>
                                <option value="Ballet"> Ballet </option>
                                <option value="Bucket"> Bucket </option>
                                <option value="Pea">  Pea </option>
                                <option value="Pipes"> Pipes </option>
                                <option value="Mug"> Mug </option>
                                <option value="Template ">Template </option>
                                <option value="Rails"> Rails </option>
                                <option value="Top car over"> Top car over </option>
                                <option value="Top car start"> Top car start </option>
                       </select>
                     </div>
                     <div class="col-md-4">
                       <label>Quantity</label>
                       <input type="text" name="quantity" class="form-control input-lg">
                     </div>
                     <div class="col-md-4">
                       <label>Waste</label>
                      <input type="text" name="waste" class="form-control input-lg">
                     </div>
                   </div>
                   <center><input type="submit" class="btn-lg btn-info" style="background:#FF9900;border-width: 0px;margin-top: 4px;"></center>
                  
            </form>

        </div>

    </div>
    
  
</div>
<form action="" id="laser">
<div class="row">


  <div class="col-md-4">
    <select class="form-control input-lg" id="stuff_t">
                         <option>Stuff Type</option>
                         @foreach($position as $p)
                         <option value="{{$p->position}}">{{$p->position}}</option>
                         @endforeach
  </select>
  </div>
  <div class="col-md-4">
  <select id="stuff_n" class="form-control input-lg">
                          <option value="">Select</option>
                          @foreach($stuff as $s)
                           <option value="{{$s->name}}">{{$s->name}}</option>
                          @endforeach
  </select>  
  </div>
  <div class="col-md-4"> 
  <input type="date" class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input">
  </div>

</div>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <center> <button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button></center>
  </div>
  <div class="col-md-4"></div>
</div>
</form>
@section('scripts')
<script type="text/javascript">
   $("#view_laser_btn").click(function() {
     $('#laser').attr("action","accessories-module-laser/"+$("#stuff_t").val()+"/"+$("#stuff_n").val()+"/"+$("#view_laser_input").val());
   });
</script>

</script>

@endsection
@endsection


