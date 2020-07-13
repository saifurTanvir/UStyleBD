<?php

namespace App\Http\Controllers;

use App\AddingCart;
use App\ProductDetail;
use App\User;
use Illuminate\Http\Request;

class AddingCartController extends Controller
{
    public function create(ProductDetail $productDetail){
        $productDetail->load('productDetailable');
        $data = request()->validate([
            'quantity' => 'required|numeric'
        ]);
        //dd($productDetail->productDetailable);


//        $data2 = AddingCart::create([
//            'product_id' => $productDetail->productDetailable_id,
//            'quantity' => request()->quantity,
//            'total' => ((int)(request()->quantity * $productDetail->productDetailable->price)),
//            'net' => ((int)(request()->quantity * $productDetail->productDetailable->price)
//                - ($productDetail->productDetailable->price * ($productDetail->discount/100))),
//        ]);

        $data2 = auth()->user()->addingCart()->create([
            'product_id' => $productDetail->productDetailable_id,
            'quantity' => request()->quantity,
            'total' => ((int)(request()->quantity * $productDetail->productDetailable->price)),
            'net' => ((int)(request()->quantity * $productDetail->productDetailable->price)
                - ($productDetail->productDetailable->price * ($productDetail->discount/100))),
        ]);

        return redirect()->route('index');

    }
}
