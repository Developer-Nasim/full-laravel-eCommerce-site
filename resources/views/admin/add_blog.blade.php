@extends('layouts.admin')
@section('blog') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">
              <!-- START: Breadcrumbs-->
              <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">Add Blog</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Add</li>
                            <li class="breadcrumb-item">Blog</li> 
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
                                    <h4 class="card-title">Add Blog</h4>
                                </div>    
                                <div class="col-lg-6 text-right">
                                    <a href="{{url('/admin/all/blogs')}}" class="bg-primary color-light" style="    
                                    border: none;
                                    padding: 10px 20px;
                                    color: #fff;
                                    border-radius: 5px;
                                    outline:none
                                    ">See the Blogs</a>
                                </div>    
                            </div>                            
                        </div>
                        <div class="card-body">
                            @if (session('blogAdded'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('blogAdded')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif  
                            <form id="add_Blog" action="{{url('admin/blog/add/post')}}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                <div class="form-row">  
                                    <div class="form-group col-md-12">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" placeholder="Title" name="Title" id="Title" required>
                                    </div> 
                                    <div class="form-group col-md-12">
                                        <div class="product_img">  
                                            <input type="file" id="blogImg" name="blogImg"/>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-12"> 
                                        <label for="bodyContent">Blog content</label>
                                        <textarea name="blog_content" id="bodyContent" class="summernote"></textarea>
                                    </div>   
                                    <div class="form-group col-md-12"> 
                                        <label for="">Tags</label>
                                        <textarea class="form-control" name="tags" id="tags" required></textarea>
                                    </div>  
                                    <div id="msg"></div> 
                                </div> 
                                <button type="submit" id="submit" class="btn btn-primary">Upload</button>
                            </form>  
                        </div>
                    </div> 

                </div>                  
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->
 
@endsection