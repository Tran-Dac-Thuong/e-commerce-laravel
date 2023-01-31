<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Order Detail</title>
    <style>
        .text{
            text-align: center;
            margin-bottom: 30px;
        }
        .tb-detail{
            text-align: center;
          
        }
        .thanks{
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="text">Order Detail</h1>
   <div>
    <table border="1" class="tb-detail">
        <thead>
            <tr>
                <th>Customer name</th>
                <th>Customer email</th>
                <th>Customer id</th>
                <th>Product name</th>
                <th>Product price</th>
                <th>Product quantity</th>
                <th>Payment Status</th>
                <th>Product ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->product_id}}</td>
               
            </tr>
        </tbody>
    </table>
   </div>
   <p class="thanks">Thank you for purchasing from us</p>
</body>
</html>