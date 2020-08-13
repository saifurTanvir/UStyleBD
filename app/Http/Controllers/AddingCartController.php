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
        // dd(ProductDetail::first()->addingCart);
        //dd(AddingCart::first()->details);



        $user = auth()->user();
        $carts = $user->addingCart->where('status','onCart')->sortByDesc('id');
        $carts->load('details.productDetailable');
        //dd($carts);
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

        if(auth()->user()){
            $data2 = auth()->user()->addingCart()->create([
                'product_detail_id' => $productDetail->id,
                'quantity' => request()->quantity,
                'total' => ((int)(request()->quantity * $productDetail->productDetailable->price)),
                'net' => ((int)(request()->quantity * $productDetail->productDetailable->price)
                    - ($productDetail->productDetailable->price * ($productDetail->discount/100))),
                'status' => "onCart",
            ]);
        }
        else{
            return redirect()->route('login');
        }


        return redirect()->route('addingCart.index');

    }

    public function delete(AddingCart $cartId){
        $cartId->delete();
        return redirect()->route('addingCart.index');
    }
}
