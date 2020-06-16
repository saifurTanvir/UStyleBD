<?php

namespace App\Http\Controllers;

use App\FeatureProductMaster;
use App\NewArrival;
use App\ProductDetail;
use Illuminate\Http\Request;

class NewArrivalController extends Controller
{
    public function create(){
        return view('NewArrival.create');
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

        $newArrival = NewArrival::create([
            'title' => $data['title'],
            'image' => request()->image->store('NewArrival', 'public'),
        ]);

        $newArrival->details()->create([
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


    public function edit(NewArrival $product){
        $detail = $product->details()->first();
        return view('NewArrival.edit', compact('product', 'detail'));
    }

    public function update(NewArrival $product){
        $data = request()->validate([
            'title' => 'required|max:20',
            'image' => 'required|file|image'
        ]);

        $product->update([
            'title' => $data['title'],
            'image' => request()->image->store('NewArrival', 'public'),
        ]);

        return redirect()->route('index');
    }

    public function delete(NewArrival $product){
        return view('NewArrival.delete', compact('product'));
    }

    public function destroy(NewArrival $product){
        $product->details()->delete();
        $product->delete();

        return redirect()->route('index');
    }


}
