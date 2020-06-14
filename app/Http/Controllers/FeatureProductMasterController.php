<?php

namespace App\Http\Controllers;

use App\CoverImage;
use App\FeatureProductMaster;
use Illuminate\Http\Request;

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
        ]);

        $featureProduct->details()->create([
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



        return redirect()->route('index');
    }

    public function edit(FeatureProductMaster $product){
        return view('FeatureProduct.edit', compact('product'));
    }

    public function update(FeatureProductMaster $product){
        $data = request()->validate([
            'title' => 'required|max:20',
            'image' => 'required|file|image'
        ]);

        $product->update([
            'title' => $data['title'],
            'image' => request()->image->store('FeatureProduct', 'public'),
        ]);

        return redirect()->route('index');
    }

    public function delete(FeatureProductMaster $product){
        return view('FeatureProduct.delete', compact('product'));
    }

    public function destroy(FeatureProductMaster $product){
        $product->details()->delete();
        $product->delete();

        return redirect()->route('index');
    }


}
