<?php

namespace App\Http\Controllers;

use App\ProductDetail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($categoryName){
        dd($categoryName);
    }
}
