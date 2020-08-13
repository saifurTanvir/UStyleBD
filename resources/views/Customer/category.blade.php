@extends('CustomerLayout.layout')

@section('customer')

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home / Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="mt-5 ">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu product_bar_item">
                                    <h2>Womans (12)</h2>
                                </div>
                            </div>
                        </div>


                        @foreach($productsDetail as $productDetail)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_category_product">
                                <div class="single_category_img">
                                    <a href="{{route('index.category', $productDetail->id)}}"><img src="{{asset('storage/'.$productDetail->productDetailable->image)}}" height='400' weidth='500' alt=""></a>

                                    <div class="category_product_text">
                                        <a href="single-product.html"><h5>{{$productDetail->productDetailable->title}}</h5></a>
                                        <p style=" text-decoration: line-through; color: dodgerblue">{{$productDetail->productDetailable->price}} Taka</p>
                                        <p>{{(int)($productDetail->productDetailable->price - ($productDetail->productDetailable->price*(1/$productDetail->discount)))}} Taka</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

@endsection
