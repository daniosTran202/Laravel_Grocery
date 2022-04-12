@extends('layouts.admin')

@section('title','Category Trashed')
@section('main')


<div class="container">
<form class="form-inline"  action="" method="GET" role="form"> 
         <div class="form-group">
             <label for=""></label>
             <input type="text" name="keyword" id="" class="form-control" placeholder=" Enter Keyword" aria-describedby="helpId">
             <button type="submit" class="btn btn-success ml-1"> <i class="fa fa-search" aria-hidden="true"></i></button>
             <td><a href="category/create" class="btn btn-primary ml-2"><i class="fa fa-plus" aria-hidden="true"> </i> ADD</a></td>
         </div>

</form>
<div class="panel panel-primary text-center mt-5">
       <table class="table table-hover table-bordered text-center">
           <thead>
           
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Status</th>
                   <th>Product_Total</th>
                   <th>Created_At</th>
                   <th>Updated_At</th>
                   <th colspan="2">Action</th>
                   
               </tr>
             
           </thead>
           <tbody>
            @foreach($cats as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>
                    @if($cat->status == 0)
                        <span class="badge badge-danger">Private</span>
                    @else
                        <span class="badge badge-success">Public</span>
                    @endif
                </td>
                <td>{{$cat->prods->count()}}</td>
                <td>{{$cat->created_at->format('m-d-Y')}}</td>
                <td>{{$cat->updated_at->format('m-d-Y')}}</td>
                <td><a href="{{route('category.restore', $cat->id)}}" class="btn btn-success"><i class="fa fa-trash-restore" aria-hidden="true"></i></a></td>
                <td>
                    <a class="btn  btn-danger" href="{{route('category.forcedelete', $cat->id)}}" onclick = "return confirm('Are you sure you want to delete permanent this Category ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              
            </tr>
            @endforeach

           </tbody>
       </table>
    </div>  
    {{$cats -> links()}}
</div>





@stop()
