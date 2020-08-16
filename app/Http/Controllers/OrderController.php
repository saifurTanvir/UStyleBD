<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $user = auth()->user();
        $carts = $user->addingCart->where('status', '!=', 'onCart')->where('status', '!=', 'complete')->sortByDesc('id');
        $carts->load('details.productDetailable');
        //dd($carts);
        $total = 0;
        foreach ($carts as $cart){
            $total = $total + $cart->net;
        }
        //dd($total);
        return view('Order.index', compact('carts', 'total'));
    }
}
