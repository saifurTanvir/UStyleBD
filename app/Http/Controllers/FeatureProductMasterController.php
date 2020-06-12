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
            'image' => 'required|file|image'
        ]);

        FeatureProductMaster::create([
            'title' => $data['title'],
            'image' => request()->image->store('FeatureProduct', 'public'),
        ]);

        return redirect()->route('index');
    }
}
