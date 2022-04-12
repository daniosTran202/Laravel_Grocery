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
                background-color: #33cc4a;
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
                background-color: #3b73f5;
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque iste rem nam harum incidunt vitae minima. Numquam nostrum, enim error. Blanditiis nemo quasi nisi cumque exercitationem? Reprehenderit.</p>
            <p>Mật khẩu mới của bạn là {{$password}}, để xác nhận mật khẩu , <bold>vui lòng click vào nút bên dưới để đăng nhập </bold> 💌  </p>
            <a href="{{route('customer.login')}}">Click here</a>
       </div>

       
       

    </body>
</html>

