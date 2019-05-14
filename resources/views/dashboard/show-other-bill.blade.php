@extends('layouts.dashboard')

@section('title', "Other's Bill")

@section('content')
<div class="row">
	<div class="col-md-4">

		<div class="portlet light bordered">
		 
			<form action="{{ route('store-other-bill') }}" method="post">
			                  {{ csrf_field() }}
			    <label>Date</label>
				<input type="date" name="select_date" class="form-control input-lg" style="margin-bottom: 4px;">
				<label>Year</label>
				<input type="number" name="year" class="form-control input-lg" value="{{date('Y')}}" style="margin-bottom: 4px;">
				<label>Bill</label>
				<select class="form-control input-lg" name="bill" id="bills">
                            <option>Select</option>
                            <option value="Electricity Bill">Electricity Bill</option>
                            <option value="Paper Bill">Paper Bill</option>
                            <option value="Others Bill">Other's Bill</option>
							<option	value="Purchase of goods">Purchase of goods</option>
							<option	value="Flexiload">Flexiload</option>
							<option	value="Fuel wood">Fuel wood</option>
							<option	value="Electric bill">Electric bill</option>
							<option	value="Coal bills">Coal bills</option>
							<option	value="Cloth">Cloth</option>
							<option	value="Coal transportation">Coal transportation</option>
							<option	value="Break the hole">Break the hole</option>
							<option	value="Buy sand">Buy sand</option>
							<option	value="Miscellaneous">Miscellaneous</option>
							<option	value="Escit Rent">Escit Rent</option>
							<option	value="Ruler is filled">Ruler is filled</option>
							<option	value="Polythene and Tripoli purchase">Polythene and Tripoli purchase</option>
							<option	value="VAT">VAT</option>
							<option	value="Association expenses">Association expenses</option>
							<option	value="Internet bill">Internet bill</option>
							<option	value="Donations">Donations</option>
                </select>
                <div id="labelAppned">
                	
                </div>
                <div id="append">
             	
                </div>
			          <label>Month</label>
              <select name="select_month" class="form-control input-lg""> 
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
			   <label>Note</label>
				<input type="text" name="cash_denomination" class="form-control input-lg" style="margin-bottom: 4px;">
				<label>Payment Type</label>
				<select name="payment_type" class="form-control input-lg" id="payment_type"> 
                <option value="Cheque">Cheque </option>
                <option value="Cash">Cash </option>
    
                     </select>
                <label>Cheque No</label>
                <input type="text" name="cheque_no" class="form-control input-lg" id="cheq_no" disabled="true">
			   <label>Total Amount</label>
			   <input type="number" name="total_amount" class="form-control input-lg" style="margin-bottom: 4px;">
               <div class="row">
                   <div class="col-md-4"></div>
                   <div class="col-md-4">
                       <input type="submit" class="btn-lg btn-primary" value="Save" style="padding:10px 30px 10px 30px; background: #FF9900;border-width: 0px;">
                   </div>
                   <div class="col-md-4"></div>
               </div>
			   


			</form>
		</div>

	</div>
	<div class="col-md-5">
		   


	</div>
	<div class="col-md-3" style="padding-top: 200px;">
		<a href="#" class="btn btn-primary" style="margin-bottom: 5px;">Search Bill</a>
        <form action="" id="laser">
            <select class="form-control input-lg" id="bill_search" required style="margin-bottom: 4px;">
                            <option>Select</option>
                            <option value="Electricity Bill">Electricity Bill</option>
                            <option value="Paper Bill">Paper Bill</option>
                            <option value="Others Bill">Other's Bill</option>
							<option	value="Purchase of goods">Purchase of goods</option>
							<option	value="Flexiload">Flexiload</option>
							<option	value="Fuel wood">Fuel wood</option>
							<option	value="Coal bills">Coal bills</option>
							<option	value="Cloth">Cloth</option>
							<option	value="Coal transportation">Coal transportation</option>
							<option	value="Break the hole">Break the hole</option>
							<option	value="Buy sand">Buy sand</option>
							<option	value="Miscellaneous">Miscellaneous</option>
							<option	value="Escit Rent">Escit Rent</option>
							<option	value="Ruler is filled">Ruler is filled</option>
							<option	value="Polythene and Tripoli purchase">Polythene and Tripoli purchase</option>
							<option	value="VAT">VAT</option>
							<option	value="Association expenses">Association expenses</option>
							<option	value="Internet bill">Internet bill</option>
							<option	value="Donations">Donations</option>
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
        
   
	</div>

</div>


@section('scripts')
  <script type="text/javascript">

$("#view_laser_btn").click(function() {
     $('#laser').attr("action","show-other-bill-ledger/"+$('#search_year').val()+"/"+$("#view_laser_input").val()+"/"+$('#bill_search').val()+"/"+$("#laser_bills").val());
   });

$("#payment_type").click(function() {
	if($("#payment_type").val() == "Cheque"){
	$("#cheq_no").removeAttr('disabled','true');
        
	}else{
     $("#cheq_no").attr('disabled','true');
	}
});


$("#bills").click(function(){
	if($("#bills").val() == "Coal bills"){
		$("#labelAppned").html("Coal Producer({{$produced_by}})");
        $("#append").html('<input class="form-control input-lg" name="bill_type" placeholder="Coal Producer Name" style="margin-top:4px;">');
	}else if ($("#bills").val() == "Electricity Bill") {
		$("#labelAppned").html($("#bills").val());
        $("#append").html('<input class="form-control input-lg" name="bill_type" placeholder="'+$("#bills").val()+'" style="margin-top:4px;" value="440 Line Bill">');
	}else{
       $("#labelAppned").html($("#bills").val());
       $("#append").html('<input class="form-control input-lg" name="bill_type" placeholder="'+$("#bills").val()+'" style="margin-top:4px;" >');
	}
	
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


