@extends('CustomerLayout.layout')

@section('customer')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ml-5">
                <div class="row">
                    <div class="col-12">
                        <h1>Cover Image Control Page</h1>
                    </div>
                </div>

                <div class="jumbotron col-8 ">

                    <form action="{{route('productDetail.update', $productDetail->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <fieldset>
                                <legend>Product Details</legend>
                                <small>This information is only for Product Details</small>

                                <div class="form-group d-flex flex-column">
                                    <label for="image1">Image 1</label>
                                    <input type="file" name="image1" class="py-2">
                                    <small id="image1Help" class="form-text text-muted">630 x 700 image is most accurate as details picture of the feature product!!</small>
                                    <div class="text-danger">{{$errors->first('image1')}}</div>
                                </div>

                                <div class="form-group d-flex flex-column">
                                    <label for="image2">Image 2</label>
                                    <input type="file" name="image2" class="py-2">
                                    <small id="image2Help" class="form-text text-muted">630 x 700 image is most accurate as details picture of the feature product!!</small>
                                    <div class="text-danger">{{$errors->first('image2')}}</div>
                                </div>

                                <div class="form-group d-flex flex-column">
                                    <label for="image3">Image 3</label>
                                    <input type="file" name="image3" class="py-2">
                                    <small id="image3Help" class="form-text text-muted">630 x 700 image is most accurate as details picture of the feature product!!</small>
                                    <div class="text-danger">{{$errors->first('image3')}}</div>
                                </div>

                                <div class="form-group d-flex flex-column">
                                    <label for="category">Category</label>
                                    <input type="text" name="category" value="{{old('category') ?? $productDetail->category}}" placeholder="Cotton/Silk ..." class="form-control">
                                    <small id="categoryHelp" class="form-text text-muted">Category of the product increase the user satisfaction of user!!</small>
                                    <div class="text-danger">{{$errors->first('category')}}</div>
                                </div>

                                <div class="form-group" >
                                    <label>Size</label>
                                    <input type="text" name="size" value="{{old('size') ?? $productDetail->size}}" placeholder="XL/ XXl/ Small/ Large" class="form-control">
                                    <small id="sizeHelp" class="form-text text-muted">Enter the size of product</small>
                                    <div class="text-danger">{{$errors->first('size')}}</div>
                                </div>

                                <div class="form-group" >
                                    <label>Stock </label>
                                    <input type="text" name="stock" value="{{old('stock') ?? $productDetail->stock}}" placeholder="25/30 ..." class="form-control">
                                    <small id="stockHelp" class="form-text text-muted">Enter the number of stock you have current now.</small>
                                    <div class="text-danger">{{$errors->first('stock')}}</div>
                                </div>

                                <div class="form-group" >
                                    <label>Discount</label>
                                    <input type="text" name="discount" value="{{old('discount') ?? $productDetail->discount}}" placeholder="5/10 ..." class="form-control">
                                    <small id="discountHelp" class="form-text text-muted">Offering a smart discount is good both customer and seller!</small>
                                    <div class="text-danger">{{$errors->first('discount')}}</div>
                                </div>

                                <div class="form-group" >
                                    <label>Description</label>
                                    <input type="text" name="description" value="{{old('description') ?? $productDetail->description}}" placeholder="This product is ... ..." class="form-control">
                                    <small id="descriptionHelp" class="form-text text-muted">Give a clear description of this product.</small>
                                    <div class="text-danger">{{$errors->first('description')}}</div>
                                </div>

                                <div class="form-group" >
                                    <label>Facebook</label>
                                    <input type="text" name="fbLink" value="{{old('fbLink') ?? $productDetail->fbLink}}" placeholder="http://facebook.com/featureProduct/5/xl ..." class="form-control">
                                    <small id="fbLinkHelp" class="form-text text-muted">Give the Facebook link of the product</small>
                                    <div class="text-danger">{{$errors->first('fbLink')}}</div>
                                </div>

                                <div class="form-group" >
                                    <label>Instragram</label>
                                    <input type="text" name="instraLink" value="{{old('instraLink') ?? $productDetail->instraLink}}" placeholder="http://instragram.com/featureProduct/5/xl ..." class="form-control">
                                    <small id="instraLinkHelp" class="form-text text-muted">Give the Instragram link of the product</small>
                                    <div class="text-danger">{{$errors->first('instraLink')}}</div>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary"> Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
