@extends('layouts.admin')
@section('banner') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">

            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Banner</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">All</li> 
                            <li class="breadcrumb-item">Banner</li> 
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">    
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title">Add Banner Image</h4>     
                                </div>    
                                <div class="col-lg-6 text-right">  
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#createBanner">Add Small Banner</a>
                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#createBigBanner">Add big Banner</a>
                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#createSideBanner">Add Side Banner</a> 
                                        </div>
                                    </div>

                                </div>    
                            </div>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Banner Image</th>
                                            <th>Created At</th> 
                                            <th>Banner Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bannerData"> 
                                        @foreach ($all_data as $item)  
                                        <tr data-id='{{$item->id}}'>
                                            <td>
                                                @if ($item->small_banner) 
                                                    <img width="100px" src="{{asset('/'.$item->small_banner)}}" alt=""> 
                                                    @elseif ($item->big_banner)
                                                    <img width="100px" src="{{asset('/'.$item->big_banner)}}" alt="">  
                                                @endif
                                            </td>  
                                            <td>
                                                @if ($item->created_at)
                                                    {{$item->created_at->diffForHumans()}} 
                                                @endif
                                            </td> 
                                            <td>
                                                @if ($item->banner_status == 1)
                                                        <span class="badge badge-primary">Small Banner</span>
                                                    @elseif ($item->banner_status == 2)
                                                        <span class="badge badge-primary">Big</span>
                                                    @elseif ($item->banner_status == 3)
                                                        <span class="badge badge-primary">Side banner</span>
                                                @endif
                                            </td>
                                            <td>  
                                                <button class="btn btn-danger" id='delete_banner' data-id='{{$item->id}}'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                  </svg></button>
                                            </td>
                                        </tr> 
                                        @endforeach 
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div> 

                </div>                  
            </div>
            <!-- END: Card DATA-->

            <!-- Add Small banner -->
            <div class="modal fade" id="createBanner" tabindex="-1" aria-labelledby="createBannerLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="createBanners"> 
                            <div class="modal-header">
                                <h5 class="modal-title" id="createBannerLabel">Add Small Banner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <div id="msg"></div> 
                                <div class="form-group">
                                    <label for="banner_img">Banner Image</label>
                                    <input type="file" class="form-control" name="bannerImage" id="banner_img" multiple>
                                </div>  
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" id="save" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!-- Add Big banner -->
            <div class="modal fade" id="createBigBanner" tabindex="-1" aria-labelledby="createBigBannerLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="createBigBanners"> 
                            <div class="modal-header">
                                <h5 class="modal-title" id="createBigBannerLabel">Add Big Banner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <div id="msg"></div> 
                                <div class="form-group">
                                    <label for="banner_img">Banner Image</label>
                                    <input type="file" class="form-control" name="bannerImage" id="banner_img" multiple>
                                </div>  
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" id="save" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!-- Add Side banner -->
            <div class="modal fade" id="createSideBanner" tabindex="-1" aria-labelledby="createSideBannerLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="createSideBanners"> 
                            <div class="modal-header">
                                <h5 class="modal-title" id="createSideBannerLabel">Add Side-bar Banner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <div id="msg"></div> 
                                <div class="form-group">
                                    <label for="banner_img">Banner Image</label>
                                    <input type="file" class="form-control" name="bannerImage" id="banner_img" multiple>
                                </div>  
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" id="save" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

        </div>
    </main>
    <!-- END: Content-->
  
@endsection