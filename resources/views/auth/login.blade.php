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
    <body id="main-container" class="default"> 



        <div class="container">
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12">
                    <form method="POST" action="{{ route('login') }}" class="row row-eq-height lockscreen  mt-5 mb-5">
                        @csrf 
                        <div class="lock-image col-12 col-sm-5"></div>
                        <div class="login-form col-12 col-sm-7">
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input id="email" id="emailaddress" rtype="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div> 
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> 
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                            </div> 
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>  
                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div> 
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div> 
                        </div>
                    </form>
                </div>

            </div>
        </div>





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
        <script src="{{asset('admin')}}/dist/vendors/chartjs/Chart.min.js"></script>  
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
    </body>
    <!-- END: Body--> 
</html>
