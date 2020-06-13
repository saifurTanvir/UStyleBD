@extends('CustomerLayout.layout')

@section('customer')



    <!--================Single Product Area =================-->
    <div class="product_image_area section_padding">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-5">
                    <div class="product_slider_img">
                        <div id="vertical">
                            <div data-thumb="{{asset('storage/'.$product->image)}}">
                                <img src="{{asset('storage/'.$product->image)}}" />
                            </div>
                            <div data-thumb="{{asset('storage/'.$detail->image1)}}">
                                <img src="{{asset('storage/'.$detail->image1)}}" />
                            </div>
                            <div data-thumb="{{asset('storage/'.$detail->image2)}}">
                                <img src="{{asset('storage/'.$detail->image2)}}" />
                            </div>
                            <div data-thumb="{{asset('storage/'.$detail->image3)}}">
                                <img src="{{asset('storage/'.$detail->image3)}}" />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>Faded SkyBlu Denim Jeans</h3>
                        <h2>$149.99</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Category</span> : Household</a>
                            </li>
                            <li>
                                <a href="#"> <span>Availibility</span> : In Stock</a>
                            </li>
                        </ul>
                        <p>
                            Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time.
                        </p>
                        <div class="card_area">
                            <div class="product_count d-inline-block">
                                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                <input class="input-number" type="text" value="1" min="0" max="10">
                                <span class="number-increment"> <i class="ti-plus"></i></span>
                            </div>
                            <div class="add_to_cart">
                                <a href="#" class="btn_3">add to cart</a>
                                <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                            </div>
                            <div class="social_icon">
                                <a href="#" class="fb"><i class="ti-facebook"></i></a>
                                <a href="#" class="tw"><i class="ti-twitter-alt"></i></a>
                                <a href="#" class="li"><i class="ti-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->




@endsection
