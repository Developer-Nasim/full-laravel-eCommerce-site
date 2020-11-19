@extends('layouts.admin')
@section('blog') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">
            <!-- START: Card Data-->

              <!-- START: Breadcrumbs-->
              <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">Edit Blog</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Edit</li>
                            <li class="breadcrumb-item">Blog</li> 
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->


            <div class="row">
                <div class="col-12 mt-3 mb-5">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">    
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title">Edit Blog Post</h4>
                                </div>    
                                <div class="col-lg-6 text-right">
                                    <a href="{{url('/admin/all/blogs')}}" class="bg-primary color-light" style="    
                                    border: none;
                                    padding: 10px 20px;
                                    color: #fff;
                                    border-radius: 5px;
                                    outline:none
                                    ">Back Now</a>
                                </div>    
                            </div>                            
                        </div>
                        <div class="card-body">
                            @if (session('Updated'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('Updated')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @foreach ($data as $item)
                                <form id="add_Blog" action="{{url('admin/blog/edit/post')}}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-row">  
                                        <div class="form-group col-md-12">
                                            <label for="Title">Title</label>
                                            <input type="text" class="form-control" placeholder="Title" name="Title" id="Title" value="{{$item->Title}}" required>
                                            <input type="hidden" name="id" value="{{$item->id}}" required>
                                        </div> 
                                        <div class="form-group col-md-12">
                                            <div class="product_img">  
                                                <input type="file" id="blogImg" name="blogImg" required/>
                                                <img src="{{asset('/'.$item->image)}}" alt="">
                                            </div> 
                                        </div>
                                        <div class="form-group col-md-12"> 
                                            <label for="bodyContent">Blog content</label>
                                            <textarea name="blog_content" id="bodyContent" class="summernote">{{$item->Body}}</textarea>
                                        </div>   
                                        <div class="form-group col-md-12"> 
                                            <label for="">Tags</label>
                                            <textarea class="form-control" name="tags" id="tags" required>{{$item->tags}}</textarea>
                                        </div>  
                                        <div id="msg"></div> 
                                    </div> 
                                    <button type="submit" id="submit" class="btn btn-primary">Upload</button>
                                </form>
                            @endforeach
                        </div>
                    </div> 

                </div>                  
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->

@endsection