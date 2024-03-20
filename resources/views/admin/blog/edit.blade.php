@extends('layouts.admin')
<!-- Kế thừa master.blade.php -->
@section('title',' Create Blog ')
@section('main')

<form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
   @csrf @method('PUT')
<div class="row">
    <div class="col-md-8">

        <div class="form-group">
            <label for="">Blog Name</label>
            <input class="form-control" name="name" value="{{$blog->name}}" placeholder="Please Enter Blog Name">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
           <textarea name="description" value="{{$blog->description}}"  id="content"  class="form-control" placeholder="Enter Description">{{$blog->description}}</textarea>
            @error('description')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

    </div>

    <div class="col-md-4">
        
        <div class="form-group">
            <label for="">Summary</label>
            <input class="form-control" name="summary" value="{{$blog->summary}}" placeholder="Please Enter Summary">
            @error('summary')
                <div class="alert alert-danger">
                    <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        
         
         <div class="form-group">
            <label for="">Image</label>
            <input class="form-control file_upload" value="" type="file"  name="file_upload" style="display: none">
            <img src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483296.jpg" id="show_img" style="width:100%;cursor:pointer;object-fit:cover;">

            @error('image')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror

        </div>
         <div class="form-group">
            <label for=""> Old Image</label>
            <input class="form-control" value="{{$blog->image}}" type="text"  name="image" readonly>
            <img src="{{URL::asset('uploads')}}/{{$blog->image}}"  width="50">
            @error('image')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" {{ $blog->status == 1 ? 'checked' : ''  }}>
                    Private
                </label>
                <label>
                    <input type="radio" name="status" value="0" {{ $blog->status == 0 ? 'checked' : ''  }}>
                   Public
                </label>
            </div>
        </div>
         @error('status')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
        @enderror
    </div>

    <a href="{{route('blog.index')}}" class="btn btn-danger mr-3" style="opacity:65%;"><i
    class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
    <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i> Saved</button>

    </div>
</form>


@stop()

@section('css')
<link rel="stylesheet" href="{{URL::asset('admin_lte3')}}/plugins/summernote/summernote-bs4.css">
@stop()

@section('js')
<script src="{{URL::asset('admin_lte3')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#content').summernote({
        height:220,
        placeholder:"Enter Description"
    });
  });


  
</script>

<script src="summernote-cleaner.js"></script>
<script>

$('#show_img').click(function(){
    $('.file_upload').click();
})


$('.file_upload').change(function () {
    var file = $(this).get(0).files[0];

    if(file){
        var render = new FileReader();
        render.onload = function(){
            $('#show_img').attr('src',render.result);
        };
        render.readAsDataURL(file);
    }
  });
</script>



@stop()