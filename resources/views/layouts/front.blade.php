
<!doctype html>
<html class="no-js" lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Esther - Car Accessories Shop HTML Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- CSS 
    ========================= -->
     <!--bootstrap min css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/font.awesome.css">
    <!--font ionicons css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/ionicons.min.css">
    <!--animate css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/slinky.menu.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('front')}}/assets/css/style.css">
    
    <!--modernizr min js here-->
    <script src="{{asset('front')}}/assets/js/vendor/modernizr-3.7.1.min.js"></script>

</head>

<body>

    <!-- Main Wrapper Start -->
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="icon-x"></i></a>  
                        </div>
                        <div class="welcome_text">
                            <p>Welcome to our store!</p>
                        </div>
                         <div class="top_right">
                            <ul>
                                <li><a href="compare.html"><i class="icon-repeat"></i> Compare (0)</a></li>
                                <li><a href="wishlist.html"><i class="icon-heart"></i> Wishlist (0)</a></li>
                                <li class="top_links"><a href="#">Setting<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="checkout.html">Checkout </a></li>
                                        <li><a href="my-account.html">My Account </a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="currency"><a href="#">$ USD<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">EUR – Euro</a></li>
                                        <li><a href="#">GBP – British Pound</a></li>
                                        <li><a href="#">INR – India Rupee</a></li>
                                    </ul>
                                </li>
                                <li class="language"><a href="#"><img src="{{asset('front')}}/assets/img/logo/language.png" alt="">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#"><img src="{{asset('front')}}/assets/img/logo/language.png" alt=""> English</a></li>
                                        <li><a href="#"><img src="{{asset('front')}}/assets/img/logo/language2.png" alt=""> Germany</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <div class="search-container">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." type="text">
                                    <button type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="customer_support">
                            <div class="support_img_icon">
                                <img src="{{asset('front')}}/assets/img/icon/icon_phone.png" alt="">
                            </div>
                            <div class="customer_support_text">
                                <p>
                                    <span>Customer Support</span>
                                    <a href="tel:(08)12345789">(08)12345789</a>
                                </p>
                            </div>
                        </div>
                        <div class="mini_cart_canvas">
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><span class="icon-shopping-cart"></span>$67.71 </a>
                                <span class="cart_quantity">2</span>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{asset('front')}}/assets/img/s-product/product.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Madden by Steve Madden Cale 6</a>

                                            <span class="quantity">Qty: 1</span>
                                            <span class="price_cart">$60.00</span>

                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{asset('front')}}/assets/img/s-product/product2.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Calvin Klein Jeans Reflective Logo Full Zip </a>
                                            <span class="quantity">Qty: 1</span>
                                            <span class="price_cart">$69.00</span>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Sub total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.html">View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.html">Checkout</a>
                                        </div>

                                    </div>

                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li><a href="index-5.html">Home 5</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop Layouts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">shop</a></li>
                                                <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                <li><a href="shop-list.html">List View</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">other Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">my account</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Product Types</a>
                                            <ul class="sub-menu">
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="product-sidebar.html">product sidebar</a></li>
                                                <li><a href="product-grouped.html">product grouped</a></li>
                                                <li><a href="variable-product.html">product variable</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">services</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="compare.html">compare</a></li>
                                        <li><a href="privacy-policy.html">privacy policy</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="my-account.html">my account</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="contact.html"> Contact Us</a> 
                                </li>
                            </ul>
                        </div>

                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->
    
    <!--header area start-->
    <header class="header_area header_three">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-9">
                        <div class="welcome_text">
                            <p>Welcome to our store!</p>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="top_right text-right">
                            <ul> 
                                <li class="language"><div id="google_translate_element"></div></li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->
        
        <!--header middel start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{asset('front')}}/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="search-container search_three">
                            <form action="{{url('shop/shearch')}}" method="GET">
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." name="search_key" type="text">
                                    <button type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div> 


                    @php
                        
                        $totalCost = App\Product::latest()->get();  
                        $qtw     = App\whishList::all()->where('status', 1)->where('ip_address', request()->ip());
                    @endphp


                    <div class="col-lg-3">
                        <div class="header_cart_wishlist">   
                            <div class="header_wishlist_btn">
                                <a href="{{url('/home/go/to/whish')}}"><i class="icon-heart"></i></a>
                                 <span class="wishlist_quantity">{{count($qtw)}}</span>
                            </div>     
                             
                            @php
                                $qt     = App\AddCart::where('ip_address', request()->ip())->where('status', 1)->sum('qty');
                                $prc    = App\AddCart::where('ip_address', request()->ip())->where('status', 1)->sum('price');
                                $total  = $qt*$prc;
                            @endphp
                            <div class="mini_cart_wrapper text-right">
                                <a href="{{url('home/cart')}}"><span class="icon-shopping-cart"></span><span id="totalitemPrice">{{$total}}$</span></a>
                                <span class="cart_quantity">{{$qt}}</span> 
                                <!--mini cart end-->
                            </div>
                        </div>     
                    </div> 
                </div>
            </div>
        </div>
        <!--header middel end-->

        <!--header bottom satrt-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="header_bottom_container3">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">All Categories </h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>

                                        @php
                                            $cateData = App\Category::latest()->get();
                                        @endphp
                                        @foreach ($cateData as $Category_item)  

                                        <li class="menu_item_children"><a>{{$Category_item->name}}<i class="fa fa-angle-right"></i></a>
                                            <ul class="categories_mega_menu"> 
                                                    @php
                                                        $sbcateData = App\subcategory::where('category_id', $Category_item->id)->latest()->get();
                                                    @endphp
                                                    @foreach ($sbcateData as $sub_item) 
                                                        <li class="menu_item_children"><a href="{{url('/shop/sub/category/'.$sub_item->sub_name)}}">{{$sub_item->sub_name}}</a>
                                                            <ul class="categorie_sub_menu"> 
                                                                @php
                                                                    $unsbcateData = App\UnderSub::where('sub_category', $sub_item->id)->latest()->get();
                                                                @endphp
                                                                @foreach ($unsbcateData as $unsub_item)    
                                                                    <li><a href="{{url('/shop/sub/under/category/'.$unsub_item->under_sub_category)}}">{{$unsub_item->under_sub_category}}</a></li>  
                                                                @endforeach 
                                                            </ul>
                                                        </li>  
                                                    @endforeach 
                                            </li>
                                        </ul> 
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>  
                        <div class="col-lg-9">
                            <div class="main_menu menu_three header_position">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="{{url('/')}}">home</a></li>
                                        <li class="mega_items"><a href="{{url('/shop')}}">shop <i class="fa fa-angle-down"></i></a>
                                            <div class="mega_menu">
                                                <ul class="mega_menu_inner">
                                                    @php
                                                        $cateData = App\Category::latest()->get();
                                                    @endphp
                                                    @foreach ($cateData as $Category_item)
                                                        <li><a>{{$Category_item->name}}</a>
                                                            <ul>
                                                                @php
                                                                    $sbcateData = App\subcategory::where('category_id', $Category_item->id)->latest()->get();
                                                                @endphp
                                                                @foreach ($sbcateData as $sub_item) 
                                                                    <li><a href="{{url('/shop/sub/category/'.$sub_item->sub_name)}}">{{$sub_item->sub_name}}</a></li> 
                                                                @endforeach 
                                                            </ul>
                                                        </li>  
                                                    @endforeach
                                                </ul> 
                                            </div>
                                        </li>
                                        <li><a href="{{url('home/all/blog')}}">blog</a></li> 
                                        <li><a href="{{url('home/contact')}}"> Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->

    </header>
    <!--header area end-->
 
    
    @yield('frontend')  
    
        
    @php
        $infoData = App\About::latest()->get();
    @endphp

    @foreach ($infoData as $infors_item)
    <!--footer area start-->
    <footer class="footer_widgets footer_three">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-5">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="{{url('/')}}"><img src="{{asset('/'.$infors_item->logo)}}" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p>{{substr($infors_item->about_desc,0,100)}}...</p>
                                <div class="customer_support">
                                    <div class="support_img_icon">
                                        <img src="{{asset('front')}}/assets/img/icon/hotline.png" alt="">
                                    </div>
                                    <div class="customer_support_text">
                                        <p>
                                            <span>Customer Support</span>
                                            <a href="tel:{{$infors_item->number}}">{{$infors_item->number}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-7">
                        <div class="widgets_container widgets_subscribe">
                            <h3>Subscribe newsletter to get updated</h3>
                            <div class="subscribe_form">
                                <form class="footer-newsletter" id="emls">
                                    <input type="email" name="email" id="email" placeholder="Enter you email address here..." />
                                    <button type="submit">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                             <p>We’ll never share your email address with a third-party.</p>
                             <div class="footer_social">
                                 <ul>
                                     <li><a class="facebook" href="{{$infors_item->fb}}"><i class="ion-social-facebook"></i></a></li>
                                     <li><a class="twitter" href="{{$infors_item->tw}}"><i class="ion-social-twitter"></i></a></li>
                                     <li><a class="twitter" href="{{$infors_item->lk}}"><i class="ion-social-linkedin"></i></a></li>
                                     <li><a class="instagram" href="{{$infors_item->ins}}"><i class="ion-social-instagram"></i></a></li>
                                     <li><a class="instagram" href="{{$infors_item->pin}}"><i class="ion-social-pinterest"></i></a></li>
                                     <li><a class="youtube" href="{{$infors_item->yt}}"><i class="ion-social-youtube"></i></a></li> 
                                 </ul>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <div class="row">
                                    @php
                                        $pagess = App\Pages::where('status', 1)->latest()->get(); 
                                    @endphp 
                                    @foreach ($pagess as $single_page) 
                                        <div class="col-md-6">
                                            <ul> 
                                                <li><a href="{{url('/home/page/'.$single_page->name)}}">{{$single_page->name}}</a></li> 
                                            </ul> 
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                        <p>Copyright &copy; {{date('Y')}} . All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <img src="{{asset('/'.$infors_item->payment)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end--> 

    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="product_preview">
                    <div class="modal_body">
                         
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal area end-->


 
    <!-- JS
    ============================================ -->
     <!--map js code here-->
    <!--jquery min js-->
    <script src="{{asset('front')}}/assets/js/vendor/jquery-3.4.1.min.js"></script>
     <script src=" https://cdn.jsdelivr.net/gmap3/7.2.0/gmap3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!--popper min js-->
    <script src="{{asset('front')}}/assets/js/popper.js"></script>
    <!--bootstrap min js-->
    <script src="{{asset('front')}}/assets/js/bootstrap.min.js"></script>
    <!--owl carousel min js-->
    <script src="{{asset('front')}}/assets/js/owl.carousel.min.js"></script>
    <!--slick min js-->
    <script src="{{asset('front')}}/assets/js/slick.min.js"></script>
    <!--magnific popup min js-->
    <script src="{{asset('front')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <!--jquery countdown min js-->
    <script src="{{asset('front')}}/assets/js/jquery.countdown.js"></script>
    <!--jquery ui min js-->
    <script src="{{asset('front')}}/assets/js/jquery.ui.js"></script>
    <!--jquery elevatezoom min js-->
    <script src="{{asset('front')}}/assets/js/jquery.elevatezoom.js"></script>
    <!--isotope packaged min js-->
    <script src="{{asset('front')}}/assets/js/isotope.pkgd.min.js"></script>
    <!--slinky menu js-->
    <script src="{{asset('front')}}/assets/js/slinky.menu.js"></script>
    <!-- Plugins JS -->
    <script src="{{asset('front')}}/assets/js/plugins.js"></script> 
    <!-- Main JS -->
    <script src="{{asset('front')}}/assets/js/main.js"></script> 
    <script src="{{asset('front')}}/assets/js/custom_ajax.js"></script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>  
    @php 
        $lat    = $infors_item->lat;
        $long   = $infors_item->long;
    @endphp
        <script>
            $(function () {
            var cluster, marker;
        
            $('#test')
                .gmap3({
                center: [{{$lat}},{{$long}}],
                zoom: 4
                })
                .cluster({
                    size: 200,
                    markers: [
                    {position: [49.28952958093682, 6.152559438984804]},
                    {position: [44.28952958093682, 6.152559438984804]},
                    {position: [49.28952958093682, -1.1501188139848408]},
                    {position: [44.28952958093682, -1.1501188139848408]}
                    ],
                    cb: function (markers) {
                    if (markers.length > 1) { // 1 marker stay unchanged (because cb returns nothing)
                        return {
                        content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
                        x: -26,
                        y: -26
                        };
                    }
                    }
                })
                .then(function (_cluster) {
                cluster = _cluster;
                })
                .marker({
                position:[50.92104315206032, 2.1936031249999814],
                draggable: true
                })
                .then(function (_marker) {
                    marker = _marker;
                })
                .on({
                click: function () {
                    alert("I was the one !")
                }
                })
            ;
        
            $('button').click(function () {
                cluster.add(marker);
            });
            });
      </script> 
        <script> 
            // Custom Scripts 
            function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            } 
            // Minified Scripts
            (function(){var gtConstEvalStartTime = new Date();
            function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
            function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
            if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='440335.1449305758';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
        </script> 
    @endforeach


    {{-- <script>
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.amount = $('#total_amount').val();

        $('#sslczPayBtn').prop('postdata', obj);

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script> --}}
</body> 
</html>