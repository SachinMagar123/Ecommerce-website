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

//     public function add_to_cart(Request $request){
// //if session exists
//         if($request->session()->has('cart')){

//             $cart = $request->session()->get('cart');
//             $product_ids = array_column($cart,'id');

//             if(in_array($request->id,$product_ids)){
  
//                 $id=$request->id;
//                 $name=$request->name;
//                 $image=$request->image;
//                 $quantity=$request->quantity;
//                 ($request->sale_price != null)? $price=$request->sale_price : $price = $request->price ;
    
//                 $product_array =  array(
    
//                     'id'=> $id,
//                     'name'=> $name,
//                     'image'=> $image,
//                     'quantity'=> $quantity,
//                     'price'=> $price,
//                 );
    
//                 $cart[$request->id] = $product_array;
    
//                 $request->session()->put('cart',$cart);

//                 $this-> calculateTotal($request);
    
//                 return view('cart');
//                 // return redirect('/cart')->withErrors(['message'=>"muji pailai xa "]);

//             }

//             else{

//                 return redirect()->back()->withErrors(['message'=>"muji pailai xa "]);

//             }
          

//         }
// //if session  doesnot exists 
//         else{

//             $id=$request->id;
//             $name=$request->name;
//             $image=$request->image;
//             $quantity=$request->quantity;
//             ($request->sale_price != null)? $price=$request->sale_price : $price = $request->price ;

//             $product_array =  array(

//                 'id'=> $id,
//                 'name'=> $name,
//                 'image'=> $image,
//                 'quantity'=> $quantity,
//                 'price'=> $price,
//             );

//             $cart[$request->id] = $product_array;

//             $request->session()->put('cart',$cart);

//             $this-> calculateTotal($request);

//             return view('cart');

//         }
//     }

    public function remove_from_cart(Request $request){
        $cart = $request->session()->get('cart');
        $id_to_delete = $request->id;
        unset($cart[$id_to_delete]);
        
        $request->session()->put('cart',$cart);

        return redirect('/cart')->withErrors(['message'=>"Product removed from cart"]);
 
    }

public function add_to_cart(Request $request)
    {
        // dd('Here');
        // dd($request->all());

        // if session exist
        if ($request->session()->has('cart')) {

            $cart = $request->session()->get('cart');
            $product_ids = array_column($cart, 'id');

            if (!in_array($request->id, $product_ids)) {

                $id = $request->id;
                $name = $request->name;
                $image = $request->image;
                $quantity = $request->quantity;
                ($request->sale_price != null) ? $price = $request->sale_price : $price = $request->price;

                $product_array = array(
                    'id' => $id,
                    'name' => $name,
                    'image' => $image,
                    'quantity' => $quantity,
                    'price' => $price,
                    // 'log' => 'this',
                );
                $cart[$request->id] = $product_array;
                $request->session()->put('cart', $cart);

                $this->calculateTotal($request);

                return view('cart');
            } else {
                return redirect()->back()->withErrors(['message' => "Product already added to cart"]);
            }
        }
        // if session doesnt exist
        else {
            $id = $request->id;
            $name = $request->name;
            $image = $request->image;
            $quantity = $request->quantity;
            ($request->sale_price != null) ? $price = $request->sale_price : $price = $request->price;

            $product_array = array(
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'quantity' => $quantity,
                'price' => $price,
                // 'log' => 'this',
            );
            // dd($product_array);
            $cart[$request->id] = $product_array;
            $request->session()->put('cart', $cart);

            return view('cart');
        }
    }

    public  function calculateTotal(Request $request){
      $cart = Session()->get('cart');

      $totalprice=0;
      foreach($cart as $item){
        $totalprice += $item['price'] * $item['quantity'];
      }

      $request->session()->put('totalprice',$totalprice);

    //   dd($request->session()->get('totalprice'));
   
    }

    public function update_cart(Request $request){


        if($request->quantity == 0){
            return redirect()->back()->withErrors(['message'=>"Quantity cannot be zero"]);
        }

        elseif($request->quantity < 0){
            return redirect()->back()->withErrors(['message'=>"Quantity cannot be negative"]);
        }

        $cart = $request->session()->get('cart');
        $id_to_update = $request->id;
        $cart[$id_to_update]['quantity'] = 0;
        $cart[$id_to_update]['quantity'] = $request->quantity;
        $cart[$id_to_update]['price'] = $cart[$id_to_update]['price'] * $request->quantity;

        $request->session()->put('cart',$cart);

        return view('cart');
        // dd($cart[$id_to_update]);
        // dd($cart);
           }
}
