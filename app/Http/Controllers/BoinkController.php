<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class BoinkController extends Controller
{
    //
    public function index(){
        $products = Product::where('publication_status',1)->orderBy('id','DESC')->get();
        return view('frontEnd.Home.home',['products' => $products]);
    }
    public function product($id){
        $category_product = Product::where('category_id',$id)->where('publication_status',1)->get();
        return view ('frontEnd.Shop.shop',['category_product' =>$category_product]);
    }
    public function shop(){
        return view('frontEnd.Shop.shop');
    }
}
