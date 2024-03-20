@extends('layouts.admin') <!-- Kế thừa master.blade.php -->
@section('title','Product Edit')
@section('main')
<h2>Product Edit: {{$pro->name}}</h2>
<form action="{{route('product.update',$pro->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Product Name</label>
            <input value="{{$pro->name}}" class="form-control" name="name" placeholder=" Please Enter Category Name">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
           <textarea  name="description"  id="content" class="form-control">{{$pro->description}}</textarea>
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

        <div class="form-group">
            <div class="row">
            @foreach($images as $img)
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <img class="thumbnail" style="position:relative; object-fit:cover;border-radius:3px" src="{{URL::asset('uploads/'.$img->name)}}" alt="" width="100%" height="100%"/>
                    <a href="{{route('delete.deleteImage', $img->id)}}" class="btn btn-danger far fa-trash-alt" style="position:absolute;right:7.5px;margin:0;border-radius:3px;"></a>
                </div>
            @endforeach
                
            </div>
        </div>
        
    </div>


    <div class="col-md-3">
         <div class="form-group">
            <label for="">Original Price</label>
            <input value="{{$pro->price}}"  class="form-control" name="price" placeholder=" Please Enter Price">
            @error('price')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

         <div class="form-group">
            <label for="">New Price</label>
            <input class="form-control" name="sale_price" value="{{$pro->sale_price}}"  placeholder=" Please Enter Sale Price">
            @error('sale_price')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

         <div class="form-group">
            <label for="">CategoryName</label>
           <select name="category_id" class="form-control">
               <option value="" >--- {{$pro->category_id}}  ---</option>
               @foreach($cats as $cat)
             
               <option   value="{{$cat->id}} " {{$cat->id == $pro->category_id ? 'selected' :'' }} >{{$cat->name}}</option>
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
            <input class="form-control file_upload" value="" type="file"  name="file_upload" style="display:none;">
            <img src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483296.jpg" id="show_img" style="width:100%;cursor:pointer;">

            @error('image')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
         <div class="form-group">
            <label for=""> Old Image</label>
            <input class="form-control" value="{{$pro->image}}" type="text"  name="image" readonly>
            <img src="{{URL::asset('uploads')}}/{{$pro->image}}"  width="50">
            @error('image')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>

        <div class="form-group">
        <label for="">Status</label>
        <div class="radio" value="{{$pro->status}}" >
            <label>
                <input type="radio" name="status" value="1" checked>
                Sold Out
            </label>
            <label>
                <input type="radio" name="status" value="0">
                Stocking
            </label>
        </div>
        @error('status')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
        @enderror
    </div>
    <a href="{{route('product.index')}}" class="btn btn-danger mr-3" style="opacity:65%;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
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
  })
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
