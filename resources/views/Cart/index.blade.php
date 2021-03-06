@extends('CustomerLayout.layout')

@section('customer')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Home/Shop/Single product/Cart list</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Cart Area =================-->
<section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            @if(count($carts))

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product Photo</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Net</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="float: left">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($carts as $cart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('storage/'.$cart->details->productDetailable->image)}}" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h3>{{$cart->details->productDetailable->title}}</h3>
                                </td>

                                <td>
                                    <h3>{{$cart->quantity}}</h3>
                                </td>
                                <td>
                                    <h3>{{$cart->total}} Taka</h3>
                                </td>
                                <td>
                                    <h3>{{$cart->details->discount}}%</h3>
                                </td>
                                <td>
                                    <h3>{{$cart->net}} Taka</h3>
                                </td>
                                <td>
                                    <h3 class="text-info">{{$cart->status}}</h3>
                                </td>
                                <td>
                                    <a href="{{route('cart.delete', $cart->id)}}"><i class="fa fa-trash " style="font-size:24px; float: left"></i></a>
                                </td>
                            </tr>
                        @endforeach




                        <tr class="shipping_area ">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h5>Free Shipping</h5></td>

                            <td><h3>0.00 Taka</h3></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Total</h5>
                            </td>
                            <td>
                                <h3>{{$total}} Taka</h3>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h5 >Payment Option</h5></td>
                            <td >
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio">Bkash
                                    </label>
                                </div>
                            </td>

                            <td>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" checked>Kash on Dalivary
                                    </label>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{route('index')}}">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="{{route('checkout.index')}}">Proceed to checkout</a>
                    </div>
                </div>


                @else
                    <div class="alert alert-info" role="alert">
                        Your Cart is empty!!!
                    </div>
            @endif
        </div>
    </div>
</section>
@endsection
