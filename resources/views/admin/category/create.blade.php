@extends('layouts.admin')
<!-- Kế thừa master.blade.php -->
@section('title','Category Create')
@section('main')

<div class="panel panel-default col-md-7 " style="margin-left:20%" >
    <div class="panel-body">
<form action="{{route('category.store')}}" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label for="">Category Name</label>
        <input class="form-control" name="name" placeholder=" Please Enter Category Name">
        @error('name')
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
                <input type="radio" name="status" value="1" >
                Public
            </label>
            <label>
                <input type="radio" name="status" value="0">
                Private
            </label>
            @error('status')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
        @enderror
        </div>
    </div>
    <a href="{{route('category.index')}}" class="btn btn-danger mr-3" style="opacity:65%;"><i
                                            class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"> Saved</i></button>
</form>
    </div>
</div>


@stop()