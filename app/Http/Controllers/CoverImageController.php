<?php

namespace App\Http\Controllers;

use App\CoverImage;
use Illuminate\Http\Request;

class CoverImageController extends Controller
{
    public function create(){
        return view('CoverImage.create');
    }

    public function update(){
        $data = request()->validate([
            'coverImage' => 'required|file|image'
        ]);
        CoverImage::create([
            'image' => request()->coverImage->store('coverImage', 'public'),
        ]);

        return redirect()->route('index');

    }
}
