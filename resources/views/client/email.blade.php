<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <title>Email Order</title>
        <style>
           
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
            table tr th , 
            table tr td{
                border: 1px solid #333;
                padding:10px;
                box-sizing: border-box;
                text-align:center;
            }
            table tr th,total_price {
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
                width: 750px;
                margin-top: 20px ;
                text-align: center;
            }
        </style>
    </head>
    <body>
       <div class="email-contend">
            <h2 >Xin Chào : {{$auth->name}}</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque iste rem nam harum incidunt vitae minima. Numquam nostrum, enim error. Blanditiis nemo quasi nisi cumque exercitationem? Reprehenderit.</p>
            <p>Bạn đã đặt hàng tại FreshShop thành công, để xác nhận đơn hàng , <bold>vui lòng click vào nút bên dưới </bold> 💌  </p>
            <a href="{{route('order.confirm', $order->token)}}" >Click here</a>

            <h4>Xem chi tiết đơn hàng của bạn</h4>
        <table class="ord">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <td>#{{$order->id}}</td>
                </tr>
                <tr>
                    <th>Ngày Đặt Hàng</th>
                    <td>{{$order->created_at->format('d-m-y')}}</td>
                </tr>
                <tr>
                    <th>Tổng Số Lượng</th>
                    <td>{{$cart->totalItem}}</td>
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
           <?php $key = 1; ?> 
           @foreach($order->details as $ord)
               <tr>
                   <td>{{$key}}</td>
                   <td>{{$ord->prod->name}}</td>
                   <td class="price">{{number_format($ord->price)}} đ</td>
                   <td>{{$ord->quantity}}</td>
                   <td class="total_sub">{{number_format($ord->quantity * $ord->price)}}</td>
               </tr>
            <?php $key++; ?>
            @endforeach
                <tr class="total_price">
                    <th colspan="4" class="sub_pr">TỔNG TIỀN</th>
                    <th colspan="1" class>{{number_format($cart->totalPrice)}}</th>
                </tr>
           </tbody>
       </table>
       </div>

       
       

    </body>
</html>

