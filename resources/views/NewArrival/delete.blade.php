@extends('CustomerLayout.layout')

@section('customer')
    <div class="col-4"></div>


    <div class="jumbotron col-4 ml-lg-5">
        <b class="text-danger">After delete It can't be restore!!!</b><br>
        <div class="d-flex">
            <a href="{{route('index')}}" class="btn btn-primary">Back</a>
            <form method="post" action="{{route('newArrival.destroy', $product->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right">Delete</button>
            </form>
        </div>

    </div>
@endsection
