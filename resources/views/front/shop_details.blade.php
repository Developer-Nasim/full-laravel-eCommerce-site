@extends('layouts.front')
@section('frontend') 
        

    @foreach ($detailse_data as $details) 
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">  
                                @php
                                    $Categ       = App\category::where('id', $details->category)->first();
                                    $subCateg    = App\subcategory::where('id', $details->subcategory)->first();
                                    $unsubCateg  = App\UnderSub::where('id', $details->undercategory)->first();
                                    $img_json    = json_decode($details->product_img);
                                    $reviews     = App\productReview::where('product_id',$details->id )->latest()->get();
                                    $revTotal    = App\productReview::where('product_id',$details->id )->sum('rate');
                                    $i           = 0;
                                @endphp
                                
                            <li>
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('/home/shop')}}">Shop</a></li> 
                                <li>{{$Categ->name}}</li>
                                <li>{{$subCateg->sub_name}}</li>
                                <li>{{$unsubCateg->under_sub_category}}</li>
                                <li>product details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--product details start-->
        <div class="product_details mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-tab">

                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a>
                                    @foreach ($img_json as $imgitem) 
                                        <img id="zoom1" src="{{asset('/'.$imgitem)}}" data-zoom-image="{{asset('/'.$imgitem)}}" alt="big-{{$i}}">
                                        @php
                                            $i++;
                                            if ($i == 1) {
                                                break;
                                            }
                                        @endphp
                                    @endforeach
                                </a>
                            </div>

                            <div class="single-zoom-thumb">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    @foreach ($img_json as $imgitem)  
                                        <li>
                                            <a class="elevatezoom-gallery active" data-update="" data-image="{{asset('/'.$imgitem)}}" data-zoom-image="{{asset('/'.$imgitem)}}">
                                                <img src="{{asset('/'.$imgitem)}}" alt="zo-th-{{$i}}" />
                                            </a> 
                                        </li> 
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product_d_right"> 
                                <h1>{{$details->title}}</h1> 
                                <div class=" product_ratting">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li class="review"><a href="#"> (  
                                            @if (count($reviews) > 0) 
                                                {{substr($revTotal/count($reviews),0,3)}}
                                                @else
                                                0
                                            @endif
                                            )</a></li>
                                    </ul> 
                                </div>
                                <div class="price_box"> 
                                    @if ($details->discount > 0)
                                        @php
                                            $totalDisc          = ($details->price*$details->discount)/100;
                                            $priceWithDiscount  = $details->price-$totalDisc;
                                        @endphp
                                            <span class="old_price">${{$details->price}}</span>
                                            <span class="current_price">${{$priceWithDiscount}}</span>
                                        @else
                                        <span class="current_price">${{$details->price}}</span>
                                    @endif    
                                </div>
                                <div class="product_desc">
                                    {!! $details->short_desc !!}
                                </div> 
                                <label id="alertss" style="color: #fdb813"></label>
                                <div class="product_variant quantity">
                                    <label>quantity</label>
                                    <input id="addTocatfrom_details_qty" min="1" max="{{$details->quantity}}" value="1" type="number">
                                    <button id="addTocatfrom_details" data-id="{{$details->id}}" data-price="{{$details->price}}" class="button">add to cart</button> 
                                </div>
                                <div class=" product_d_action">
                                    <ul>
                                        <li><a href="" data-id="{{$details->id}}" data-title="{{$details->title}}" id="addtoWhish" title="Add to wishlist">+ Add to Wishlist</a></li>
                                        <li><a href="" data-id="{{$details->id}}" data-title="{{$details->title}}" id="addtoCompare" title="Add to wishlist">+ Compare</a></li>
                                    </ul>
                                </div>
                                <div class="product_meta">
                                    <span>Category: <a>{{$Categ->name}}</a></span>
                                </div>
    
                            <div class="priduct_social">
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_pinterest"></a>
                                    <a class="a2a_button_email"></a>
                                    <a class="a2a_button_reddit"></a>
                                    <a class="a2a_button_linkedin"></a>
                                    <a class="a2a_button_telegram"></a>
                                    <a class="a2a_button_pocket"></a>
                                    <a class="a2a_button_tumblr"></a>
                                </div> 
                                <!-- AddToAny END --> 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product details end--> 
     
        <!--product info start-->
        <div class="product_d_info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                    </li> 
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false" id="review_count">Reviews ({{count($reviews)}})</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        {!! $details->full_desc !!}
                                    </div>
                                </div> 
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        
                                        <h2>
                                            @if (count($reviews) > 0) 
                                                {{substr($revTotal/count($reviews),0,3)}}/5
                                                @else
                                                0/5
                                            @endif
                                        </h2>


                                        <div class="all_feeds">
                                            @foreach ($reviews as $reviewitem)
                                                <div class="reviews_comment_box">
                                                    <div class="comment_thmb">
                                                        <img src="{{asset('front')}}/assets/img/blog/comment2.jpg" alt="">
                                                    </div>
                                                    <div class="comment_text">
                                                        <div class="reviews_meta">
                                                            <div class="star_rating">
                                                                <ul> 
                                                                <li><a href="#">{{$reviewitem->rate}}<i class="ion-ios-star"></i></a></li>    
                                                                </ul>
                                                            </div>
                                                            <p><strong>{{$reviewitem->name}} </strong>-  
                                                                @if ($reviewitem->created_at)
                                                                {{$reviewitem->created_at->diffForHumans()}}
                                                                @endif
                                                            </p>
                                                            <span>{{$reviewitem->review}}</span>
                                                        </div>
                                                    </div> 
                                                </div>  
                                            @endforeach
                                        </div>


                                        <div class="comment_title">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked </p>
                                        </div>
                                        
                                        <form id="product_reviewsssss" data-id="{{$details->id}}">
                                            <div class="product_ratting mb-10">
                                                <h3>Your rating</h3>
                                                <div class="radio-stars">
                                                        <input class="sr-only" id="radio-5" name="radio_star" type="radio" value="5" />
                                                    <label class="radio-star" for="radio-5">5</label>
                                                        <input class="sr-only" id="radio-4" name="radio_star" type="radio" value="4" />
                                                    <label class="radio-star" for="radio-4">4</label>
                                                        <input class="sr-only" id="radio-3" name="radio_star" type="radio" value="3" />
                                                    <label class="radio-star" for="radio-3">3</label>
                                                        <input class="sr-only" id="radio-2" name="radio_star" type="radio" value="2" />
                                                    <label class="radio-star" for="radio-2">2</label>
                                                        <input class="sr-only" id="radio-1" name="radio_star" type="radio" value="1" />
                                                    <label class="radio-star" for="radio-1">1</label> 
                                                </div> 
                                            </div>
                                            <div class="product_review_form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="review_comment">Your review </label>
                                                            <textarea name="comment" id="review_comment"></textarea>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="author">Name</label>
                                                            <input name="author" type="text">

                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="email">Email </label>
                                                            <input name="email" type="email">
                                                        </div>
                                                    </div>
                                                    <button id="smbt" type="submit">Submit</button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product info end--> 

        <!--product area start-->
        <section class="product_area mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Related Products</h2>
                        </div>
                        <div class="product_carousel product_column5 owl-carousel">

                            @php
                                $related = App\Product::where('id', '!=', $details->id)->where('subcategory', $details->subcategory)->latest()->get(); 
                            @endphp
                            @foreach ($related as $newArrives)
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
                </div>
            </div>
        </section>
        <!--product area end-->
  
    @endforeach


@endsection