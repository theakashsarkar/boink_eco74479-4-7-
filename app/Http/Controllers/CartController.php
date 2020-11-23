<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::find($request->id);
        Cart::add(array(
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity'   => $request->qty,
             'attributes' =>array(
            'image' => $product->product_image,
                 )
        ));
        return redirect('cart/show');
    }
    public function showCart(){
        $product = Cart::getContent();
        return view('frontEnd.pages.shop-carts',['product'=>$product]);
    }
    public function deleteCard($id){
        Cart::remove($id);
        return redirect('cart/show');
    }
    public function updateCart(Request $request){
        Cart::update($request->id,array(
            'quantity' => $request->qty
        ) );
        return redirect('cart/show');
    }
}
