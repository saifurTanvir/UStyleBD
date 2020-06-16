<?php

namespace App\Http\Controllers;

use App\FeatureProductMaster;
use App\NewArrival;
use App\ProductDetail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        $product = NewArrival::orderBy('id', 'desc')->first();
        $detail = $product->details()->first();

        $image = Image::make(public_path('storage/'.$product->image))->fit(460, 560);
        $image->save();

        $image1 = Image::make(public_path('storage/'.$detail->image1))->fit(460, 560);
        $image1->save();
        $image2 = Image::make(public_path('storage/'.$detail->image2))->fit(460, 560);
        $image2->save();
        $image3 = Image::make(public_path('storage/'.$detail->image3))->fit(460, 560);
        $image3->save();

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

        $image = Image::make(public_path('storage/'.$product->image))->fit(460, 560);
        $image->save();

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
