<?php

namespace App\Http\Controllers;

use App\CoverImage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $coverImage = CoverImage::orderBy('id', 'desc')->first();
        return view('Customer.index', compact('coverImage'));
    }
}
