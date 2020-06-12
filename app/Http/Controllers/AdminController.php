<?php

namespace App\Http\Controllers;

use App\CoverImage;
use App\FeatureProductMaster;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $coverImage = CoverImage::orderBy('id', 'desc')->first();
        $featureProducts = FeatureProductMaster::orderBy('id', 'desc')->take(3)->get();
        return view('Customer.index', compact('coverImage', 'featureProducts'));
    }
}
