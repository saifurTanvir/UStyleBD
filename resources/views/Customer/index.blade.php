@extends('CustomerLayout.layout')

@section('customer')

    <!-- banner part start-->
    @can('create', App\Admin::class)
        <a href="{{route('coverImage.create')}}" class="btn btn-dark">Create New Cover</a>
    @endcan

    @if($coverImage)

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
    @endif
    <!-- banner part end-->

    <!-- feature_part start-->
    <section class="feature_part pt-4 mt-30">
        <div class="container-fluid p-lg-0 overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="arrival_tittle">
                            <h2>Feature Product</h2>
                        </div>
                    </div>

                </div>
            </div>
            @can('create', App\Admin::class)
                <a href="{{route('featureProduct.create')}}" class="btn btn-dark">Create New Feature</a>
            @endcan


            <div class="row align-items-center justify-content-between">
                @foreach($featureProducts as $featureProduct)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{asset('storage/'.$featureProduct->image)}}" alt="#">
                        <div class="hover_text">
                            <a href="{{route('productDetail.index', $featureProduct->id)}}" class="btn_2">{{$featureProduct->title}}</a>
                        </div>
                    </div>

                    @can('create', App\Admin::class)
                        <a href="{{route('featureProduct.edit', $featureProduct->id)}}" class="btn btn-primary">Edit </a>
                        <a href="{{route('featureProduct.delete', $featureProduct->id)}}" class="float-right btn btn-primary ">Delete</a>
                    @endcan

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

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @can('create', App\Admin::class)
                    <a href="{{route('newArrival.create')}}" class="btn btn-dark">Create New Arrival</a>
                @endcan

                <div class="col-lg-12">
                    <div class="new_arrival_iner filter-container">



                            @foreach($newArrivals as $newArrival)
                                <div class="single_arrivel_item weidth_3 mix " >
                                    <img src="{{asset('storage/'.$newArrival->image)}}" alt="#">
                                    <div class="hover_text">
                                        <p>Canvas</p>
                                        <a href="{{route('productDetail.index.newArrival', $newArrival->id)}}"><h3>{{$newArrival->title}}</h3></a>

                                        <h5>$150</h5>




                                        <div class="social_icon">
                                            @can('create', App\Admin::class)
                                                <a href="{{route('newArrival.edit', $newArrival->id)}}" class="float-left" >Edit</a>
                                                <a href="{{route('newArrival.delete', $newArrival->id)}}" class="float-right">Delete</a>
                                            @endcan

                                        </div>
                                    </div>
                                </div>

                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new arrival part end -->

@endsection
