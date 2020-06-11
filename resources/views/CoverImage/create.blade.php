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

                <div class="jumbotron">

                    <form action="{{route('coverImage.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex flex-column">
                            <label for="coverImage">Cover Image</label>
                            <input type="file" name="coverImage" class="py-2">
                            <div class="text-danger">{{$errors->first('coverImage')}}</div>
                        </div>
                        <button type="submit" class="btn btn-primary"> Add Cover Image</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
