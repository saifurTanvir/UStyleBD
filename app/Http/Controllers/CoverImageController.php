<?php

namespace App\Http\Controllers;

use App\CoverImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        $coverImage = CoverImage::all()->first();
        //dd($coverImage->image);

        $image = Image::make(public_path('storage/'.$coverImage->image))->fit(1920, 850);
        $image->save();

        return redirect()->route('index');

    }
}
