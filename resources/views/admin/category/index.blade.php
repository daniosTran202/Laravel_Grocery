@extends('layouts.admin')

@section('title','Categories Management')
@section('main')


<div class="container">
<form class="form-inline"  action="" method="GET" role="form"> 
         <div class="form-group">
             <label for=""></label>
             <input type="text" name="keyword" id="" class="form-control" placeholder=" Enter Keyword" aria-describedby="helpId">
             <button type="submit" class="btn btn-success ml-1"> <i class="fa fa-search" aria-hidden="true"></i></button>
             <td><a href="category/create" class="btn btn-primary ml-2"><i class="fa fa-plus" aria-hidden="true"> </i></a></td>
         </div>

</form>
<div class="panel panel-primary text-center mt-3">
       <table class="table table-hover table-bordered text-center">
           <thead>
           
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Status</th>
                   <th>Product_Total</th>
                   <th>Created_At</th>
                   <th>Updated_At</th>
                   <th colspan="3">Action</th>
                   
               </tr>
             
           </thead>
           <tbody>
            @foreach($cats as $cat)
            <tr>
                <td>#{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>
                    @if($cat->status == 0)
                        <span class="badge badge-danger">Hidden</span>
                    @else
                        <span class="badge badge-success">Publish</span>
                    @endif
                </td>
                <td>{{$cat->prods->count()}}</td>
                <td>{{$cat->created_at->format('m-d-Y')}}</td>
                <td>{{$cat->updated_at->format('m-d-Y')}}</td>
                <td><a href="{{route('category.edit',$cat->id)}}" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                <td>
                @if($cat->prods->count() == 0)
                <form action="{{route('category.delete',$cat->id)}}" method="POST" >
                    @method('DELETE') @csrf 
                    <button class="btn  btn-danger" onclick = "return confirm('Are you sure you want to delete this Category ?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                @else
                    <a href="javascript::void(0)" onclick="alert('This category haved product , 😓 It can not delete !')" class="btn btn-danger"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
                @endif
                </td>
              
            </tr>
            @endforeach

           </tbody>
       </table>
    </div>  
    {{$cats -> links()}}
</div>





@stop()
