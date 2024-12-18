<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class FrontEndController extends Controller
{
    public function index(){
        $products = Products::all();
        return view('index',['products'=>$products]);
    }

    public function products(){

        $products = Products::all();
        return view('products',['products'=>$products]);
    }

    public function cart(){
        return view('cart');
    }
    
    public function about(){
        return view('about');
    }
    
    public function single_product($id){

        $product = Products::find($id);
        return view('single_product',['product'=>$product]);
    }

    public function checkout(){
        return view('checkout');
    }
}
