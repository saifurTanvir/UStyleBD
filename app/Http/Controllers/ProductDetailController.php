<?php

namespace App\Http\Controllers;

use App\FeatureProductMaster;
use App\NewArrival;
use App\ProductDetail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductDetailController extends Controller
{
    public function indexForCategory(ProductDetail $detail){
        $product = $detail->productDetailable()->first();
        return view('ProductDetail.index', compact('product', 'detail'));
    }

    public function index(FeatureProductMaster $product){
        $detail = $product->productDetail()->first();
        return view('ProductDetail.index', compact('product', 'detail'));
    }

    public function indexForNewArrival(NewArrival $product){
        $detail = $product->productDetail()->first();
        return view('ProductDetail.index', compact('product', 'detail'));
    }

    public function edit(ProductDetail $productDetail){
        return view('ProductDetail.edit', compact('productDetail'));
    }



    public function update(ProductDetail $productDetail){
        $data = request()->validate([
            'image1' => 'required|file|image',
            'image2' => 'required|file|image',
            'image3' => 'required|file|image',
            'category' =>'required',
            'size' => 'required',
            'stock' => 'required|numeric',
            'discount' => 'required|numeric',
            'description' => 'required',
            'fbLink' => 'required',
            'instraLink' => 'required'
        ]);


        $productDetail->update([
            'image1' =>  request()->image1->store('ProductDetails', 'public'),
            'image2' =>  request()->image2->store('ProductDetails', 'public'),
            'image3' =>  request()->image3->store('ProductDetails', 'public'),
            'category' => $data['category'],
            'size' => $data['size'],
            'stock' => $data['stock'],
            'discount' => $data['discount'],
            'description' => $data['description'],
            'fbLink' => $data['fbLink'],
            'instraLink' => $data['instraLink'],
        ]);



        $image1 = Image::make(public_path('storage/'.$productDetail->image1))->fit(460, 560);
        $image1->save();
        $image2 = Image::make(public_path('storage/'.$productDetail->image2))->fit(460, 560);
        $image2->save();
        $image3 = Image::make(public_path('storage/'.$productDetail->image3))->fit(460, 560);
        $image3->save();

        return redirect()->route('index');
    }
}
