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
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
 
    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget"> 
                        <div class="shop_sidebar_banner">
                            @php
                                $big_banners = App\Banner::where('banner_status', 3)->limit(1)->latest()->get(); 
                            @endphp 
                            @foreach ($big_banners as $big_bannersitem)
                                <img src="{{asset('/'.$big_bannersitem->big_banner)}}" alt="">
                            @endforeach
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12"> 
                    <!--shop toolbar start-->
                    <div class="shop_banner">
                        @php
                            $big_ba = App\Banner::where('banner_status', 2)->limit(1)->latest()->get(); 
                        @endphp 
                        @foreach ($big_ba as $big_banitem)
                            <img src="{{asset('/'.$big_banitem->big_banner)}}" alt="">
                        @endforeach
                    </div>
                    <div class="shop_title">
                        <h1>shop</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <div class="niceselect_option">  
                        </div>
                        <div class="page_amount"> 
                            <p>Showing {{count($products)}} results</p> 
                        </div>
                    </div>


                    <!--shop toolbar end-->

                    <div class="allcontents">
                        <div class="row shop_wrapper">
                            @foreach ($products as $shopproduct)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            @php
                                                $dcImg = json_decode($shopproduct->product_img);
                                                $under_sub_category = App\UnderSub::where('id', $shopproduct->undercategory)->first(); 
                                            @endphp
                                            @foreach ($dcImg  as $arr_imgitem)
                                                <a class="primary_img" href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}"><img src="{{asset('/'.$arr_imgitem)}}" alt=""></a> 
                                            @endforeach 

                                            @if ($shopproduct->discount > 0) 
                                                <div class="label_product">
                                                    <span class="label_sale">-{{$shopproduct->discount}}%</span>
                                                </div>
                                            @endif

                                            <div class="action_links">
                                                <ul>
                                                    <li class="wishlist"><a href="" data-id="{{$shopproduct->id}}" data-title="{{$shopproduct->title}}" id="addtoWhish" title="Add to Wishlist"><i class="icon-heart"></i></a></li>  
                                                    <li class="compare"><a href="" data-id="{{$shopproduct->id}}" data-title="{{$shopproduct->title}}" id="addtoCompare" title="compare"><i class="icon-repeat"></i></a></li>
                                                    <li class="quick_button"><a href="" data-id="{{$shopproduct->id}}" id="product_preview_btn" data-toggle="modal" data-target="#modal_box" title="quick view"> <i class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="add_to_cart">
                                                @php
                                                    $totalDisc          = ($shopproduct->price*$shopproduct->discount)/100;
                                                    $priceWithDiscount  = $shopproduct->price-$totalDisc;
                                                @endphp
                                                <a href="" data-id="{{$shopproduct->id}}" data-title="{{$shopproduct->title}}" data-price="{{$priceWithDiscount}}" id="addtocart" title="add to cart">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            @php
                                                $shopproductb = App\subcategory::where('id', $shopproduct->subcategory)->latest()->get(); 
                                            @endphp
                                            @foreach ($shopproductb as $sub_item) 
                                                <p class="manufacture_product"><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}"> {{$sub_item->sub_name}} </a></p>
                                            @endforeach  
                                            <h4><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}">{{$shopproduct->title}}</a></h4>
                                            <div class="price_box">   
                                                @if ($shopproduct->discount > 0)
                                                    @php
                                                        $totalDisc          = ($shopproduct->price*$shopproduct->discount)/100;
                                                        $priceWithDiscount  = $shopproduct->price-$totalDisc;
                                                    @endphp
                                                    <span class="old_price">${{$shopproduct->price}}</span>
                                                    <span class="current_price">${{$priceWithDiscount}}</span>
                                                    @else
                                                <span class="current_price">${{$shopproduct->price}}</span>
                                                @endif   
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            @endforeach
                        </div> 
                        @if (count($products) > 9)  
                            <div class="shop_toolbar t_bottom">
                                <div class="pagination">
                                    {{$products->links()}} 
                                </div>
                            </div>
                        @endif 
                    </div>
                    <!--shop toolbar end--> 



                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

@endsection