<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function productDetails()
    {
        return view('frontEnd.pages.product-detailes');
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
