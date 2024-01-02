<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <div style="text-align: center">
    <h1> Order Informations</h1>
     Name :<h3>{{$order->name}}</h3>
     Email :<h3>{{$order->email}}</h3>
     Address :<h3>{{$order->adress}}</h3>
     User Id :<h3>{{$order->user_id}}</h3>
     Product Title :<h3>{{$order->product_title}}</h3>
     Quantity :<h3>{{$order->quantity}}</h3>
     Price :<h3>{{$order->price}}</h3>
     Payment Status :<h3>{{$order->payment_status}}</h3>
     Delivary Status :<h3>{{$order->delivary_staus}}</h3>
     
     <img src="productimage/{{$order->image}}" alt="Avatar" height="390px" width="350px">

   </div>
</body>
</html>