@extends('layouts.dashboard')
@section('title', 'Home Page Setting')

@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!! Form::model($home,['route'=>['update_home_page_setting',$home->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>Top Title</strong></label>

                            <div class="col-md-6">
                                <input class="form-control input-lg" name="top_title" value="{{ $home->top_title }}"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>Top Short Description</strong></label>

                            <div class="col-md-6">
                                <textarea name="top_description" id="" cols="30" rows="5"
                                          class="wysihtml5 input-lg">{{ $home->top_description }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>Bottom Title</strong></label>

                            <div class="col-md-6">
                                <input class="form-control input-lg" name="bottom_title" value="{{ $home->bottom_title }}"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>Bottom Long Description</strong></label>

                            <div class="col-md-6">
                                <textarea name="bottom_description" id="" cols="30" rows="5"
                                          class="wysihtml5 input-lg">{{ $home->bottom_description }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <button type="submit" class="btn blue btn-block">Save Changes</button>
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>
    </div><!---ROW-->


@endsection
@section('scripts')

    <link href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>

@endsection