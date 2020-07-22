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
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            {{$cart->status}}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.order.edit', ['orderId' => $cart->id, 'status' => 'onCart'])}}">onCart</a>
                                            <a class="dropdown-item" href="{{route('admin.order.edit', ['orderId' => $cart->id, 'status' => 'ordered'])}}">ordered</a>
                                            <a class="dropdown-item" href="{{route('admin.order.edit', ['orderId' => $cart->id, 'status' => 'onShip'])}}">onShip</a>
                                            <a class="dropdown-item" href="{{route('admin.order.edit', ['orderId' => $cart->id, 'status' => 'complete'])}}">complete</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            @else
                <div class="alert alert-info" role="alert">
                    Your Order is empty!!!
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
