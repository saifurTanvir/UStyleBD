<?php

namespace App\Http\Controllers;

use App\FeatureProductMaster;
use App\NewArrival;
use App\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index(FeatureProductMaster $product){
        $detail = $product->details()->first();
        return view('ProductDetail.index', compact('product', 'detail'));
    }

    public function indexForNewArrival(NewArrival $product){
        $detail = $product->details()->first();
        return view('ProductDetail.index', compact('product', 'detail'));
    }

    public function edit(ProductDetail $productDetail){
        //dd($product);
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

        return redirect()->route('index');
    }
}
