@extends('layouts.front')
@section('frontend') 
 
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-32">
        <div class="container">
            @if (count($allcart))
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity </th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="allcontent">
                                        {{-- @foreach ($allcart as $item)
                                            @php  
                                                $productsssss = App\Product::where('id', $item->product_id)->first(); 
                                            @endphp 
                                            <tr data-id="{{$item->id}}"> 
                                                <td class="product_total">{{$item->product_id}}$</td> 
                                            </tr>
                                        @endforeach --}}
                                        @php  
                                            $asasasasasasa = App\Product::where('id', 7)->first();
                                            $fghffjfjhf = App\UnderSub::where('id', $asasasasasasa->undercategory)->first(); 
                                        @endphp
                                        <H1>{{$asasasasasasa->title}}</H1>
                                        <H1>{{$fghffjfjhf->id}}</H1>
                                        {{-- @foreach ($allcart as $item)
                                            @php  
                                                $asasasasasasa = App\Product::where('id', $item->id)->first();
                                                $fghffjfjhf = App\UnderSub::where('id', $asasasasasasa->undercategory)->first(); 
                                            @endphp 
                                            <tr data-id="{{$item->id}}">
                                                <td class="product_remove"><a href="" id="product_remove_cart" data-id="{{$item->id}}"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="{{url('home/shop/product/details/'.$fghffjfjhf->under_sub_category)}}">
                                                    @php
                                                        $img = json_decode($asasasasasasa->product_img);
                                                        $i = 0; 
                                                    @endphp
                                                    @foreach ($img as $imgitem)
                                                        <img style="width: 70px;" src="{{asset('/'.$imgitem)}}" alt=""> 
                                                        @php
                                                            $i++;
                                                            if($i == 1){
                                                                break;
                                                            }
                                                        @endphp
                                                    @endforeach
                                                </a></td>
                                                <td class="product_name"><a href="{{url('home/shop/product/details/'.$fghffjfjhf->under_sub_category)}}">{{$asasasasasasa->title}}</a></td>
                                                <td class="product-price">{{$item->price}}$</td>
                                                <td class="product_quantity"><label>Quantity</label><input min="1" id="cart_qty" max="100" value="{{$item->qty}}" type="number"> 
                                                    <div class="cart_submit">
                                                        <button  id="product_update_cart" data-id="{{$item->id}}" type="submit">up</button>
                                                    </div>
                                                </td>
                                                <td class="product_total">{{$item->total}}$</td> 
                                            </tr>  
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6"> 
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal"> 
                                        @php
                                            $total = App\AddCart::all()->where('ip_address', request()->ip())->where('status', 1)->sum('total');                                            
                                        @endphp
                                        <p>Subtotal</p> 
                                        <p class="cart_amount">{{$total}}$</p> 
                                    </div>
                                    <div class="cart_subtotal">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Flat Rate:</span>$7.00</p>
                                    </div>  
                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount">${{$total-7}}.00</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{url('home/shop/check/out')}}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end--> 
                @else
                <h3 class="empty">Empty</h3>
            @endif  
        </div>
    </div>
    <!--shopping cart area end -->

@endsection