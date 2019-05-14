@extends('layouts.dashboard')
@section('title', 'About Page Setting')

@section('content')


    <div class="row">
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-body form">
                    {!! Form::model($about,['route'=>['update_about_page_setting',$about->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>About Page Picture</strong></label>

                            <div class="col-md-6">
                                <img src="{{ asset('images/') }}/{{ $about->image }}" alt="" style="width: 500px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>Change About Page Picture</strong></label>

                            <div class="col-md-6">
                                <input type="file" name="image" id="" class="form-control">
                                <p><b style="color:red; font-weight: bold;margin-right: 10px">Image Must be JPG &  Dimensions: 360x400</b></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>About Page Title</strong></label>

                            <div class="col-md-6">
                                <input class="form-control input-lg" name="title" value="{{ $about->title }}"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><strong>About Page Description</strong></label>

                            <div class="col-md-6">
                                <textarea name="description" id="" cols="30" rows="5"
                                          class="wysihtml5 input-lg">{{ $about->description }}</textarea>
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