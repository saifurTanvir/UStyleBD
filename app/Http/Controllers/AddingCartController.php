<?php

namespace App\Http\Controllers;

use App\ProductDetail;
use Illuminate\Http\Request;

class AddingCartController extends Controller
{
    public function create(ProductDetail $productDetail){
        //dd($productDetail);
        dd(request()->all());
    }
}
