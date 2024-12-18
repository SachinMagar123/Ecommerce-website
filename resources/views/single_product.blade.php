@extends('layouts.master')

@section('content')
        
        <!-- Products Start -->
        <div id="products">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-12">
                        <div class="product-single">
                            <div class="product-img">
                                <img src="{{asset('img/'.$product->image)}}" alt="Product Image">
                            </div>
                            <div class="product-content">
                                <h2>{{$product->name}}</h2>

                                @if($product->sale_price != NULL)
                                <h3>{{$product->sale_price}}</h3>

                                <h3 style="text-decoration: line-through;">{{$product->price}}</h3>
                                @else
                                <h3>{{$product->price}}</h3>
                                @endif
                                <!-- <a class="btn" href="#">Buy Now</a> -->

                                <form action="" method="Post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}" >
                                    <input type="hidden" name="name" value="{{$product->name}}" >
                                    <input type="hidden" name="price" value="{{$product->price}}" >
                                    <input type="hidden" name="sale_price" value="{{$product->sale_price}}" >
                                    <input type="hidden" name="image" value="{{$product->image}}" >
                                    <input type="hidden" name="quantity" value="1" >
                                    <input type="submit" value="Add to Cart" class="btn" >

                                </form>
                            </div>
                        </div>
                    </div>
                  
                </div>

            </div>
        </div>
        <!-- Products End -->
      @endsection  
 