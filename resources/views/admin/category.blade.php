@extends('layouts.admin')
@section('category') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">
            <!-- START: Card Data-->

              <!-- START: Breadcrumbs-->
              <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Category</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">All</li> 
                            <li class="breadcrumb-item">Category</li> 
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->


            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">    
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title">Add Category</h4>
                                </div>    
                                <div class="col-lg-6 text-right">
                                    <button class="bg-primary color-light" style="    
                                    border: none;
                                    padding: 10px 20px;
                                    color: #fff;
                                    border-radius: 5px;
                                    outline:none
                                    "  data-toggle="modal" data-target="#createCategory">Add New Category</button>
                                </div>    
                            </div>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>  
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cateData"> 
                                        @foreach ($all_category as $item)  
                                        <tr data-id='{{$item->id}}'>
                                            <td id="categNameRow">
                                                {{$item->name}} 
                                            </td> 
                                            <td>
                                                @if ($item->created_at)
                                                    {{$item->created_at}}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->updated_at)
                                                    {{$item->updated_at}}
                                                @endif
                                            </td>
                                            <td id="categ_status">
                                                @if ($item->status == 1)
                                                    <span class="badge badge-primary">Active</span>
                                                    @else
                                                    <span class="badge badge-danger"> In Active</span>
                                                @endif
                                            </td>
                                            <td> 
                                                <div id="actBtn" style="display: inline-block;">
                                                    @if ($item->status == 1)
                                                        <button class="btn btn-danger" id="categ_inactive" data-id='{{$item->id}}'>In Active</button>
                                                        @else
                                                        <button class="btn btn-primary" id="categ_active" data-id='{{$item->id}}'>Active</button>
                                                    @endif  
                                                </div>
                                                <button class="btn btn-primary" id="editCateg" data-id='{{$item->id}}' data-toggle="modal" data-target="#categEdit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                  </svg></button>
                                                <button class="btn btn-danger" id='delete_categ' data-id='{{$item->id}}'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
        </div>
    </main>
    <!-- END: Content-->

            <!-- Create-Modal -->
            <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="createCategoryLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="createCateg"> 
                            <div class="modal-header">
                                <h5 class="modal-title" id="createCategoryLabel">Add Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <div id="msg"></div> 
                                <div class="form-group">
                                    <label for="categoryname">Category Name</label>
                                    <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="Type category name">
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

            <!-- Edit-Modal -->
            <div class="modal fade" id="categEdit" tabindex="-1" aria-labelledby="categEditLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="edite_categ"> 
                            <div class="modal-header">
                                <h5 class="modal-title" id="categEditLabel">Edit now</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="msg"></div> 
                                <div class="form-group">
                                    <label for="editCategName">Name</label>
                                    <input type="text" class="form-control" name="editCategName" id="editCategName">
                                    <input type="hidden" name="brId" id="brId">
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="editcancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" id="editsave" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



@endsection