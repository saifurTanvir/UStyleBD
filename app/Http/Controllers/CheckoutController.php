<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        $user = auth()->user();
        $carts = $user->addingCart->where('status','onCart')->sortByDesc('id');
        foreach ($carts as $cart){
            $cart->status = "ordered";
            $cart->update();
        }

        return redirect()->route('order.index');


    }
}
