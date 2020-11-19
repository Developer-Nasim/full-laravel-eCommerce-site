@extends('layouts.admin')
@section('allblog') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">
              <!-- START: Breadcrumbs-->
              <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Blogs</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">All</li> 
                            <li class="breadcrumb-item">Blogs</li> 
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
                                    <h4 class="card-title">Add a Post</h4>
                                </div>  
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>  
                                            <th>tags</th> 
                                            <th>Status</th> 
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="blog_posts">
                                        @foreach ($blog_data as $item)
                                            <tr data-id="{{$item->id}}">
                                                <td>
                                                    @php
                                                        $title  = $item->Title." ";
                                                        $title  = substr($title, 0, 50);
                                                        $title  = $title."...";
                                                    @endphp
                                                    {{$title}}
                                                </td>
                                                <td><img width="50px" src="{{asset('/'.$item->image)}}" alt=""></td> 
                                                <td> 
                                                    @php
                                                        if ($item->tags) { 
                                                            $inarray  = explode(',',$item->tags);
                                                        }
                                                    @endphp 
                                                    @foreach ($inarray as $inarrayitem)
                                                        <span class="badge badge-warning">{{$inarrayitem}}</span>
                                                    @endforeach
                                                </td>
                                                <td id="post_sttus">
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-primary">Active</span>
                                                        @else
                                                        <span class="badge badge-danger">In-Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->created_at)
                                                        {{$item->created_at->diffForHumans()}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <div id="activeInactive_btn" style="display: inline-block">
                                                        @if ($item->status == 1)
                                                            <button class="btn btn-danger" data-id="{{$item->id}}" id="blog_inactive">In-Active</button>
                                                            @else
                                                            <button class="btn btn-primary" data-id="{{$item->id}}" id="blog_active">Active</button>
                                                        @endif 
                                                    </div>
                                                    <a href="{{url('/admin/blog/edit/'.$item->id)}}" class="btn btn-success" data-id="{{$item->id}}">Edit</a>
                                                    <button data-id="{{$item->id}}" id="delete_blog" class="btn btn-danger">Delete</button>
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
        </div>
    </main>
    <!-- END: Content-->


@endsection