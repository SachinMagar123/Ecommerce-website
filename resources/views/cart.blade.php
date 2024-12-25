    @extends('layouts.master')

    @section('content')
            <!-- Nav Start -->
            <div id="nav">
                <div class="container-fluid">
                    <div id="logo" class="pull-left">
                        <a href="index.html"><img src="img/logo.png" alt="Logo" /></a>
                    </div>

                


        <!-- Cart Start -->
        <div class="container-fluid pt-5">
            <div class="container">
            
                

        <section class="cart container mt-2 my-3 py-5">
            <div class="container mt-2">
                <h4>Your Cart</h4>
            </div>

            <table class="pt-5">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>

                @if(session()->has('cart'))

                @foreach(Session::get('cart') as $product)
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="{{asset('img/'.$product['image'])}}" alt="Product Image">
                                    <div>
                                        <p>{{$product['name']}}</p>
                                        <small><span>RS</span>{{$product['price']}}</small>
                                        <br>
                                        <form action = "{{route('remove_from_cart')}}" method="POST"> 
                                            @csrf
                                        <input type="hidden" name="id" class="remove-btn" value="{{$product['id']}}">
                                        
                                            <input type="submit" name="remove_btn" class="remove-btn" value="remove">
                                        </form>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <form action="{{route('update_cart')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product['id']}}">
                                    <input type="number" name="quantity" value="{{$product['quantity']}}">
                                    <input type="submit" value="edit" class="edit-btn" name="edit_product_quantity_btn">
                                </form>
                            </td>

                            <td>
                                <span class="product-price">{{$product['price']}}</span>
                            </td>
                        </tr>
                @endforeach

            

            </table>


        
            <div class="cart-total">
                <table>
        
                    <tr>
                        
                        <td>Totals</td>
                        @if(session()->has('totalprice'))
                        
                        <td> 
                        Rs{{Session()->get('totalprice')}}
                       </td>
                        @endif
                </tr>
                
            </table>
        </div>
        @endif
            

            <div class="checkout-container">
        
                <form action="{{route('checkout')}}" method="GET">
                    <input type="submit" class="btn checkout-btn" value="Checkout" name="">
                </form>
            
            
            </div>





        </section>

                
            
            </div>
        </div>
        <!-- Cart End -->

    @endsection