
@extends('layouts.master')

@section('content')
        <!-- Products Start -->
        <div id="products">
            <div class="container">
                <div class="section-header">
                    <h2>Get Your Products</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies
                    </p>
                </div>
                <div class="row align-items-center">
                @foreach($products as $product)
                <div class="col-md-3">
                        <div class="product-single">
                            <div class="product-img">
                                <img src="{{asset('img/' .$product->image )}}" alt="Product Image">
                            </div>
                            <div class="product-content">
                                <h2>{{$product->name}}</h2>
                             
                                  @if($product->sale_price !=null)
                
                                   <h3>Rs{{ $product->sale_price}}</h3>
                                    <h3 style="text-decoration: line-through">Rs{{$product->price}}</h3>
                                     @else

                                     <h3>Rs {{$product->price}}</h3>
                                     @endif
                                    
                          
                                <a class="btn" href="#">Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- Products End -->

        @endsection
        