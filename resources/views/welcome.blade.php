@extends('layouts.front')
@section('frontend') 
    
    <!--slider area start-->
    <section class="slider_section slider_s_two">
        <div class="slider_area owl-carousel">
            @php
                $slider = App\Slider::where('status', 1)->latest()->get(); 
            @endphp 
            @foreach ($slider as $slider_item)
            <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('/'.$slider_item->slider_img)}}">
                <div class="container">
                   <div class="row">
                       <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-6">
                            <div class="slider_content slider_c_three">
                                {!! $slider_item->slider_wrp !!}
                                <a href="{{url('shop')}}">shopping now</a>
                            </div>
                       </div>
                   </div>
                </div>
            </div>  
            @endforeach

        </div>
    </section>
    <!--slider area end-->
    
    <!--shipping area start-->
    <div class="shipping_area shipping_three">
        <div class="container">
            <div class="shipping_inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col1">
                            <div class="shipping_icone">
                                <i class="icon-truck"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>Free shipping on order</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col2">
                            <div class="shipping_icone">
                                <i class="icon-phone-call"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>Contact us 24 hrs a day</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col3">
                            <div class="shipping_icone">
                                <i class="icon-send"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>You’ve 30 days to Return</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col4">
                            <div class="shipping_icone">
                                <i class="icon-credit-card"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>100% secure payment</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->
    
    <!--banner area start-->
    <div class="banner_area mb-60">
        <div class="container">
            <div class="row">
                @php
                    $small_banner = App\Banner::where('banner_status', 1)->latest()->get();
                @endphp
                @foreach ($small_banner as $small_item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{url('shop')}}"><img src="{{asset('/'.$small_item->small_banner)}}" alt=""></a>
                        </div>
                    </div>
                </div>  
                @endforeach

            </div>
        </div>
    </div>
    <!--banner area end-->
 
    <!--product area start-->
    @php
        $cateData = App\Category::latest()->get(); 
    @endphp 
    <section class="product_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>New Arrivals</h2>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs"> 
                        <ul id="tabs-nav">
                            @foreach ($categ as $Category_item) 
                                <li><a href="#{{$Category_item->name}}">{{$Category_item->name}}</a></li>
                            @endforeach
                        </ul>
                        <div id="tabs-content">
                            @foreach ($categ as $Category_item)  
                            <div id="{{$Category_item->name}}" class="tab-content">
                                <div class="product_carousel product_column5 owl-carousel">
                                    @php
                                        $newArrive = App\Product::where('category', $Category_item->id)->latest()->get(); 
                                    @endphp
                                    @foreach ($newArrive as $newArrives)
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                @php
                                                    $dcImg = json_decode($newArrives->product_img);
                                                    $under_sub_category = App\UnderSub::where('id', $newArrives->undercategory)->first(); 
                                                @endphp
                                                @foreach ($dcImg  as $arr_imgitem)
                                                    <a class="primary_img" href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}"><img src="{{asset('/'.$arr_imgitem)}}" alt=""></a> 
                                                @endforeach 

                                                @if ($newArrives->discount > 0) 
                                                    <div class="label_product">
                                                        <span class="label_sale">-{{$newArrives->discount}}%</span>
                                                    </div>
                                                @endif

                                                <div class="action_links">
                                                    <ul>
                                                        <li class="wishlist"><a href="" data-id="{{$newArrives->id}}" data-title="{{$newArrives->title}}" id="addtoWhish" title="Add to Wishlist"><i class="icon-heart"></i></a></li>  
                                                        <li class="compare"><a href="" data-id="{{$newArrives->id}}" data-title="{{$newArrives->title}}" id="addtoCompare" title="compare"><i class="icon-repeat"></i></a></li>
                                                        <li class="quick_button"><a href="" data-id="{{$newArrives->id}}" id="product_preview_btn" data-toggle="modal" data-target="#modal_box" title="quick view"> <i class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="add_to_cart">
                                                    @php
                                                        $totalDisc          = ($newArrives->price*$newArrives->discount)/100;
                                                        $priceWithDiscount  = $newArrives->price-$totalDisc;
                                                    @endphp
                                                    <a href="" data-id="{{$newArrives->id}}" data-title="{{$newArrives->title}}" data-price="{{$priceWithDiscount}}" id="addtocart" title="add to cart">Add to cart</a>
                                                </div>
                                            </div>
                                            <div class="product_content">
                                                @php
                                                    $newArriveSb = App\subcategory::where('id', $newArrives->subcategory)->latest()->get(); 
                                                @endphp
                                                @foreach ($newArriveSb as $sub_item) 
                                                    <p class="manufacture_product"><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}"> {{$sub_item->sub_name}} </a></p>
                                                @endforeach  
                                                <h4><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}">{{$newArrives->title}}</a></h4>
                                                <div class="price_box">   
                                                    @if ($newArrives->discount > 0)
                                                        @php
                                                            $totalDisc          = ($newArrives->price*$newArrives->discount)/100;
                                                            $priceWithDiscount  = $newArrives->price-$totalDisc;
                                                        @endphp
                                                        <span class="old_price">${{$newArrives->price}}</span>
                                                        <span class="current_price">${{$priceWithDiscount}}</span>
                                                        @else
                                                    <span class="current_price">${{$newArrives->price}}</span>
                                                    @endif   
                                                </div>
                                            </div>
                                        </div>  
                                    @endforeach
                                </div>
                            </div> 
                            @endforeach
                        </div> <!-- END tabs-content -->
                    </div> <!-- END tabs -->
                    
                </div>
            </div>    
        </div>
    </section>
    <!--product area end-->

    <!--featured categories area start-->
    <section class="featured_categories mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Popular Categories</h2>
                    </div>
                    <div class="featured_container">
                        <div class="featured_carousel featured_column4 owl-carousel">
                            @php
                                $Categ = App\Category::limit(10)->latest()->get(); 
                            @endphp
                            @foreach ($Categ as $cts)  
                            <div class="single_items">
                                <div class="single_featured"> 
                                    <div class="featured_content">
                                        <h3 class="product_name"><a href="{{url('/home/popular/category/'.$cts->name)}}">{{$cts->name}}</a></h3>
                                    </div>
                                </div> 
                            </div> 
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--featured categories area end-->
    
    <!--product area start-->
    <section class="Feature product mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Feature product</h2>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-12"> 
                    <div id="cont">
                        <div class="product_carousel product_column5 owl-carousel">
                            @php
                                $feture = App\Product::latest()->get(); 
                            @endphp
                            @foreach ($feture as $newArrives)
                                <div class="single_product">
                                    <div class="product_thumb">
                                        @php
                                            $dcImg = json_decode($newArrives->product_img);
                                            $under_sub_category = App\UnderSub::where('id', $newArrives->undercategory)->first(); 
                                        @endphp
                                        @foreach ($dcImg  as $arr_imgitem)
                                            <a class="primary_img" href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}"><img src="{{asset('/'.$arr_imgitem)}}" alt=""></a> 
                                        @endforeach 

                                        @if ($newArrives->discount > 0) 
                                            <div class="label_product">
                                                <span class="label_sale">-{{$newArrives->discount}}%</span>
                                            </div>
                                        @endif

                                        <div class="action_links">
                                            <ul>   
                                                <li class="wishlist"><a href="" data-id="{{$newArrives->id}}" data-title="{{$newArrives->title}}" id="addtoWhish" title="Add to Wishlist"><i class="icon-heart"></i></a></li>  
                                                <li class="compare"><a href="" data-id="{{$newArrives->id}}" data-title="{{$newArrives->title}}" id="addtoCompare" title="compare"><i class="icon-repeat"></i></a></li>
                                                <li class="quick_button"><a href="" data-id="{{$newArrives->id}}" id="product_preview_btn" data-toggle="modal" data-target="#modal_box" title="quick view"> <i class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="" data-id="{{$newArrives->id}}" data-title="{{$newArrives->title}}" data-price="{{$newArrives->price}}" id="addtocart" title="add to cart">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        @php
                                            $newArriveSb = App\subcategory::where('id', $newArrives->subcategory)->latest()->get(); 
                                        @endphp
                                        @foreach ($newArriveSb as $sub_item) 
                                            <p class="manufacture_product"><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}"> {{$sub_item->sub_name}} </a></p>
                                        @endforeach  
                                        <h4><a href="{{url('home/shop/product/details/'.$under_sub_category->under_sub_category)}}">{{$newArrives->title}}</a></h4>
                                        <div class="price_box">   
                                            @if ($newArrives->discount > 0)
                                                @php
                                                    $totalDisc          = ($newArrives->price*$newArrives->discount)/100;
                                                    $priceWithDiscount  = $newArrives->price-$totalDisc;
                                                @endphp
                                                <span class="old_price">${{$newArrives->price}}</span>
                                                <span class="current_price">${{$priceWithDiscount}}</span>
                                                @else
                                            <span class="current_price">${{$newArrives->price}}</span>
                                            @endif   
                                        </div>
                                    </div>
                                </div>  
                            @endforeach
                        </div>
                    </div> <!-- END tabs-content --> 
                </div>
            </div>    
        </div>
    </section>
    <!--product area end-->
    
     <!--banner area start-->
    <div class="banner_fullwidth mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_thumb">
                        @php
                            $big_ba = App\Banner::where('banner_status', 2)->limit(1)->latest()->get(); 
                        @endphp 
                        @foreach ($big_ba as $big_banitem)
                            <a href="{{url('/shop')}}"><img src="{{asset('/'.$big_banitem->big_banner)}}" alt=""></a>
                        @endforeach
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <!--banner area end-->
    
     <!--Blog -->
     <section id="blog">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <h2>Blogs</h2>
                 </div>
             </div>
             <div class="row blog_content">
                 @foreach ($AddBlog as $blog_item)
                    <div class="col-lg-4">
                        <div class="singl-blog">
                            <img src="{{$blog_item->image}}" alt="">
                            <p><b>Date:</b> {{$blog_item->created_at->diffForHumans()}}</p> 
                            <a href="{{url('admin/blog/'.$blog_item->Title)}}">
                                <h3>{{$blog_item->Title}}</h3>
                                <a href="{{url('admin/blog/'.$blog_item->Title)}}" style="display: block;
                                font-weight: 600;
                                margin-top: 10">Read more</a>
                            </a>
                        </div>
                    </div>  
                 @endforeach
             </div>
         </div>
     </section>
     <!--Blog -->

    <!--brand area start-->
    <div class="brand_area brand_three mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        
                        @php
                            $brand = App\Brand::latest()->get();
                        @endphp
                        @foreach ($brand as $brand_item)  
                        <div class="single_brand"> 
                            <a><img src="{{asset('/'.$brand_item->img)}}" title="{{$brand_item->name}}-brand" alt="{{$brand_item->name}}brand"></a>
                        </div> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->


@endsection