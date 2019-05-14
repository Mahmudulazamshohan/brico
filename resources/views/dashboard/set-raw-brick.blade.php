@extends('layouts.dashboard')

@section('title', 'Raw Brick')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="portlet light bordered">



                <div class="portlet-body form">

                   <!--  {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!} -->
                    <form action="update-raw-brick" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">

                    <div class="row">
                         <div class="col-md-7">
                         <div class="row">
                             <div class="col-sm-4"></div>
                             <div class="col-sm-4">
                                 <input type="number" name="year" class="form-control input-lg" style="margin-bottom: 4px;" placeholder="Year" value="<?php echo date('Y');?>">
                             </div>
                             <div class="col-sm-4">
                                 <select name="sordar_name" class="form-control input-lg" style="margin-bottom: 4px;">
     
                                     @foreach($sordar as $s)
                                     <option value="{{$s->name}}">{{$s->name}}</option>
                                     @endforeach

                                 </select>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-6">
                             <input type="date" name="date" class="form-control input-lg">
                             </div>
                             <div class="col-sm-6">
                                 <select name="mill_no" id="" class="form-control input-lg" required="">
                                        <option>Mill No</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                </select>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <select name="round_no" id="" class="form-control input-lg" required="" style="margin-top: 3px">
                                        <option>Round No</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                </select>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <select name="pot_no" id="" class="form-control input-lg" required="" style="margin-top: 3px;margin-bottom: 4px;">
                                        <option>Pot No</option>
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                         <option value="6">6</option>
                                         <option value="7">7</option>
                                         <option value="8">8</option>
                                         <option value="9">9</option>
                                         <option value="10">10</option>
                                         <option value="11">11</option>
                                         <option value="12">12</option>
                                         <option value="13">13</option>
                                         <option value="14">14</option>
                                         <option value="15">15</option>
                                         <option value="16">16</option>
                                         <option value="17">17</option>
                                         <option value="18">18</option>
                                         <option value="19">19</option>
                                         <option value="20">20</option>
                                         <option value="21">21</option>
                                         <option value="22">22</option>
                                         <option value="23">23</option>
                                         <option value="24">24</option>
                                         <option value="25">25</option>
                                         <option value="26">26</option>
                                               
                                </select>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-sm-4">
                                 <h3>Even:</h3>
                             </div>
                             <div class="col-sm-5" style="margin-top: 3px;">
                                 <input type="number" name="even_number" class="form-control input-lg" id="total_raw_brick" placeholder="Even" required="true">
                             </div>
                             <div class="col-sm-3">
                                 <input type="number" name="line" class="form-control input-lg" id="line" placeholder="Line">
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-10">
                                 <h3>Total Raw Brick:</h3>
                             </div>
                             <div class="col-sm-2">
                                 <h3 id="total" class="text-center"></h3>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <input type="submit" style="width: 100%;height: 50px; background: #FF6735; font-weight: bold; font-size:22px; color: #fff; border-radius: 10px; border: 3px solid #fff; " name="submit" value="Update">
                             </div>
                         </div>
                         </form>
                         
                         </div>
                         <div class="col-md-5">
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="panel panel-primary" style="border-color:#98DCB7; ">
                                   <div class="panel-heading" style="background: #98DCB7;border-color:#98DCB7;">
                                   <h3 class="panel-title">Today Production</h3>
                                   <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                                    </div>
                                  <div class="panel-body"><center><b>{{$today_production}}</b></center></div>
                               </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="tab tab-"></div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="panel panel-primary" style="border-color:#E19AFF; ">
                                   <div class="panel-heading" style="background: #E19AFF; border-color:#E19AFF; ">
                                   @if($mill_no)<h3 class="panel-title">{{$mill_no}} No Mill Total Production</h3>
                                   @else<h3 class="panel-title">{{$mill_no}} No Mill Added</h3>@endif
                                   <span class="pull-right clickable" style="margin-top:-20px; font-size: 15px;"><i class="fa fa-plus"></i></span>
                                    </div>
                                  <div class="panel-body"><center><b>{{$last_mill_pro}}</b></center></div>
                               </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="panel panel-primary" style="border-color:#A0BBFF; ">
                                   <div class="panel-heading" style="background: #A0BBFF; border-color:#A0BBFF;">
                                   <h3 class="panel-title" >Total Production</h3>
                                   <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                                    </div>
                                  <div class="panel-body"><center><b>{{$total_mill_pro}}</b></center></div>
                               </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <div class="panel panel-primary" style="border-color:#DBFF79; ">
                                   <div class="panel-heading" style="background: #DBFF79; border-color:#DBFF79; ">
                                   <h3 class="panel-title" style="color:red;">Sordar Account</h3>
                                   <span class="pull-right clickable" style="margin-top: -20px;font-size: 15px;"><i class="fa fa-plus"></i></span>
                                    </div>
                                  <div class="panel-body">
                                      
                                  </div>
                               </div>
                             </div>
                         </div>
                             
                         </div>
                     </div>


                     <!-- Start Row  -->
                     <div class="row">
                         <div class="col-md-4"></div>
                         <div class="col-md-4">
                             <button class="btn btn-success" id="toggleBtn">Live Raw Brick</button>
                         </div>
                         <div class="col-md-4"></div>
                     </div>
                     <div id="toggleBody">
                     
                     @if(count($raw_bricks))
                     <div class="row">
                     	<div class="col-md-2">Mill No</div>
                     	<div class="col-md-2">Round No</div>
                     	<div class="col-md-2">Pot no</div>
                     	<div class="col-md-2">Even</div>
                     	<div class="col-md-4">Line</div>
                     </div>
                     @endif
                     @foreach($raw_bricks as $raw_brick)
                     <div class="row">
                        <form action="{{ url('edit-raw-brick') }}" method="post">
                        {{ csrf_field() }}
                      	<div class="col-md-2" style="margin-bottom: 4px;">	
                                <input type="number" name="mill_no" class="form-control input-lg" value="{{ $raw_brick->mill_no }}">
                      	</div>
                      	<div class="col-md-2" style="margin-bottom: 4px;">	
                                <input type="number" name="round_no" class="form-control input-lg" value="{{ $raw_brick->round_no }}" >
                      	</div>
                      	<div class="col-md-2" style="margin-bottom: 4px;">
                      		   <input type="number" name="pot_no" class="form-control input-lg" value="{{ $raw_brick->pot_no }}" >
                      	</div>
                      	<div class="col-md-2" style="margin-bottom: 4px;">	
                      	      <input type="number" name="even_no" class="form-control input-lg" value="{{ $raw_brick->even_no }}">
                      	</div>
                        <div class="col-md-2" style="margin-bottom: 4px;">  
                              <input type="number" name="line" class="form-control input-lg" value="{{ $raw_brick->line }}">
                        </div>
                      	<div class="col-md-2" style="margin-bottom: 4px;">
                      		<input type="submit" name="" class="btn btn-success" value="Edit">
                      	</div>
                      	</form>
                      </div> <!-- End Row -->

                     	@endforeach


                        </div>

                    </div>


                    <!-- {!! Form::close() !!} -->

                </div>

            </div>

        </div>

    </div><!---ROW-->
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            
        <form action="" id="laser">
             <select name="" class="form-control input-lg" style="margin-bottom: 4px;" id="laser_sordar">
                 <option>Select Sardar</option>
                 @foreach($sordar as $s)
                 <option value="{{$s->name}}">{{$s->name}}</option>
                 @endforeach

             </select>
            <input type="number" class="form-control input-lg" style="margin-bottom: 4px;" id="laser_year" placeholder="Year" value="<?php echo date('Y');?>" >
            <input type="date" class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input" >
            <button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
        </form>
        </div>
        <div class="col-md-4"></div>
    </div>


@section('scripts')
<script type="text/javascript">
$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('fa fa-plus').addClass('fa fa-minus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('fa fa-minus').addClass('fa fa-plus');
    }
});
$('#total_raw_brick').keyup(function(event) {
    var num = $('#total_raw_brick').val();
    $('#total').text(num*$('#line').val());
});
$('#line').keyup(function(event) {
    var num = $('#total_raw_brick').val();
    $('#total').text(num*$('#line').val());
});
 

 $("#toggleBody").hide();
$(document).ready(function(){
    $("#toggleBtn").click(function(){
        $("#toggleBody").slideToggle();
    });
});

$("#view_laser_btn").click(function() {
     $('#laser').attr("action","raw-brick-laser/"+$("#view_laser_input").val()+"/"+$("#laser_sordar").val()+"/"+$("#laser_year").val());
   });
</script>
@endsection


@endsection



