@extends('CustomerLayout.layout')

@section('customer')

    <!-- banner part start-->
    <a href="{{route('coverImage.create')}}" class="btn btn-dark">Create New Cover</a>
    <section class="banner_part" style="background-image: url('{{asset('storage/'.$coverImage->image)}}')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_slider">
                        <div class="single_banner_slider">
                            <div class="banner_text">
                                <div class="banner_text_iner">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part end-->

    <!-- feature_part start-->
    <section class="feature_part pt-4">
        <div class="container-fluid p-lg-0 overflow-hidden">
            <a href="{{route('featureProduct.create')}}" class="btn btn-dark">Create New Feature</a>


            <div class="row align-items-center justify-content-between">
                @foreach($featureProducts as $featureProduct)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{asset('storage/'.$featureProduct->image)}}" alt="#">
                        <div class="hover_text">
                            <a href="{{route('productDetail.index', $featureProduct->id)}}" class="btn_2">{{$featureProduct->title}}</a>
                        </div>
                    </div>
                    <a href="{{route('featureProduct.edit', $featureProduct->id)}}" class="btn btn-primary">Edit </a>
                    <a href="{{route('featureProduct.delete', $featureProduct->id)}}" class="float-right btn btn-primary mr-5">Delete</a>
                </div>
                @endforeach
            </div>


        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- new arrival part here -->
    <section class="new_arrival section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>new arrival</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="arrival_filter_item filters">
                        <ul>
                            <li class="active controls" data-filter="*">all</li>
                            <li class="controls" data-toggle=".men">men</li>
                            <li class="controls" data-toggle=".women">women</li>
                            <li class="controls" data-toggle=".shoes">shoes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <a href="#" class="btn btn-dark">Create New Arrival</a>
                <div class="col-lg-12">
                    <div class="new_arrival_iner filter-container">

                        <div class="single_arrivel_item weidth_1 mix shoes">

                            <img src="img/arrivel/arrivel_5.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>

                                <h5>$150</h5>


                                <div class="social_icon">
                                    <a href="#" class="float-left" >Edit</a>
                                    <a href="#" class="float-right">Delete</a>
                                </div>
                            </div>


                        </div>


                        <div class="single_arrivel_item weidth_2 mix women">
                            <img src="img/arrivel/arrivel_2.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>

                                <h5>$150</h5>


                                <div class="social_icon">
                                    <a href="#" class="float-left" >Edit</a>
                                    <a href="#" class="float-right">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_3 mix shoes women" >
                            <img src="img/arrivel/arrivel_3.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>

                                <h5>$150</h5>


                                <div class="social_icon">
                                    <a href="#" class="float-left" >Edit</a>
                                    <a href="#" class="float-right">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_3 mix women men">
                            <img src="img/arrivel/arrivel_4.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>

                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_2 mix men ">
                            <img src="img/arrivel/arrivel_1.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>

                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_1 mix  men">
                            <img src="img/arrivel/arrivel_6.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>

                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new arrival part end -->

@endsection
