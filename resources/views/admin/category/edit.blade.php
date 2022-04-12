@extends('layouts.admin') <!-- Kế thừa master.blade.php -->
@section('title','Category Update')
@section('main')
<h2>Category Edit: {{$cat->name}}</h2>
<form action="{{route('category.update',$cat->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$cat->id}}">

    <div class="form-group">
        <label for="">Category Name</label>
        <input class="form-control" name="name" value="{{$cat->name}}">
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
                <input type="radio" name="status" value="1" {{$cat->status == 1 ? 'checked' : ''}}>
                Public
            </label>
            <label>
                <input type="radio" name="status" value="0" {{$cat->status == 0 ? 'checked' : ''}}>
                Private
            </label>
        </div>
    </div>
    <a href="{{route('category.index')}}" class="btn btn-danger mr-3" style="opacity:65%;"><i
                                            class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save" aria-hidden="true"></i> Updated</button>
</form>
@stop()
