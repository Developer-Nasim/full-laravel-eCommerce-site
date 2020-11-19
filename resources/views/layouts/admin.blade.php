<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    
    <!-- Mirrored from html.designstream.co.in/liner/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Nov 2020 09:00:41 GMT -->
    <head>
        <meta charset="UTF-8">
        <title>Liner Admin</title>
        <link rel="shortcut icon" href="{{asset('admin')}}/dist/images/favicon.ico" />
        <meta name="viewport" content="width=device-width,initial-scale=1"> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- START: Template CSS-->
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/simple-line-icons/css/simple-line-icons.css">        
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/flags-icon/css/flag-icon.min.css"> 
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/flag-select/css/flags.css">
        <!-- END Template CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet"  href="{{asset('admin')}}/dist/vendors/chartjs/Chart.min.css"> 
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/datatable/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css"/>
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/summernote/summernote-bs4.css" />
        <!-- END: Page CSS-->

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/morris/morris.css"> 
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css"> 
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/chartjs/Chart.min.css"> 
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/starrr/starrr.css"> 
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/ionicons/css/ionicons.min.css"> 
        <link rel="stylesheet" href="{{asset('admin')}}/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="{{asset('admin')}}/dist/css/main.css">
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default">

        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <img src="{{asset('admin')}}/dist/images/logo.png" alt="logo" width="23" class="img-fluid"/>
        </div>
        <!-- END: Pre Loader-->

        <!-- START: Header-->
        <div id="header-fix" class="header fixed-top">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="navbar-header h4 mb-0 align-self-center logo-bar text-center">  
                    <a href="index.html" class="horizontal-logo text-center">
                        @php
                            $infoData = App\About::latest()->get();
                        @endphp 
                        @foreach ($infoData as $infors_item)
                            <span class="h3 align-self-center mb-0 "><a href="{{url('/admin/home')}}"><img src="{{asset('/'.$infors_item->logo)}}" alt=""></a></span>     
                        @endforeach         
                    </a>                   
                </div>
                <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                    <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu body-color"></i></a>
                </div> 
                <div class="navbar-right ml-auto h-100">
                    <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100"> 
                        <li class="dropdown align-self-center d-inline-block"><a href="{{url('/')}}" target="_blank" class="btn btn-primary" style="    
                            color: #fff;
                            padding: 5px 10px;">Visit website</a></li>
                        <li class="dropdown user-profile align-self-center d-inline-block">
                            <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false"> 
                                <div class="media">
                                    <span  style="position: relative;top:5px"> Hello, <b>{{Auth::user()->name}}</b></span>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right p-0"> 
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="dropdown-item px-2 text-danger align-self-center d-flex"><span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a> 
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form> 
                            </div>

                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- END: Header-->

        <!-- START: Main Menu-->
        <div class="sidebar">
            <div class="media d-block text-center user-profile"> 
                <div class="media-body text-center mt-0 color-primary mt-2"> 
                    <h6 class="mb-0 font-weight-bold">{{Auth::user()->name}}</h6>
                    <span>{{Auth::user()->email}}</span>
                </div>
            </div>
            
            <!-- START: Menu-->
            <ul id="side-menu" class="sidebar-menu">
                <li class="dropdown active"><a>Dashboard</a>                  
                    <ul>
                        <li class="@yield('home')"><a href="{{url('admin/home')}}"><i class="icon-rocket"></i> Dashboard</a></li>
                    </ul>
                </li> 
                <li class="dropdown active"><a>About info</a>
                    <ul>
                        <li class="@yield('about')"><a href="{{url('/admin/about/all')}}"><i class="icon-rocket"></i>About</a></li> 
                    </ul>
                </li>
                <li class="dropdown active"><a>Header slider</a>
                    <ul>
                        <li class="@yield('sliders')"><a href="{{url('/admin/header/slider')}}"><i class="icon-rocket"></i>Add slider</a></li>
                        <li class="@yield('allsliders')"><a href="{{url('/admin/header/all/slider')}}"><i class="icon-rocket"></i>All sliders</a></li>
                    </ul>
                </li>
                <li class="dropdown active"><a>Banner</a>                  
                    <ul>
                        <li class="@yield('banner')"><a href="{{url('/admin/banner')}}"><i class="icon-rocket"></i>Banner</a></li>
                    </ul>
                </li> 
                <li class="dropdown active"><a>Brands</a>                  
                    <ul>
                        <li class="@yield('brand')"><a href="{{url('admin/brand')}}"><i class="icon-rocket"></i>Brands</a></li>
                    </ul>
                </li> 
                <li class="dropdown active"><a>Category</a>                  
                    <ul>
                        <li class="@yield('category')"><a href="{{url('admin/category')}}"><i class="icon-rocket"></i>Category</a></li>
                        <li class="@yield('subcategory')"><a href="{{url('admin/subcategory')}}"><i class="icon-rocket"></i>Sub Category</a></li> <!--sub -->
                        <li class="@yield('undersubcategory')"><a href="{{url('admin/undersubcategory')}}"><i class="icon-rocket"></i>Under Sub Category</a></li> <!--under -->
                    </ul>
                </li> 
                <li class="dropdown active"><a>order</a>                  
                    <ul> 
                        <li class="@yield('order')"><a href="{{url('admin/order')}}"><i class="icon-rocket"></i>Orders verify</a></li>
                    </ul>
                </li>  
                <li class="dropdown active"><a>Product</a>                  
                    <ul>
                        <li class="@yield('all_product')"><a href="{{url('admin/all/products')}}"><i class="icon-rocket"></i>All Products</a></li> <!--sub -->
                        <li class="@yield('product')"><a href="{{url('admin/products')}}"><i class="icon-rocket"></i>Add Product</a></li>
                        {{-- <li class="@yield('undersubcategory')"><a href="{{url('admin/undersubcategory')}}"><i class="icon-rocket"></i>Under Sub Category</a></li>  --}}
                    </ul>
                </li>  
                <li class="dropdown active"><a>Coupon</a>                  
                    <ul>
                        <li class="@yield('coupon')"><a href="{{url('/admin/coupon')}}"><i class="icon-rocket"></i>Coupon</a></li>
                    </ul>
                </li>  
                <li class="dropdown"><a>Blog</a>                  
                    <ul>
                        <li class="@yield('allblog')"><a href="{{url('/admin/all/blogs')}}"><i class="icon-rocket"></i>All blogs</a></li>
                        <li class="@yield('blog')"><a href="{{url('/admin/add/blog')}}"><i class="icon-rocket"></i>Add post</a></li>
                    </ul>
                </li> 
                <li class="dropdown active"><a>Make Page</a>
                    <ul>
                        <li class="@yield('pages')"><a href="{{url('/admin/pages/all')}}"><i class="icon-rocket"></i>All Pages</a></li>
                        <li class="@yield('sliders')"><a href="{{url('/admin/pages/make_new')}}"><i class="icon-rocket"></i>Make new page</a></li>
                    </ul>
                </li> 



            </ul>
            <!-- END: Menu-->
        </div>
        <!-- END: Main Menu-->




        @yield('admin')






        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center"> 
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->

        <!-- START: Chat Button-->
        <a href="#" class="chatbutton text-center"> 
            <i class="icon-speech"></i>
        </a>
        <div class="card border h-50 chatwindow mx-3">
            <div class="card-body p-0">                          
                <ul class="nav flex-column chat-menu" id="myTab3" role="tablist">
                    <li class="nav-item active px-3">                                               
                        <div class="media d-block d-flex text-left py-3">
                            <img class="img-fluid  mr-3 rounded-circle" src="{{asset('admin')}}/dist/images/author2.jpg" alt="">
                            <div class="media-body align-self-center mt-0  d-flex">
                                <div class="message-content"> <h6 class="mb-1 font-weight-bold d-flex">Harry Jones</h6>
                                    typing ... 
                                    <br>
                                </div>
                                <div class="call-button ml-auto">
                                    <a href="#" class="call h4" data-toggle="modal" data-target="#call1"><i class="icon-phone"></i></a>
                                    <a href="#" class="video-call h4" data-toggle="modal" data-target="#call1"><i class="icon-camrecorder"></i></a>
                                </div>
                            </div>
                        </div>                                               
                    </li>
                </ul>

                <div class="popupchat p-3">                                            
                    <div class="media d-flex  mb-4">
                        <div class="p-3 ml-auto speech-bubble">
                            Hello John, how can I help you today ?
                        </div>
                        <div class="ml-4"><a href="#"><img src="{{asset('admin')}}/dist/images/author2.jpg" alt="" class="img-fluid rounded-circle" /></a></div>
                    </div>
                    <div class="media d-flex mb-4">
                        <div class="mr-4 thumb-img"><a href="#"><img src="{{asset('admin')}}/dist/images/author3.jpg" alt="" class="img-fluid rounded-circle" /></a></div>
                        <div class="p-3 mr-auto speech-bubble alt">
                            Hi, I want to buy a new shoes.
                        </div>
                    </div>
                    <div class="media d-flex mb-4">
                        <div class="p-3 ml-auto speech-bubble">
                            Shipment is free. You'll get your shoes tomorrow!<br/>

                        </div>
                        <div class="ml-4"><a href="#"><img src="{{asset('admin')}}/dist/images/author2.jpg" alt="" class="img-fluid rounded-circle" /></a></div>
                    </div> 
                </div>
                <div class="border-top theme-border px-2 py-3 d-flex">
                    <input type="text" class="form-control mr-2" placeholder="Type message here ..." />
                    <a href="#" class="ml-auto rounded  p-2 m-0 my-auto bg-success text-white"><i class="icon-link"></i></a> 
                    <a href="#" class="p-2 ml-2 rounded line-height-21 bg-primary text-white"><i class="icon-cursor align-middle"></i></a>
                </div>
            </div>
        </div>
        <!-- END: Chat Button-->
         

        <!-- START: Template JS-->
        <script src="{{asset('admin')}}/dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/moment/moment.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="{{asset('admin')}}/dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/flag-select/js/jquery.flagstrap.min.js"></script> 
        <!-- END: Template JS-->

        <!-- START: APP JS-->
        <script src="{{asset('admin')}}/dist/js/app.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/summernote/summernote-bs4.js"></script>
        <script src="{{asset('admin')}}/dist/js/summernote.script.js"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="{{asset('admin')}}/dist/vendors/raphael/raphael.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/morris/morris.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/chartjs/Chart.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/starrr/starrr.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.canvaswrapper.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.colorhelpers.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.flot.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.flot.saturated.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.flot.browser.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.flot.drawSeries.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.flot.uiConstants.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.flot.legend.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-flot/jquery.flot.pie.js"></script>       
        <script src="{{asset('admin')}}/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>   
        <script src="{{asset('admin')}}/dist/vendors/datatable/js/jquery.dataTables.min.js"></script> 
        <script src="{{asset('admin')}}/dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/jszip/jszip.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/buttons/js/buttons.colVis.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/buttons/js/buttons.flash.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('admin')}}/dist/vendors/datatable/buttons/js/buttons.print.min.js"></script>  
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <script src="{{asset('admin')}}/dist/js/home.script.js"></script>
        <script src="{{asset('admin')}}/dist/js/datatable.script.js"></script>
        <script src="{{asset('admin')}}/dist/custom_ajax.js"></script>
        <!-- END: Page JS--> 
        <script>
            (function ($) {
                "use strict";
                var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
                var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
                var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');

            
                ////////////////////////////////// Line Basic //////////////////////////////
                var config = {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Aug'],
                        datasets: [{
                                label: 'My First dataset',
                                backgroundColor: primarycolor,
                                borderColor: primarycolor,
                                data: [0, 66, 90, 55, 65, 58, 97, 30],
                                fill: false,
                            }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                            display: false,
                            labels: {
                                fontColor: bodycolor
                            }
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true
                                    },
                                    gridLines: {
                                        display: true,
                                        color: bordercolor,
                                        zeroLineColor: bordercolor
                                    },
                                    ticks: {
                                        fontColor: bodycolor,

                                    }
                                }],
                            yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true
                                    },
                                    gridLines: {
                                        display: true,
                                        color: bordercolor,
                                        zeroLineColor: bordercolor
                                    },
                                    ticks: {
                                        fontColor: bodycolor,

                                    }
                                }]
                        }
                    }
                };

                var chartjs_line_basic = document.getElementById("chartjs-line-basic");
                if (chartjs_line_basic) {
                    var ctx = document.getElementById('chartjs-line-basic').getContext('2d');
                    window.myLine = new Chart(ctx, config);
                }

                ////////////////////////////////////// Area Chart Boundries /////////////////
                var chartjs_area_boundaries = document.getElementById("chartjs-area-boundary");
                if (chartjs_area_boundaries) { 
                    var config = {

                        elements: {
                            line: {
                                tension: 0.000001
                            }
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        legend: {
                            display: false,
                            position: 'top',
                            labels: {
                                fontColor: bodycolor
                            }
                        },

                        scales: {
                            x: {
                                ticks: {
                                    autoSkip: false,
                                    maxRotation: 0
                                }
                            },
                            xAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: true,
                                        color: bordercolor,
                                        zeroLineColor: bordercolor
                                    },
                                    ticks: {
                                        fontColor: bodycolor,

                                    },
                                }],
                            yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: true,
                                        color: bordercolor,
                                        zeroLineColor: bordercolor
                                    },
                                    ticks: {
                                        fontColor: bodycolor,

                                    }
                                }]

                        }
                    }; 
                    new Chart('chartjs-area-boundary', {
                        type: 'line',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            datasets: [{
                                    backgroundColor: 'rgba(163, 85, 255, 0.4)',
                                    borderColor: primarycolor,
                                    data: [20, 66, 90, 55, 65, 58, 97],
                                    label: 'Dataset',
                                    fill: 'start'
                                }]
                        },
                        options: Chart.helpers.merge(config)
                    }); 
                }
                var gdpData = {
                    "AF": 16.63,
                    "AL": 11.58,
                    "DZ": 158.97,
                    "AO": 85.81,
                    "AG": 1.1,
                    "AR": 351.02,
                    "AM": 8.83,
                    "AU": 1219.72,
                    "AT": 366.26,
                    "AZ": 52.17,
                    "BS": 7.54,
                    "BH": 21.73,
                    "BD": 105.4,
                    "BB": 3.96,
                    "BY": 52.89,
                    "BE": 461.33,
                    "BZ": 1.43,
                    "BJ": 6.49,
                    "BT": 1.4,
                    "BO": 19.18,
                    "BA": 16.2,
                    "BW": 12.5,
                    "BR": 2023.53,
                    "BN": 11.96,
                    "BG": 44.84,
                    "BF": 8.67,
                    "BI": 1.47,
                    "KH": 11.36,
                    "CM": 21.88,
                    "CA": 1563.66,
                    "CV": 1.57,
                    "CF": 2.11,
                    "TD": 7.59,
                    "CL": 199.18,
                    "CN": 5745.13,
                    "CO": 283.11,
                    "KM": 0.56,
                    "CD": 12.6,
                    "CG": 11.88,
                    "CR": 35.02,
                    "CI": 22.38,
                    "HR": 59.92,
                    "CY": 22.75,
                    "CZ": 195.23,
                    "DK": 304.56,
                    "DJ": 1.14,
                    "DM": 0.38,
                    "DO": 50.87,
                    "EC": 61.49,
                    "EG": 216.83,
                    "SV": 21.8,
                    "GQ": 14.55,
                    "ER": 2.25,
                    "EE": 19.22,
                    "ET": 30.94,
                    "FJ": 3.15,
                    "FI": 231.98,
                    "FR": 2555.44,
                    "GA": 12.56,
                    "GM": 1.04,
                    "GE": 11.23,
                    "DE": 3305.9,
                    "GH": 18.06,
                    "GR": 305.01,
                    "GD": 0.65,
                    "GT": 40.77,
                    "GN": 4.34,
                    "GW": 0.83,
                    "GY": 2.2,
                    "HT": 6.5,
                    "HN": 15.34,
                    "HK": 226.49,
                    "HU": 132.28,
                    "IS": 12.77,
                    "IN": 1430.02,
                    "ID": 695.06,
                    "IR": 337.9,
                    "IQ": 84.14,
                    "IE": 204.14,
                    "IL": 201.25,
                    "IT": 2036.69,
                    "JM": 13.74,
                    "JP": 5390.9,
                    "JO": 27.13,
                    "KZ": 129.76,
                    "KE": 32.42,
                    "KI": 0.15,
                    "KR": 986.26,
                    "UNDEFINED": 5.73,
                    "KW": 117.32,
                    "KG": 4.44,
                    "LA": 6.34,
                    "LV": 23.39,
                    "LB": 39.15,
                    "LS": 1.8,
                    "LR": 0.98,
                    "LY": 77.91,
                    "LT": 35.73,
                    "LU": 52.43,
                    "MK": 9.58,
                    "MG": 8.33,
                    "MW": 5.04,
                    "MY": 218.95,
                    "MV": 1.43,
                    "ML": 9.08,
                    "MT": 7.8,
                    "MR": 3.49,
                    "MU": 9.43,
                    "MX": 1004.04,
                    "MD": 5.36,
                    "MN": 5.81,
                    "ME": 3.88,
                    "MA": 91.7,
                    "MZ": 10.21,
                    "MM": 35.65,
                    "NA": 11.45,
                    "NP": 15.11,
                    "NL": 770.31,
                    "NZ": 138,
                    "NI": 6.38,
                    "NE": 5.6,
                    "NG": 206.66,
                    "NO": 413.51,
                    "OM": 53.78,
                    "PK": 174.79,
                    "PA": 27.2,
                    "PG": 8.81,
                    "PY": 17.17,
                    "PE": 153.55,
                    "PH": 189.06,
                    "PL": 438.88,
                    "PT": 223.7,
                    "QA": 126.52,
                    "RO": 158.39,
                    "RU": 1476.91,
                    "RW": 5.69,
                    "WS": 0.55,
                    "ST": 0.19,
                    "SA": 434.44,
                    "SN": 12.66,
                    "RS": 38.92,
                    "SC": 0.92,
                    "SL": 1.9,
                    "SG": 217.38,
                    "SK": 86.26,
                    "SI": 46.44,
                    "SB": 0.67,
                    "ZA": 354.41,
                    "ES": 1374.78,
                    "LK": 48.24,
                    "KN": 0.56,
                    "LC": 1,
                    "VC": 0.58,
                    "SD": 65.93,
                    "SR": 3.3,
                    "SZ": 3.17,
                    "SE": 444.59,
                    "CH": 522.44,
                    "SY": 59.63,
                    "TW": 426.98,
                    "TJ": 5.58,
                    "TZ": 22.43,
                    "TH": 312.61,
                    "TL": 0.62,
                    "TG": 3.07,
                    "TO": 0.3,
                    "TT": 21.2,
                    "TN": 43.86,
                    "TR": 729.05,
                    "TM": 0,
                    "UG": 17.12,
                    "UA": 136.56,
                    "AE": 239.65,
                    "GB": 2258.57,
                    "US": 14624.18,
                    "UY": 40.71,
                    "UZ": 37.72,
                    "VU": 0.72,
                    "VE": 285.21,
                    "VN": 101.99,
                    "YE": 30.02,
                    "ZM": 15.69,
                    "ZW": 5.57
                };
            
                //////////////////// World Map  /////////////////////
                $('#world-map-gdp').vectorMap({
                    map: 'world_mill',
                    backgroundColor: 'transparent',
                    series: {
                        regions: [{
                                values: gdpData,
                                scale: ['#ccc', '#ccc'],
                                normalizeFunction: 'polynomial'
                            }]
                    },
                    onRegionTipShow: function (e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                }); 
            })(jQuery);
        </script>
    </body>
    <!-- END: Body--> 
</html>