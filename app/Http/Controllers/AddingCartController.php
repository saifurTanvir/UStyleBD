<?php

namespace App\Http\Controllers;

use App\AddingCart;
use App\ProductDetail;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;

class AddingCartController extends Controller
{
    public function index(){
        $user = auth()->user();
        $carts = $user->addingCart;
        $carts->load('details.productDetailable');
        $total = 0;
        foreach ($carts as $cart){
            $total = $total + $cart->net;
        }
        //dd($total);
        return view('Cart.index', compact('carts', 'total'));

    }

    public function create(ProductDetail $productDetail){
        $productDetail->load('productDetailable');
        $data = request()->validate([
            'quantity' => 'required|numeric'
        ]);

        $data2 = auth()->user()->addingCart()->create([
            'product_detail_id' => $productDetail->productDetailable_id,
            'quantity' => request()->quantity,
            'total' => ((int)(request()->quantity * $productDetail->productDetailable->price)),
            'net' => ((int)(request()->quantity * $productDetail->productDetailable->price)
                - ($productDetail->productDetailable->price * ($productDetail->discount/100))),
            'status' => "onCart",
        ]);

        return redirect()->route('index');

    }
}
