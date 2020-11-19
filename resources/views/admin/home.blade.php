@extends('layouts.admin')
@section('home') active @endsection
@section('admin') 
    <!-- START: Main Content-->
    <main>
        <div class="container-fluid"> 

            <!-- START: Breadcrumbs-->
            <div class="row">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4> <b>Welcome {{Auth::user()->name}}</b></div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{url('/admin/home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="icon-basket icons card-liner-icon mt-2"></i>
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">2,390</h2>
                                    <h6 class="card-liner-subtitle">Today's Orders</h6> 
                                </div>                                
                            </div>
                            <i class="icon-settings icons card-liner-absolute-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="icon-bag icons card-liner-icon mt-2"></i>
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">${{$tpayments}}</h2>
                                    <h6 class="card-liner-subtitle">Total Sale</h6>
                                </div>                                
                            </div>
                            <i class="icon-refresh icons card-liner-absolute-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="icon-basket icons card-liner-icon mt-2"></i> 
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">{{$totalOrder}}</h2>
                                    <h6 class="card-liner-subtitle">Total Order</h6> 
                                </div>                                
                            </div>
                            <i class="icon-settings icons card-liner-absolute-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="icon-user icons card-liner-icon mt-2"></i>
                                <div class='card-liner-content'>
                                    <h2 class="card-liner-title">9,390</h2>
                                    <h6 class="card-liner-subtitle">Today's Visitors</h6> 
                                </div>                                
                            </div>
                            <span class="bg-primary card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span>
                        </div>
                    </div>
                </div>
                <div class="col-12  mt-3">
                    <div class="card">                           
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">                                        
                                    <div class="col-12 col-md-6 border-right">
                                        <div class="card-header pl-0">                               
                                            <h4 class="card-title">Sales Report</h4>                                                
                                        </div>
                                        <div class="mb-3">
                                            <label class="chkbox smallchk">                                                     
                                                Year
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="chkbox smallchk ml-2">                                                     
                                                Month
                                                <input checked="checked" type="checkbox" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="chkbox smallchk ml-2">                                                     
                                                Week
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <canvas id="chartjs-line-basic" class="mb-3"></canvas>

                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <h6>This Month</h6>                                                
                                                <h2 class="mb-0 h1">5,480 <i class="ion ion-arrow-graph-up-right text-success"></i></h2> 
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <h6>Last Month</h6>                                                
                                                <h2 class="mb-0 h1">3,584 <i class="ion ion-arrow-graph-down-right text-danger"></i></h2>
                                            </div>                                                
                                        </div>  
                                        <p class="mt-3">Phasellus ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. Phasellus ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card-header pl-0">                               
                                            <h4 class="card-title">Visitors Report</h4>                                                
                                        </div>
                                        <h6 class="card-title mt-3">Top Countries</h6> 
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-lg-3 mb-2">
                                                <div class="text-center p-2 border">
                                                    <div class="flag-wrapper mb-0 w-50">
                                                        <div class="img-thumbnail  flag flag-icon-background flag-icon-us" title="us" id="us">   
                                                        </div>                                                            
                                                    </div>
                                                    <h6 class="mb-0">2,565</h6>
                                                    <h6>USA</h6>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3  mb-2">
                                                <div class="text-center p-2 border">
                                                    <div class="flag-wrapper mb-0 w-50">
                                                        <div class="img-thumbnail  flag flag-icon-background flag-icon-de" title="de" id="de">   
                                                        </div>                                                            
                                                    </div>
                                                    <h6 class="mb-0">1,986</h6>
                                                    <h6>Germany</h6>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3  mb-2">
                                                <div class="text-center p-2 border">
                                                    <div class="flag-wrapper mb-0 w-50">
                                                        <div class="img-thumbnail  flag flag-icon-background flag-icon-fr" title="fr" id="fr">   
                                                        </div>                                                            
                                                    </div>
                                                    <h6 class="mb-0">1,365</h6>
                                                    <h6>France</h6>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3  mb-2">
                                                <div class="text-center p-2 border">
                                                    <div class="flag-wrapper mb-0 w-50">
                                                        <div class="img-thumbnail  flag flag-icon-background flag-icon-in" title="in" id="in">   
                                                        </div>                                                            
                                                    </div>
                                                    <h6 class="mb-0">965</h6>
                                                    <h6>India</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <canvas id="chartjs-area-boundary" class="mt-3"></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
                <div class="col-12 col-md-12 col-lg-12 mt-3">
                    <div class="card">                      
                        <div class="card-content">
                            <div class="card-body">
                                <div id="world-map-gdp" class="w-100 height-350" style="height:393px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content--> 
@endsection