@extends('layouts.admin')
@section('title',' Blog Management')
@section('main')

 <div class="container">
     <form class="form-inline"  action="" method="GET" role="form"> 
         <div class="form-group">
             <label for=""></label>
             <input type="text" name="keyword" id="" class="form-control" placeholder=" Enter Keyword" aria-describedby="helpId">
             <button type="submit" class="btn btn-success ml-1"> <i class="fa fa-search" aria-hidden="true"></i></button>
             <td><a href="{{route('blog.create')}}" class="btn btn-primary ml-2"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
         </div>

     </form>
<div class="panel panel-primary text-center mt-3">
       <table class="table table-hover table-bordered text-center " >
           <thead>
           
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Image</th>
                   <th>Summary</th>
                   <th>Description</th>
                   <th>Status</th>
                   <th>Created_at</th>
                   <th>Updated_at</th>
                   <th colspan="2">Action</th>
                   
               </tr>
             
           </thead>
           <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>#{{$blog->id}}</td>
                <td>{{$blog->name}}</td>
                <td><img src="{{URL::asset('uploads')}}/{{$blog->image}}"  width="100" height="100px" style="object-fit: cover"></td>
                <td>{{$blog->summary}}</td>
                <td>{{$blog->description}}</td>
                <td>
                    @if($blog->status == 0)
                        <span class="badge badge-primary">Public</span>
                    @else
                        <span class="badge badge-danger">Private</span>
                    @endif
                </td>
                <td>{{$blog->created_at->format('m-d-Y')}}</td>
                <td>{{$blog->updated_at->format('m-d-Y')}}</td>
               
                <td><a href="{{route('blog.edit',$blog->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                <td><form action="{{route('blog.delete',$blog->id)}}" method="POST">
                    @method('DELETE') @csrf 
                    <button class="btn  btn-danger btn-sm" onclick = "return confirm('Are you sure you want to delete this Category ?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                </td>
              
            </tr>
            @endforeach

           </tbody>
       </table>
    </div>  
    {{$blogs -> links()}}
</div>



@stop() 


