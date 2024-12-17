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


         
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="img/menu-1.jpg">
                                <div>
                                    <p>Hot Coffee</p>
                                    <small><span>$</span>199</small>
                                    <br>
                                    <form > 
                                      
                                        <input type="submit" name="remove_btn" class="remove-btn" value="remove">
                                    </form>
                                </div>
                            </div>
                        </td>

                        <td>
                            <form>
                                <input type="number" name="quantity" value="1">
                                <input type="submit" value="edit" class="edit-btn" name="edit_product_quantity_btn">
                            </form>
                        </td>

                        <td>
                            <span class="product-price">$199</span>
                        </td>
                    </tr>
           

        </table>


        <div class="cart-total">
            <table>
      
                <tr>
                    <td>Total</td>
                    <td>$199</td>
                </tr>
           
            </table>
        </div>
        

        <div class="checkout-container">
       
            <form >
                <input type="submit" class="btn checkout-btn" value="Checkout" name="">
            </form>
          
        
        </div>





    </section>

              
        
        </div>
    </div>
    <!-- Cart End -->

@endsection