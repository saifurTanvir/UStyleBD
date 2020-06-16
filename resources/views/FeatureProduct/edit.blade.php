@extends('CustomerLayout.layout')

@section('customer')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Feature Product Edit Page</h1>
                    </div>
                </div>

                <div class="jumbotron col-8 ">

                    <form action="{{route('featureProduct.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <label>Title</label>
                        <div class="form-group" >
                            <input type="text" name="title" value="{{old('title') ?? $product->title}}" placeholder="Enter a cool title" class="form-control">
                            <small id="titleHelp" class="form-text text-muted">A cool title increase customer interaction greatly!</small>
                            <div class="text-danger">{{$errors->first('title')}}</div>
                        </div>

                        <div class="form-group d-flex flex-column">
                            <label for="image">Image</label>
                            <input type="file" name="image" value="{{asset('storage/'.$product->image)}}" class="py-2">
                            <small id="imageHelp" class="form-text text-muted">630 x 700 image is most accurate for feature product!!</small>
                            <div class="text-danger">{{$errors->first('image')}}</div>
                        </div>
                        <button type="submit" class="btn btn-primary"> Update</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
