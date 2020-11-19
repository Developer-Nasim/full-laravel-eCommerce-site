@extends('layouts.admin')
@section('pages') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">

            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Page</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">All</li> 
                            <li class="breadcrumb-item">Page</li> 
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
                                    <h4 class="card-title">Add a brand</h4>
                                </div>    
                                <div class="col-lg-6 text-right">
                                    <a href="{{url('admin/pages/make_new')}}" class="bg-primary color-light" style="    
                                    border: none;
                                    padding: 10px 20px;
                                    color: #fff;
                                    border-radius: 5px;
                                    outline:none
                                    " >Make a page</a>
                                </div>    
                            </div>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th> 
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pageData"> 
                                        @foreach ($data as $item)  
                                            <tr data-id='{{$item->id}}'>
                                                <td>{{$item->name}}</td>   
                                                <td id="page_status">
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-primary">Active</span>
                                                        @else
                                                        <span class="badge badge-danger"> In Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->created_at)
                                                        {{$item->created_at->diffForHumans()}}
                                                    @endif
                                                </td>
                                                <td> 
                                                    <div id="actBtn" style="display: inline-block;">
                                                        @if ($item->status == 1)
                                                            <button class="btn btn-danger" id="page_inactive" data-id='{{$item->id}}'>In Active</button>
                                                            @else
                                                            <button class="btn btn-primary" id="page_active" data-id='{{$item->id}}'>Active</button>
                                                        @endif  
                                                    </div> 
                                                    <button class="btn btn-danger" id='page_delete' data-id='{{$item->id}}'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg></button>
                                                    <a href="{{url('/home/page/'.$item->name)}}" class="btn btn-success">View</a>
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