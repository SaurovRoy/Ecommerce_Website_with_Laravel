<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Ecommerce Pro</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="frontend/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="frontend/css/style.css" rel="stylesheet" />
      
    <style>
        .center{
            margin: auto;
            text-align: center;
            width: 90%;
           border: 2px solid white;
           margin-top: 10px;
           
        }   
        .th_color{
            width: 100%;
            background-color: skyblue;
        }
        .th_pad{
            padding: 12px;
        }
        .button_dis{
            padding-right: 19px;
            padding-left: 17px;
            margin-top: 10px;
        }
        .total_price{
            margin: auto;
            color: red;
            
            text-align: center;
            justify-content: center;
        }
        .order{
            margin:auto;
            
            text-align:center;
            justify-content: center; 
        }
 
    </style>
      <!-- responsive style -->
      <link href="frontend/css/responsive.css" rel="stylesheet" />

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('user.header')
         <!-- end header section -->
         <!-- slider section -->
         <div class="container mt-4">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" data-dismiss="alert" class="close" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
                <div class="" >
                    <h1 style="text-align: center; font-size:30px">Product Table Information</h1>
                </div>
                
                    <table class=" center " >
                        <tr class="th_color">
                            <th class="th_pad">Id</th>
                            <th class="th_pad">Product Title</th>
                            
                            <th class="th_pad">Quantity</th>
                            <th class="th_pad">Price</th>
                           
                            <th class="th_pad">product Image</th>
                            <th class="th_pad" style="width: 60px; padding-right:10px;">Action</th>
                        </tr>
                        <?php $totalprice=0; ?> 
                        @foreach ($cart as $cart )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cart->product_title}}</td>
                           
                            <td>{{$cart->quantity}}</td>
                            <td>{{$cart->price}}</td>
                            
                            <td>
                                <img src="productimage/{{$cart->image}}" alt="" style="width: 100px;height:100px;margin:auto; margin-top:5px">
                            </td>
                            <td>
                                <a href="{{url('/delete_cart',$cart->id)}}" 
                                    type="button" class="btn btn-danger" onclick="confirm('Are you sure to delete it?')">Delete</a>
                                {{-- <a href="{{url('/editViewProduct',$data->id)}}" type="button" class="btn btn-success button_dis" >Edit</a> --}}
                            </td>
{{--                           
                             <?php $totalprice=$totalprice + $cart->price ?> 
                        @endforeach

                    </table>
                    <div class="total_price">
                        <h3>Total Price Is : ${{$totalprice}}</h3>
                    </div>
                    <div class="order">
                        <h2 class="mb-2" style="font-size: 30px;">Procceed To Order</h2>
                        <a href="{{url('/cash_order')}}" class="btn btn-danger " style="color:black" type="submit">
                        Cash On Delivary</a>
                        <a href="{{url('/stripe',$totalprice)}}" class="btn btn-danger " style="color: black" type="submit">
                        Pay Using Cards</a>
                    </div>
                </div>
           
         <!-- end slider section -->
      </div>
      <!-- why section -->
     

      @include('user.footer')
      <!-- footer end -->
    
      <!-- jQery -->
      <script src="frontend/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="frontend/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="frontend/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="frontend/js/custom.js"></script>
   </body>
</html>