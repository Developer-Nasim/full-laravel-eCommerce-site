@extends('layouts.admin')
@section('about') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">  

            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">About</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">About</li> 
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3 mb-5">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">    
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title">About info</h4>
                                </div>    
                                <div class="col-lg-6 text-right">  </div>    
                            </div>                            
                        </div>
                        @php
                            $infoData = App\About::latest()->get();
                        @endphp
                        @if (count($infoData) == 0)
                            <div class="card-body">
                                @if (session('info'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('info')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif  
                                <form action="{{route('save.info')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <div class="product_img slider_img logoImg"> 
                                                <input type="file" style="width: 100%;height:100%;opacity:0" id="logo" name="logo" required/>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="product_img slider_img payment"> 
                                                <input type="file" style="width: 100%;height:100%;opacity:0" id="paymethod" name="paymethod" required/>
                                            </div>
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="hellp_number">Help Number</label>
                                            <input name="hellp_number" min="0" id="hellp_number" placeholder="Number" type="number" class="form-control">
                                        </div> 
                                        <div class="form-group col-4">
                                            <label for="email">Email</label>
                                            <input name="email" min="0" id="email" type="email" placeholder="Email" class="form-control">
                                        </div> 
                                        <div class="form-group col-4">
                                            <label for="address">Address</label>
                                            <input name="address" min="0" id="address" placeholder="Address" type="text" class="form-control">
                                        </div> 
                                        <div class="form-group col-md-12">
                                            <label for="">Google Map location</label> 
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <input type="text" name="let" class="form-control" placeholder="late (24.095818)" id="location"> 
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="text" name="long" class="form-control" placeholder="long (90.412521)" id="location">  
                                                </div>
                                            </div> 
                                        </div> 
                                        <div class="form-group col-md-12">
                                            <label for="">Social</label>
                                            <div class="row">
                                                <div class="col-md-4 mb-2"> 
                                                    <input name="fb" min="0" type="text" class="form-control" placeholder="Faccebook">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input name="tw" min="0" type="text" class="form-control" placeholder="Twitter"> 
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input name="lk" min="0" type="text" class="form-control" placeholder="Linkedin"> 
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input name="in" min="0" type="text" class="form-control" placeholder="instagram"> 
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input name="pn" min="0" type="text" class="form-control" placeholder="Pintarest">  
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <input name="yt" min="0" type="text" class="form-control" placeholder="Youtube"> 
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group col-md-12">
                                            <label for="fewworrd">Few word about this company</label>
                                            <textarea name="fewworrd" class="form-control" id="fewworrd"></textarea>
                                        </div> 
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary">Upload</button>
                                </form>  
                            </div>
                            @else
                            <div class="card-body">
                                @if (session('info'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{session('info')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif  
                                <form action="{{route('update.info')}}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    @foreach ($infoData as $item)
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <div class="product_img slider_img logoImg"> 
                                                    <input type="file" style="width: 100%;height:100%;opacity:0" id="logo" value="{{$item->logo}}" name="logo" required/>
                                                    <input type="hidden" value="{{$item->id}}" name="id"/>
                                                    <img src="{{asset('/'.$item->logo)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <div class="product_img slider_img payment"> 
                                                    <input type="file" style="width: 100%;height:100%;opacity:0" id="paymethod" value="{{$item->payment}}" name="paymethod" required/>
                                                    <img src="{{asset('/'.$item->payment)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="hellp_number">Help Number</label>
                                                <input name="hellp_number" min="0" id="hellp_number" placeholder="Number" value="{{$item->number}}" type="number" class="form-control">
                                            </div> 
                                            <div class="form-group col-4">
                                                <label for="email">Email</label>
                                                <input name="email" min="0" id="email" type="email" placeholder="Email" value="{{$item->email}}" class="form-control">
                                            </div> 
                                            <div class="form-group col-4">
                                                <label for="address">Address</label>
                                                <input name="address" min="0" id="address" placeholder="Address" value="address" type="text" class="form-control">
                                            </div> 
                                            <div class="form-group col-md-12">
                                                <label for="">Google Map location</label> 
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <input type="text" name="let" class="form-control" value="{{$item->lat}}" placeholder="late (24.095818)" id="location"> 
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="long" class="form-control" value="{{$item->long}}" placeholder="long (90.412521)" id="location">  
                                                    </div>
                                                </div> 
                                            </div> 
                                            <div class="form-group col-md-12">
                                                <label for="">Social</label>
                                                <div class="row">
                                                    <div class="col-md-4 mb-2"> 
                                                        <input name="fb" min="0" type="text" value="{{$item->fb}}" class="form-control" placeholder="Faccebook">
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <input name="tw" min="0" type="text" value="{{$item->tw}}" class="form-control" placeholder="Twitter"> 
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <input name="lk" min="0" type="text" value="{{$item->lk}}" class="form-control" placeholder="Linkedin"> 
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <input name="in" min="0" type="text" value="{{$item->ins}}" class="form-control" placeholder="instagram"> 
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <input name="pn" min="0" type="text" value="{{$item->pin}}" class="form-control" placeholder="Pintarest">  
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <input name="yt" min="0" type="text" value="{{$item->yt}}" class="form-control" placeholder="Youtube"> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-12">
                                                <label for="fewworrd">Few word about this company</label>
                                                <textarea name="fewworrd" class="form-control" id="fewworrd">{{$item->about_desc}}</textarea>
                                            </div> 
                                        </div> 
                                    @endforeach
                                    <button type="submit" id="submit" class="btn btn-primary">Upload</button>
                                </form>  
                            </div>
                        @endif 
                    </div> 

                </div>                  
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->


@endsection