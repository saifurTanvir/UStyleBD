<?php

namespace App\Http\Controllers;

use App\FeatureProductMaster;
use App\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index(FeatureProductMaster $product){
        $detail = $product->details()->first();
        //dd($detail->image1);
        return view('ProductDetail.index', compact('product', 'detail'));
    }
}
