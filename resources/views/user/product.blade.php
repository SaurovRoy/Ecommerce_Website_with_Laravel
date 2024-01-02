<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('/productDetails', $products->id) }}" class="option1 mb-3">
                                    Products Details
                                </a>
                                <form action="{{ url('/add_cart', $products->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4" style="border:radus:50%;">
                                            <input type="number" name="quantity" style="height: 40px;margin-left:35px;padding:10px" class="mt-2 option2"
                                            value="1" min="1">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="submit" class="option2" value="Add Cart">
                                          
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="frontend/images/p1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $products->title }}
                            </h5>
                            @if ($products->discount_price == null)
                                <h6 style="color: blue">
                                    <b>Price</b>
                                    {{ $products->price }}$
                                </h6>
                            @else
                                <h6 style="color: red">
                                    Discount Price
                                    {{ $products->discount_price }}$
                                </h6>
                                <h6 style="text-decoration: line-through;color:blue;">
                                    Price
                                    {{ $products->price }}$
                                </h6>
                            @endif


                        </div>
                    </div>
                </div>
            @endforeach
            <span>
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>

        </div>



</section>
