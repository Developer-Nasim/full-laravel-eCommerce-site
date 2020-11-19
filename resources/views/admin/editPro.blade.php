@extends('layouts.admin')
@section('product') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">

              <!-- START: Breadcrumbs-->
              <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">Edit Product</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Edit</li>
                            <li class="breadcrumb-item">Product</li>
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
                                    <h4 class="card-title">Edit product</h4>
                                </div>    
                                <div class="col-lg-6 text-right">
                                    <a href="{{url('/admin/all/products')}}" class="bg-primary color-light" style="    
                                    border: none;
                                    padding: 10px 20px;
                                    color: #fff;
                                    border-radius: 5px;
                                    outline:none
                                    ">Back</a>
                                </div>    
                            </div>                            
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('edit.submit')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    @foreach ($Product as $thisProductCategory)
                                        <input type="hidden" name="id" value="{{$thisProductCategory->id}}">
                                        <div class="form-group col-md-3">
                                            <label for="brand">Brand</label>
                                            <select id="brand" name="brand" class="form-control" required> 
                                                @php
                                                    $prBr = App\Brand::where('name', $thisProductCategory->brand)->first();
                                                @endphp
                                                    <option value="{{$prBr->name}}">{{$prBr->name}}</option> 

                                                @foreach ($allBrand as $branditem) 
                                                    <option value="{{$branditem->name}}">{{$branditem->name}}</option> 
                                                @endforeach 
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Main_category">Category</label>
                                            <select id="Main_category" name="Main_category" class="form-control" required>
                                                @php
                                                    $prCate = App\Category::where('id', $thisProductCategory->category)->first();
                                                @endphp
                                                    <option value="{{$prCate->id}}">{{$prCate->name}}</option> 

                                                @foreach ($mainCategory as $cateItem)
                                                    <option value="{{$cateItem->id}}">{{$cateItem->name}}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Sub_category">Sub category</label>
                                            <select id="Sub_category" name="Sub_category" class="form-control" required>
                                                @php
                                                    $prsCate = App\subcategory::where('id', $thisProductCategory->subcategory)->first();
                                                @endphp
                                                    <option value="{{$prsCate->id}}">{{$prsCate->sub_name}}</option> 

                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="under_sub_category">Under sub-category</label>
                                            <select id="under_sub_category" name="under_sub_category" class="form-control" required>
                                                @php
                                                    $prusCate = App\UnderSub::where('id', $thisProductCategory->undercategory)->first();
                                                @endphp
                                                    <option value="{{$prusCate->id}}">{{$prusCate->under_sub_category}}</option> 

                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Title">Title</label>
                                            <input type="text" class="form-control" placeholder="Title" name="Title" id="Title" value="{{$thisProductCategory->title}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Price">Price</label>
                                            <input type="number" min="0" class="form-control" placeholder="Price" name="Price" id="Price" value="{{$thisProductCategory->price}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Quantity">Quantity</label>
                                            <input type="number" min="0" class="form-control" placeholder="Quantity" name="Quantity" id="Quantity" value="{{$thisProductCategory->quantity}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Discount">Discount</label>
                                            <input type="number" min="0" class="form-control" placeholder="Discount" name="Discount" id="Discount" value="{{$thisProductCategory->discount}}" required>
                                        </div> 
                                        <div class="form-group product_check col-md-2">
                                            <span>Avaible in stock</span> 
                                            @if ($thisProductCategory->avaiable)
                                                <input type="checkbox" id="button" name="stock" value="avilable" checked required/>
                                                <label for="button"></label>
                                                @else
                                                <input type="checkbox" id="button" name="stock" value="avilable" required/>
                                                <label for="button"></label>
                                            @endif
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <div class="multiselect" id="countries" multiple="multiple" data-target="multi-0">
                                                <div class="title noselect">
                                                    <span class="text" name="colors">Select Avaible Colors</span>
                                                    <span class="close-icon">&times;</span>
                                                    <span class="expand-icon">&plus;</span>
                                                </div>
                                                <div class="container">
                                                    <option value="White">White</option>
                                                    <option value="Black">Black</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Yellow">Yellow</option>
                                                    <option value="Purple">Purple</option>
                                                    <option value="Red">Red</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Coffee">Coffee</option>
                                                    <option value="Brown">Brown</option>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group col-md-12">
                                            <div class="product_img">  
                                                <input type="file" id="files" name="product_img[]" multiple  required/>  
                                                @php
                                                    $img = json_decode($thisProductCategory->product_img); 
                                                @endphp
                                                @foreach ($img as $img_item)
                                                    <span class="pip"><img class="imageThumb" src="{{asset('/'.$img_item)}}" title="{{$thisProductCategory->title}}"><br><span class="remove">Remove image</span></span>  
                                                @endforeach   
                                            </div> 
                                        </div> 
                                        <div class="form-group col-md-12"> 
                                            <label for="">Short description</label>
                                            <textarea name="short_desc" class="summernote" required>{!! $thisProductCategory->short_desc !!}</textarea>
                                        </div> 
                                        <div class="form-group col-md-12"> 
                                            <label for="">Full description</label>
                                            <textarea name="full_desc" class="summernote" required>{!! $thisProductCategory->full_desc !!}</textarea>
                                        </div>  
                                        <div id="msg"></div> 
                                    @endforeach
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