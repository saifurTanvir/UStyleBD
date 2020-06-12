@extends('CustomerLayout.layout')

@section('customer')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Cover Image Control Page</h1>
                    </div>
                </div>

                <div class="jumbotron col-8 ">

                    <form action="{{route('featureProduct.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label>Title</label>
                        <div class="form-group" >
                            <input type="text" name="title" value="{{old('title')}}" placeholder="Enter a cool title" class="form-control">
                            <small id="titleHelp" class="form-text text-muted">A cool title increase customer interaction greatly!</small>
                            <div class="text-danger">{{$errors->first('title')}}</div>
                        </div>

                        <div class="form-group d-flex flex-column">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="py-2">
                            <small id="imageHelp" class="form-text text-muted">1920 x 850 image is most accurate for feature product!!</small>
                            <div class="text-danger">{{$errors->first('image')}}</div>
                        </div>
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
