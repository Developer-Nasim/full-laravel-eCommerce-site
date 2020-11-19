@extends('layouts.admin')
@section('undersubcategory') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">

            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Under-Subcategory</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">All</li>
                            <li class="breadcrumb-item">Under Sub-category</li>
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
                                    <h4 class="card-title">
                                        Add Sub Category 
                                    </h4>
                                </div>    
                                <div class="col-lg-6 text-right">
                                    <button class="bg-primary color-light" style="
                                    border: none;
                                    padding: 10px 20px;
                                    color: #fff;
                                    border-radius: 5px;
                                    outline:none
                                    "  data-toggle="modal" data-target="#UndersubcreateCategory">Add New Sub Category</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr> 
                                            <th>Main category</th> 
                                            <th>Sub category</th> 
                                            <th>Under Sub category</th> 
                                            <th>Created_at</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="UndersubcateData"> 
                                        @foreach ($UnderSubController as $item)
                                        <tr data-id='{{$item->id}}'>
                                            <td>{{$item->mainCateg->name}}</td> 
                                            <td> 
                                                @php 
                                                    $cat_id     = App\subcategory::where('id', $item->sub_category)->latest()->get();
                                                @endphp
                                                @foreach ($cat_id as $asas)
                                                    {{$asas->sub_name}}
                                                @endforeach  
                                            </td> 
                                            <td>{{$item->under_sub_category}}</td>
                                            <td>
                                                @if ($item->created_at)
                                                    {{$item->created_at}}
                                                @endif
                                            </td> 
                                            <td>   
                                                <button class="btn btn-danger" id='delete_undersubcateg' data-id='{{$item->id}}'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                  </svg>
                                                </button>
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

    <!-- Create-Modal -->
    <div class="modal fade" id="UndersubcreateCategory" tabindex="-1" aria-labelledby="UndersubcreateCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="undersubcreateCateg" class="needs-validation" novalidate> 
                    <div class="modal-header">
                        <h5 class="modal-title" id="UndersubcreateCategoryLabel">Add Under Sub Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <div id="msg"></div> 
                        <div class="form-group">
                            <label for="categoryname">Select main Category</label>
                            <select name="categoryNm" class="form-control" id="categoryNm" required>
                                <option></option>
                                @foreach ($all_category as $item)
                                    <option data-name="{{$item->name}}" value="{{$item->id}}">{{$item->name}}</option> 
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="categoryname">Select Sub Category</label>
                            <select name="categorySubNm" class="form-control" id="categorySubNm" required>
                                <option></option> 
                            </select> 
                        </div>  
                        <div class="form-group">
                            <label for="subcategoryname">Under Sub Category Name</label>
                            <input type="text" class="form-control" name="undersubcategoryname" id="undersubcategoryname" placeholder="Type category name" required> 
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  

@endsection