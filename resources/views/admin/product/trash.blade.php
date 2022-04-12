@extends('layouts.admin')

@section('title',' List Product Management')
@section('main')

 <div class="container">
     <form class="form-inline"  action="" method="GET" role="form"> 
         <div class="form-group">
             <label for=""></label>
             <input type="text" name="keyword" id="" class="form-control" placeholder=" Enter Keyword" aria-describedby="helpId">
             <button type="submit" class="btn btn-success ml-1"> <i class="fa fa-search" aria-hidden="true"></i></button>
             <td><a href="product/create" class="btn btn-primary ml-2"><i class="fa fa-plus" aria-hidden="true"> </i> ADD</a></td>
         </div>

     </form>
<div class="panel panel-primary text-center mt-3">
       <table class="table table-hover table-bordered text-center" >
           <thead>
           
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Image</th>
                   <th>Price/SalePrice</th>
                   <th>Cat_id</th>
                   <th>Description</th>
                   <th>Status</th>
                   <th>Created_at</th>
                   <th colspan="2">Action</th>
                   
               </tr>
             
           </thead>
           <tbody>
            @foreach($pros as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>  <img src="{{url('public/uploads')}}/{{$pro->image}}"  width="80"></td>
                <td>{{$pro->price}} / <span class="badge badge-success"> {{$pro->sale_price}}</span></td>
                <td>{{$pro->category_id}}</td>
                <td>{!!$pro->description!!}</td>
                <td>
                    @if($pro->status == 0)
                        <span class="badge badge-success">Stocking</span>
                    @else
                        <span class="badge badge-danger">Sold Out</span>
                    @endif
                </td>
                <td>{{$pro->created_at->format('m-d-Y')}}</td>
               
                <td><a href="{{route('product.restore', $pro->id)}}" class="btn btn-success"><i class="fa fa-trash-restore" aria-hidden="true"></i></a></td>
                <td>
                    <a class="btn  btn-danger" href="{{route('product.forcedelete', $pro->id)}}" onclick = "return confirm('Are you sure you want to delete permanent this Product ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              
            </tr>
            @endforeach

           </tbody>
       </table>
    </div>  
    {{$pros -> links()}}
</div>



@stop() 


