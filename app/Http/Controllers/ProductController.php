<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $foods = Product::orderBy('is_best', 'desc')->get();
        $cartProducts = Cart::where('is_done', 'onSave')->first();
        $count = $cartProducts->products()->count();

        return view('products.foods', compact('foods', 'count'));
    }

    public function search(){
        $data = request()->all();
        $foodsSearch = Product::where('nama', 'like', '%'.$data['search'].'%')->orderBy('is_best', 'desc')->get();

        $response['data'] = $foodsSearch;
        // print_r($foodsSearch);
        echo json_encode($response);
        exit;
    }

    public function getFood(){
        $data = request()->all();
        $food = Product::find($data['id']);

        $response['data'] = $food;

        echo json_encode($response);
        exit;
    }

    public function addCart(){
        $data = request()->all();
        $product = Product::where('id', $data['id'])->first();
        $totalHarga = $product->harga * $data['jumlah'];

        $cart = Cart::firstOrNew(['is_done' => 'onSave']);
        if(!$cart->exists){
            $cart->fee = $totalHarga;
            $cart->save();
        } else {
            Cart::where('id', $cart->id)
                ->update(['fee' => $cart->fee + $totalHarga]);
        }

        $check = false; $order = 0;
        foreach($cart->products as $product){
            global $check, $order;
            if($product->pivot->product_id == $data['id']){
                $check = true; $order = $product->pivot->jumlah;
            }
        }

        if($check){
            $response['data'] = $cart->products()->updateExistingPivot($data['id'], ['jumlah' => $order + $data['jumlah'], 'desc' => $data['desc']]);    
        } else {
            $response['data'] = $cart->products()->attach($data['id'], ['jumlah' => $data['jumlah'], 'desc' => $data['desc']]);
        }

        echo json_encode($response);
        exit;
    }
}
