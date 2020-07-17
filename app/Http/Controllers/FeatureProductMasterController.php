<?php

namespace App\Http\Controllers;

use App\CoverImage;
use App\FeatureProductMaster;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FeatureProductMasterController extends Controller
{
    public function create(){
        return view('FeatureProduct.create');
    }

    public function store(){
        $data = request()->validate([
           'title' => 'required|max:20',
            'image1' => 'required|file|image',
            'image2' => 'required|file|image',
            'image3' => 'required|file|image',
            'price' => 'required|numeric',
            'category' =>'required',
            'size' => 'required',
            'stock' => 'required|numeric',
            'discount' => 'required|numeric',
            'description' => 'required',
            'fbLink' => 'required',
            'instraLink' => 'required'
        ]);

        $featureProduct = FeatureProductMaster::create([
            'title' => $data['title'],
            'image' => request()->image->store('FeatureProduct', 'public'),
            'price' => $data['price'],
        ]);

        $featureProduct->productDetail()->create([
           'image1' =>  request()->image1->store('ProductDetails', 'public'),
            'image2' =>  request()->image2->store('ProductDetails', 'public'),
            'image3' =>  request()->image3->store('ProductDetails', 'public'),
            'category' => $data['category'],
            'size' => $data['size'],
            'stock' => $data['stock'],
            'discount' => $data['discount'],
            'description' => $data['description'],
            'fbLink' => $data['fbLink'],
            'instraLink' => $data['instraLink']
        ]);

        $product = FeatureProductMaster::orderBy('id', 'desc')->first();
        $detail = $product->productDetail()->first();

        $image = Image::make(public_path('storage/'.$product->image))->fit(630, 700);
        $image->save();

        $image1 = Image::make(public_path('storage/'.$detail->image1))->fit(630, 700);
        $image1->save();
        $image2 = Image::make(public_path('storage/'.$detail->image2))->fit(630, 700);
        $image2->save();
        $image3 = Image::make(public_path('storage/'.$detail->image3))->fit(630, 700);
        $image3->save();


        return redirect()->route('index');
    }

    public function edit(FeatureProductMaster $product){
        return view('FeatureProduct.edit', compact('product'));
    }

    public function update(FeatureProductMaster $product){
        $data = request()->validate([
            'title' => 'required|max:20',
            'image' => 'required|file|image',
            'price' => 'required|numeric',
        ]);


        $product->update([
            'title' => $data['title'],
            'image' => request()->image->store('FeatureProduct', 'public'),
            'price' => $data['price'],
        ]);

        $image = Image::make(public_path('storage/'.$product->image))->fit(630, 700);
        $image->save();

        return redirect()->route('index');
    }

    public function delete(FeatureProductMaster $product){
        return view('FeatureProduct.delete', compact('product'));
    }

    public function destroy(FeatureProductMaster $product){
        $product->productDetail()->delete();
        $product->delete();

        return redirect()->route('index');
    }


}
