@extends('layouts.admin')
<!-- Kế thừa master.blade.php -->
@section('title',' Create Product ')
@section('main')

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="row">
    <div class="col-md-9">

        <div class="form-group">
            <label for="">Product Name</label>
            <input class="form-control" name="name" value="{{old('name')}}" placeholder=" Please Enter Category Name">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
           <textarea name="description"  id="content"  class="form-control" placeholder="Enter Description">{{old('description')}}</textarea>
            @error('description')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for=""> Any Images </label>
            <input type="file" class="form-control" name="file_uploads[]" multiple>
            @error('description')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
    </div>
    
   




    <div class="col-md-3">
         <div class="form-group">
            <label for="">Price</label>
            <input class="form-control" name="price" value="{{old('price')}}" placeholder=" Please Enter Price">
            @error('price')
                <div class="alert alert-danger">
                    <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

         <div class="form-group">
            <label for="">Sale_Price</label>
            <input class="form-control" name="sale_price" value="{{old('sale_price')}}" placeholder=" Please Enter Sale Price">
            @error('sale_price')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

         <div class="form-group">
            <label for="">Category_id</label>
           <select name="category_id" class="form-control" >
               <option value="">--- Select One Category --</option>
               @foreach($cats as $cat)
               <option value="{{$cat->id}}" {{ old('category_id') == $cat->id ? 'selected' : ''  }}>{{$cat->name}}</option>
               @endforeach
           </select>
           
            @error('category_id')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

         <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control file_upload" name="file_upload" placeholder="Enter File" style="display:none;">
            <img src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483296.jpg" id="show_img" style="width:100%;cursor:pointer;">
            @error('file_upload')
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
                <input type="radio" name="status" value="1" {{ old('status') == 1 ? 'checked' : ''  }}>
                Sold Out
            </label>
            <label>
                <input type="radio" name="status" value="0" {{ old('status') == 0 ? 'checked' : ''  }}>
                Stocking
            </label>
        </div>
    </div>
         
    </div>
    <a href="{{route('product.index')}}" class="btn btn-danger mr-3" style="opacity:65%;"><i
                                            class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
    <button type="submit" class="btn btn-primary"> <i class="fa fa-save" aria-hidden="true"></i> Saved</button>
</form>
    </div>
</div>


@stop()

@section('css')
<link rel="stylesheet" href="{{url('public/admin_lte3')}}/plugins/summernote/summernote-bs4.css">
@stop()

@section('js')
<script src="{{url('public/admin_lte3')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#content').summernote({
        height:220,
        placeholder:"Enter Description"
    });
  });


  
</script>
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