@extends('layouts.dashboard')

@section('title', 'All Customer')

@section('content')


        <div class="row">

            <div class="col-md-12">





                <div class="portlet light bordered">

                    <div class="portlet-title">

                        <div class="caption font-dark">

                        </div>

                        <div class="tools"> </div>

                    </div>

                    <div class="portlet-body">
                       <div class="row">
                         <div class="col-sm-12 col-md-12 col-lg-12">
                           <h1 class="text-center" style="color:red;">Do you want to delete customer account?</h1>
                           <div class="row">
                             <div class="col-sm-2"></div>
                             <div class="col-sm-2">
                             
                              </div>
                             <div class="col-sm-2">
                                 <a href="{{url('customer-delete',$id)}}" class="btn btn-danger">Delete</a>
                                 <a href="{{route('customer-show')}}" class="btn btn-success">Cancel</a>
                             </div>
                             <div class="col-sm-2"></div>
                              <div class="col-sm-2"></div>
                               <div class="col-sm-2"></div>
                           </div>
                           
                         </div>
                       </div>
                     
                    </div>

                </div>



            </div>

        </div><!-- ROW-->



@section('scripts')

@endsection



@endsection





