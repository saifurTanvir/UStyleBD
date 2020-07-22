<?php

namespace App\Http\Controllers;

use App\AddingCart;
use App\CoverImage;
use App\FeatureProductMaster;
use App\NewArrival;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $coverImage = CoverImage::orderBy('id', 'desc')->first();
        $featureProducts = FeatureProductMaster::orderBy('id', 'desc')->take(3)->get();
        $newArrivals = NewArrival::orderBy('id', 'desc')->take(3)->get();
        return view('Customer.index', compact('coverImage', 'featureProducts', 'newArrivals'));
    }

    public function orderIndex(){
        $carts = AddingCart::where('status', '!=', 'complete')->orderBy('id', 'desc')->get();

        return view('Order.orderIndex', compact('carts'));
    }

    public function orderEdit(AddingCart $orderId, $status){
        $orderId->update(['status'=> $status]);
        return redirect()->route('admin.orders');
    }
}
