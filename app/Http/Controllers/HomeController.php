<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $foods = Product::where('is_best', true)->get();
        $cartProducts = Cart::where('is_done', 'onSave')->first();
        $count = $cartProducts->products()->count();

        return view('welcome', compact('foods', 'count'));
    }
}
