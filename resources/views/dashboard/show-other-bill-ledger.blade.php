@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="portlet light bordered">
     <center><button class="btn btn-success" style="font-weight: bold;margin-bottom: 4px;">{{ $bill_types }}</button></center>
     <div class="row" style="margin-bottom: 25px;">
       <div class="col-md-4"></div>
       <div class="col-md-4">
         <center> 
         <form action="" id="laser">
            <select class="form-control input-lg" id="bill_search" required style="margin-bottom: 4px;">
                            <option>Select</option>
                            <option value="Electricity Bill">Electricity Bill</option>
                            
                            <option value="Paper Bill">Paper Bill</option>
                            <option value="Others Bill">Other's Bill</option>
              <option value="Purchase of goods">Purchase of goods</option>
              <option value="Flexiload">Flexiload</option>
              <option value="Fuel wood">Fuel wood</option>
              <option value="Coal bills">Coal bills</option>
              <option value="Cloth">Cloth</option>
              <option value="Coal transportation">Coal transportation</option>
              <option value="Break the hole">Break the hole</option>
              <option value="Buy sand">Buy sand</option>
              <option value="Miscellaneous">Miscellaneous</option>
              <option value="Escit Rent">Escit Rent</option>
              <option value="Ruler is filled">Ruler is filled</option>
              <option value="Polythene and Tripoli purchase">Polythene and Tripoli purchase</option>
              <option value="VAT">VAT</option>
              <option value="Association expenses">Association expenses</option>
              <option value="Internet bill">Internet bill</option>
              <option value="Donations">Donations</option>
             </select>
             <div class="row">
              <div class="col-md-12">
                 <div id="laserLabelAppend"></div>
                 <div id="laser_append">
                  
                 </div>
              </div>
             </div>
             
             

                     <select  class="form-control input-lg" id="view_laser_input" required style="margin-bottom: 4px;margin-top: 4px;"> 
                <option value="January">January </option>
                <option value="February">February </option>
                <option value="March ">March </option>
                <option value="April">April </option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July </option>
                <option value="August">August </option>
                <option value="September">September </option>
                <option value="October">October </option>
                <option value="November">November</option>
                <option value="December">December </option>
                     </select>
                     <input type="number" class="form-control input-lg" id="search_year" placeholder="Year" required style="margin-bottom: 4px;" value="{{date('Y')}}">
          <button  class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn" >View Laser</button>
        </form>
        </center>
       </div>
       <div class="col-md-4"></div>
     </div>
		 <table class="table table-striped table-bordered table-hover" id="sample_1" style="margin-top: 10px;">
		   <thead>
                <tr>
                <th>ID#</th>
                <th>Date</th>
                <th>Month</th>
                <th>Bill Type</th>
                <th>Bill User Input</th>
                <th>Payment Type</th>
                <th>Cheque No</th>
                <th>Amount</th>
                <th>Total Amount</th>
                <th>Note</th>
                </tr>
           </thead>
           <tbody>
           @php
           $i=1;
           @endphp

           @foreach($month as $k => $m)
           	<tr>
           	    <td>{{$i++}}</td>
                <td>{{$m->date}}</td>
                <td>{{$m->month}}</td>
                <td>{{$m->bill_type}}</td>
                <td>{{$m->bill_user_input}}</td>
                <td>{{$m->payment_type}}</td>
                @if($m->cheque_no!=null)
                <td>{{$m->cheque_no}}</td>
                @else
                <td><span class="label label-default">Not Available</span></td>
                @endif
                <td>{{$m->amount}} /=</td>
                <td></td>
                <td>{{$m->cash_denomination}} </td>
                
                
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
                <td></td>
                <td style="font-weight: bold;">{{$total_amount}}/=</td>
                 <td></td>
            </tr>
           </tbody>
		 </table>
			
		</div>

	</div>
	
</div>
@section('scripts')
  <script type="text/javascript">


 $("#view_laser_btn").click(function() {
     $('#laser').attr("action","http://{{$_SERVER['HTTP_HOST']}}/show-other-bill-ledger/"+$('#search_year').val()+"/"+$("#view_laser_input").val()+"/"+$('#bill_search').val()+"/"+$("#laser_bills").val());
   });
$("#bill_search").click(function(){
  if($("#bill_search").val() == "Coal bills"){
    $("#laserLabelAppend").html("Coal Producer({{$produced_by}})");
        $("#laser_append").html('<input class="form-control input-lg"  id="laser_bills"  placeholder="Coal Producer Name" style="margin-top:4px;">');
  }else if ($("#bill_search").val() == "Electricity Bill") {
   $("#laserLabelAppend").html($("#bill_search").val());
        $("#laser_append").html('<input class="form-control input-lg" id="laser_bills"  placeholder="'+$("#bill_search").val()+'" style="margin-top:4px;margin-bottom:4px;" value="440 Line Bill" >');
  }else{
       $("#laserLabelAppend").html($("#bill_search").val());
       $("#laser_append").html('<input class="form-control input-lg"  id="laser_bills" placeholder="'+$("#bill_search").val()+'" style="margin-top:4px;"  >');
  }
  
});
</script>

@endsection
@endsection


