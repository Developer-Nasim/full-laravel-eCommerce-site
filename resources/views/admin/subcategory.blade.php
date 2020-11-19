@extends('layouts.admin')
@section('subcategory') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">

            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Sub-category</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">All</li>
                            <li class="breadcrumb-item">Sub-category</li>
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
                                    <h4 class="card-title">Add Sub Category</h4>
                                </div>    
                                <div class="col-lg-6 text-right">
                                    <button class="bg-primary color-light" style="    
                                    border: none;
                                    padding: 10px 20px;
                                    color: #fff;
                                    border-radius: 5px;
                                    outline:none
                                    "  data-toggle="modal" data-target="#subcreateCategory">Add New Sub Category</button>
                                </div>    
                            </div>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>  
                                            <th>Main category</th> 
                                            <th>Created_at</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="subcateData"> 
                                        @foreach ($all_subcategory as $item)  
                                        <tr data-id='{{$item->id}}'>
                                            <td>{{$item->sub_name}}</td> 
                                            <td>{{$item->mainCategory->name}}</td> 
                                            <td>
                                                @if ($item->created_at)
                                                    {{$item->created_at}}
                                                @endif
                                            </td> 
                                            <td>   
                                                <button class="btn btn-danger" id='delete_subcateg' data-id='{{$item->id}}'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
    <div class="modal fade" id="subcreateCategory" tabindex="-1" aria-labelledby="subcreateCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="subcreateCateg" class="needs-validation" novalidate> 
                    <div class="modal-header">
                        <h5 class="modal-title" id="subcreateCategoryLabel">Add Sub Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <div id="msg"></div> 
                        <div class="form-group">
                            <label for="categoryname">Select main Category</label>
                            <select name="categoryNm" class="form-control" id="category" required>
                                <option></option> 
                                @foreach ($all_category as $item)  
                                    <option value="{{$item->id}}">{{$item->name}}</option> 
                                @endforeach 
                            </select>
                            <div class="invalid-feedback">
                                Please Select any category.
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="subcategoryname">Sub Category Name</label>
                            <input type="text" class="form-control" name="subcategoryname" id="subcategoryname" placeholder="Type category name" required>
                            <div class="invalid-feedback">
                                Please provide a sub category name.
                                </div>
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