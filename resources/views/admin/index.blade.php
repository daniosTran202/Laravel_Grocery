@extends('layouts.admin')

@section('title','Adminstrator Management')
@section('main')


<div class="ad">
    <div class="container">
        <h1>Hello, {{Auth::user()->email}}!</h1>
        <p>Welcome To Management Page</p>
        <p>
            <a class="btn btn-primary btn-lg">Learn more</a>
        </p>
    </div>
</div>

@stop()