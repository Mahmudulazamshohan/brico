@extends('layouts.dashboard')

@section('title', 'Create Delivery')

@section('content')
<div class="row">
	<div class="col-md-4">

		<div class="portlet light bordered">
		 
			<form action="{{ route('store-stuff-module') }}" method="post" enctype="multipart/form-data">
			                  {{ csrf_field() }}
			    <label>Name</label>
			    <input type="text" name="name" class="form-control input-lg" >
			    <label>Mobile</label>
			    <input type="text" name="mobile" class="form-control input-lg" >
			    <label>Address</label>
			    <input type="text" name="address" class="form-control input-lg" >
			    <label>Positon</label>
			    <input type="text" name="position" class="form-control input-lg" >
			    <label>Join Date</label>
			    <input type="date" name="date" class="form-control input-lg" >
			    <label>Salary</label>
			    <input type="number" name="salary" class="form-control input-lg" >
			    <div class="fileup">
			    <label>Upload NID</label>
			    	<div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename"  disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="fa fa-file-image-o"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input" style="  position: relative;overflow: hidden;margin: 0px;color: #333;background-color: #fff;border-color: #ccc;">
                        <span class="image-preview-input-title"><i class="fa fa-file-image-o"></i>Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" style="position: absolute;top: 0;right: 0;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha(opacity=0);" placeholder="Insert Image file...." /> <!-- rename it -->
                    </div>
                </span>
                </div>
			    </div>
			    <center><input type="submit" name="" class="btn-lg btn-success" style="background:#FF9900;border-width: 0px;margin-top: 4px; "></center>
			   

			</form>
		</div>

	</div>
	<div class="col-md-5">
		   


	</div>
	<div class="col-md-3" style="padding-top: 200px;">

        <form action="" id="laser">
        	<select class="form-control input-lg" style="margin-bottom: 4px;" id="view_laser_input">
        	<option>Select Stuff</option>
        	      @foreach($stuff as $s)
        	      <option value="{{$s->stuff_id }}">{{ $s->name }}</option>
        	      @endforeach
        	</select>
        	<button class="btn btn-success" style="margin-bottom: 4px;" id="view_laser_btn">View Laser</button>
        </form>
        
  
	</div>
</div>
@section('scripts')
  <script type="text/javascript">
   $("#view_laser_btn").click(function() {
   	 $('#laser').attr("action","stuff-module-laser/"+$("#view_laser_input").val());
   });


   $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    // $('.image-preview').hover(
    //     function () {
    //        $('.image-preview').popover('show');
    //     }, 
    //      function () {
    //        $('.image-preview').popover('hide');
    //     }
    // );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>

@endsection
@endsection


