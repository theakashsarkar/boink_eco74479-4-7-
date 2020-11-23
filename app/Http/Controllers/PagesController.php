<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function productDetails($id)
    {
        $product = Product::find($id);
        return view('frontEnd.pages.product-detailes',['product'=>$product]);
    }
    public function shopCarts()
    {
        return view('frontEnd.pages.shop-carts');
    }
    public function checkout()
    {
        return view('frontEnd.pages.chckout');
    }
    public function blogDetails()
    {
        return view('frontEnd.pages.blog-details');
    }

    public function contact()
    {
        return view('frontEnd.contact.contact');
    }
}
