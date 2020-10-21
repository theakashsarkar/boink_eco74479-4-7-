<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoinkController extends Controller
{
    //
    public function index(){
        return view('frontEnd.Home.home');
    }
    public function shop(){
        return view('frontEnd.Shop.shop');
    }
}
