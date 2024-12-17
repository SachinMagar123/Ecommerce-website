<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class FrontEndController extends Controller
{
    public function index(){
        return view('index');
    }

    public function products(){
        return view('products');
    }

    public function cart(){
        return view('cart');
    }
    
    public function about(){
        return view('about');
    }
    
    public function single_product(){
        return view('single_product');
    }

    public function checkout(){
        return view('checkout');
    }
}
