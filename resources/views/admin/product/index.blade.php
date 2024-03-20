@extends('layouts.admin')
@section('title',' Product Management')
@section('main')

 <div class="container">
     <form class="form-inline"  action="" method="GET" role="form"> 
         <div class="form-group">
             <label for=""></label>
             <input type="text" name="keyword" id="" class="form-control" placeholder=" Enter Keyword" aria-describedby="helpId">
             <button type="submit" class="btn btn-success ml-1"> <i class="fa fa-search" aria-hidden="true"></i></button>
             <td><a href="product/create" class="btn btn-primary ml-2"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
         </div>

     </form>
<div class="panel panel-primary text-center mt-3">
       <table class="table table-hover table-bordered text-center " >
           <thead>
           
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Image</th>
                   <th>Original Price</th>
                   <th>New Price</th>
                   <th>Category</th>
                   <th>Status</th>
                   <th>Created_at</th>
                   <th>Updated_at</th>
                   <th colspan="2">Action</th>
                   
               </tr>
             
           </thead>
           <tbody>
            @foreach($pros as $pro)
            <tr>
                <td>#{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>  <img src="{{URL::asset('uploads')}}/{{$pro->image}}"  width="100" height="100px" style="object-fit: cover"></td>
                <td><span class="badge badge-danger">${{ number_format($pro->price, 2) }} </span></td>
                <td><span class="badge badge-primary">${{ number_format($pro->sale_price, 2) }} </span></td>
                <td>
                @foreach($cats as $cat)
                    <span class="badge badge-success"> {{$cat->id == $pro->category_id ? $cat->name :'' }}</span>
                @endforeach
                </td>

                <td>
                    @if($pro->status == 0)
                        <span class="badge badge-primary">Stocking</span>
                    @else
                        <span class="badge badge-danger">Sold Out</span>
                    @endif
                </td>
                <td>{{$pro->created_at->format('m-d-Y')}}</td>
                <td>{{$pro->updated_at->format('m-d-Y')}}</td>
               
                <td><a href="{{route('product.edit',$pro->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                <td><form action="{{route('product.delete',$pro->id)}}" method="POST">
                    @method('DELETE') @csrf 
                    <button class="btn  btn-danger btn-sm" onclick = "return confirm('Are you sure you want to delete this Category ?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                </td>
              
            </tr>
            @endforeach

           </tbody>
       </table>
    </div>  
    {{$pros -> links()}}
</div>



@stop() 


