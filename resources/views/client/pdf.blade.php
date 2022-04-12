<!DOCTYPE html>
<html lang="">

    <head>
        <meta charset="utf-8">
        <title>Email Order</title>
        <style>
           body{
               width: 100%;
               font-family:"DejaVu Sans";
           }
            .email-contend{
                width: 650px;
                margin:0 auto;
                text-align: center;
            }
            .email-contend h3{
                text-align: center;
            }
            .email-contend a{
                background-color: #b0b435;
                border-radius:3px;
                padding: 10px ;
                color:#fff;
                cursor: pointer;
            }
            .email-contend table tr th , 
            table tr td{
                border: 1px solid #333;
                padding:10px;
                box-sizing: border-box;
                text-align:center;
            }
            .email-contend table tr th {
                background-color: #b0b435;
                color: white;
            }
            .ord{
                width: 300px;
                margin:0 auto;
            }
            .price{
                color:blue;
            }
            .total_sub{
                color:green;
            }
            .sub_pr{
                text-align:right;
            }
            .detail{
                width: 600px;
                
                margin: 0 auto ;
                text-align: center;
            }
        </style>
    </head>
    <body>
       <div class="email-contend">
            <h2 >Xin Chào : {{$order->cus->name}}</h2>

            <h4>Xem chi tiết đơn hàng của bạn</h4>
        <table class="ord">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <td>#{{$order->id}}</td>
                </tr>
                <tr>
                    <th>Ngày Đặt Hàng</th>
                    <td>{{$order->created_at->format('m-d-y')}}</td>
                </tr>
                <tr>
                    <th>Tổng Tiền</th>
                    <td>{{number_format($order->total_price)}}</td>
                </tr>
                
            </thead>
        </table>

      
       
        <h4>Sản Phẩm Đã Mua Tại FreshShop</h4>
       <table class="detail" >
           <thead>
               <tr>
                   <th>STT</th>
                   <th>TÊN SẢN PHẨM</th>
                   <th>ĐƠN GIÁ</th>
                   <th>SỐ LƯỢNG</th>
                   <th>THÀNH TIỀN</th>
               </tr>
           </thead>
           <tbody>
           @foreach($order->details as $item)
                <tr>
                    <td>{{$item->prod->id}}</td>
                    <td>{{$item->prod->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format($item->price * $item->quantity)}}</td>
                </tr>
            @endforeach
           </tbody>
       </table>
       </div>

       
       

    </body>
</html>

