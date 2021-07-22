<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cartProducts = Cart::where('is_done', 'onSave')->first();
        $count = $cartProducts->products()->count();

        return view('cart', compact('count'));
    }
}
