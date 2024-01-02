<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="frontend/images/favicon.png" type="">
    <title>Ecommerce Pro</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="frontend/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="frontend/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="frontend/css/responsive.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="">
        <!-- header section strats -->
           @include('user.header')
      
     </div>
    <section class="product_section layout_padding ">
        <div class="container">

            <div class="" style="margin: auto;width:35%;">
                <div class="heading_container heading_center">
                    <h4>
                       <b>Product Detailes of : {{ $product->category }}</b> 
                    </h4>
                </div>
                <div class="">
                    <img src="productimage/{{ $product->image }}" alt="avatar" style="width: 400px;height:410px;">
                </div>
                <br>
                <div class="">
                    <h5 style="font-size:15px;">
                       <b>Product Title :</b>{{ $product->title }} 
                    </h5>
                    @if ($product->discount_price == null)
                        <h6 style="color: blue">
                            <b>Product Price</b>
                            {{ $product->price }}$
                        </h6>
                    @else
                        <h6 style="color: red">
                            <b>Discount Price</b>
                            {{ $product->discount_price }}$
                        </h6>
                        <h6 style="text-decoration: line-through;color:blue;">
                            <b>Product Price</b>
                            {{ $product->price }}$
                        </h6>
                    @endif
                        <h4 class="mt-2"><b>Product Details : </b>{{$product->description}}</h4>
                        <h6 class="mt-2"><b>Product Quantity:{{$product->quantity}}</b></h6>
                        <form action="{{ url('/add_cart', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" >
                                <div class="col-md-4" >
                                    <input type="number" name="quantity" style="height: 40px;padding:10px; width:100px;" class=" "
                                    value="1" min="1">
                                </div>
                                <div class="col-md-8 ">
                                    <input type="submit" class="btn btn-primary" value="Add Cart" style="margin-right: 100px; color:black" >
                                  
                                </div>
                            </div>

                        </form>
                       

                </div>
            </div>

            @include('user.footer')
        </div>



    </section>



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
