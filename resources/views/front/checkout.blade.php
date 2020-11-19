@extends('layouts.front')
@section('frontend') 
 
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--Checkout page section-->
    <div class="Checkout_section mt-32">
        <div class="container"> 
            <div class="checkout_form">  
                <form action="{{route('place.order.now')}}" method="POST"> 
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row"> 
                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input name="first_name" id="customer_name" type="text">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name <span>*</span></label>
                                    <input name="last_name" type="text">
                                </div> 
                                <div class="col-12 mb-20">
                                    <label for="country">country <span>*</span></label>
                                    <select class="niceselect_option form-control" name="country" id="country">
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Dominican Republic">Dominican Republic</option> 
                                    </select>
                                </div> 
                                <div class="col-12 mb-20">
                                    <label>Street address <span>*</span></label>
                                    <input placeholder="House number and street name" id="address" name="address" type="text">
                                </div>
                                <div class="col-12 mb-20">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" name="address_optional" type="text">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input name="city" type="text">
                                </div> 
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input name="number" id="mobile" type="text"> 
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address <span>*</span></label>
                                    <input name="email" id="email" type="text"> 
                                </div>  
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6"> 
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach ($allcart as $item) 
                                            <tr data-id="{{$item->id}}">
                                                <td> {{$item->product_id}} <strong> × {{$item->qty}}</strong></td> 
                                                <td>{{$item->total}}$</td> 
                                            </tr>  
                                        @endforeach  
                                    </tbody>
                                    <tfoot>
                                        @php
                                            $total = App\AddCart::all()->where('ip_address', request()->ip())->sum('total');                                            
                                        @endphp
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>${{$total}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>$7.00</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>${{$total-7}}</strong></td>
                                            <input type="hidden" id="total_amount" name="payment" value="{{$total-7}}">
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Create an account?</label>

                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default">
                                    <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                    <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets/img/icon/papyel.png" alt=""></label>

                                    <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_button"> 
                                    <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                        token="if you have any token validation"
                                        postdata="your javascript arrays or objects which requires in backend"
                                        order="If you already have the transaction generated for current order"
                                        endpoint="{{ url('/pay-via-ajax') }}" style="    
                                        margin-bottom: 20px;
                                        margin-top: 15px;
                                        background: #dadada !IMPORTANT;" disabled title="Now it is disable for a serious case"> Pay Now
                                    </button>
                                    <button type="submit">Proceed to PayPal</button>
                                </div>
                            </div>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->

@endsection