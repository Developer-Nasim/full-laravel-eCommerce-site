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
                            <li>Whislist Cart</li>
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
            @if (count($allWhilist))
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
                                            <th class="product_total">Add to cart</th>
                                        </tr>
                                    </thead>
                                    <tbody class="allWhishContent">
                                        @foreach ($allWhilist as $item)
                                            @php 
                                                $products = App\Product::where('id', $item->product_id)->first();
                                                $under_sub_category = App\UnderSub::where('id', $products->undercategory)->first(); 
                                            @endphp 
                                            <tr data-id="{{$item->id}}">
                                                <td class="product_remove"><a href="" id="product_remove_whish" data-id="{{$item->id}}"><i class="fa fa-trash-o"></i></a></td> 
                                                <td class="product_thumb"><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}">
                                                    @php
                                                        $img = json_decode($products->product_img);
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
                                                <td class="product_name"><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}">{{$products->title}}</a></td>
                                                <td class="product-price">{{$products->price}}$</td>
                                                <td class="product_quantity"><label>{{$item->qty}}</label></td>
                                                <td class="product_total">
                                                    <div class="checkout_btn text-center">
                                                        <a href="" id="product_whish_cart" style="color: #fff" data-price="{{$products->price}}" data-id="{{$item->id}}">Add to cart</a>
                                                    </div>
                                                </td> 
                                            </tr>  
                                        @endforeach
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
                        <div class="coupon_inner"> 
                            <div class="checkout_btn">
                                <a href="{{url('home/cart')}}">Go to cart page</a>
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