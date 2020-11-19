@extends('layouts.admin')
@section('order') active @endsection
@section('admin') 

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">

            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Orders</h4></div> 
                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">All</li>
                            <li class="breadcrumb-item">Order</li>
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
                                    <h4 class="card-title">All Orders</h4>
                                </div>      
                            </div>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            {{-- <th>Address {optional}</th>
                                            <th>city</th> --}}
                                            <th>Number</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $order = App\Orde::latest()->get();
                                        @endphp
                                        @foreach ($order as $item)
                                        <tr>
                                            <td>{{$item->f_name}} {{$item->l_name}}</td>
                                            <td>{{$item->country_name}}</td>
                                            <td>{{$item->address}}</td>
                                            {{-- <td>
                                                @if ($item->address)
                                                    {{$item->address}} 
                                                @endif
                                            </td>
                                            <td>{{$item->city}}</td> --}}
                                            <td>{{$item->phone_number}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                @php
                                                    $msg = $item->mmessage." ";
                                                    $msg = substr($msg, 0, strpos($msg, ' '));
                                                    $msg = $msg."...";
                                                @endphp
                                                
                                                {{$msg}}
                                            
                                            </td> 
                                            <td>{{$item->created_at->diffForHumans()}}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <button class="btn btn-danger">Not Confirmed</button>
                                                    @else
                                                    <button class="btn btn-success">Confirmed</button>
                                                @endif
                                                <button id="send-message" data-id="{{$item->id}}" class="btn btn-primary" data-toggle="modal" data-target="#sendMessage">Send Message</button>
                                                <button id="send-mail" data-id="{{$item->id}}" class="btn btn-primary" data-toggle="modal" data-target="#sendEmail">Send Invoice</button>
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


            <!-- Show message Modal -->
            <div class="modal fade" id="sendMessage" tabindex="-1" aria-labelledby="sendMessageLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="sendMessageNow"> 
                            <div class="modal-header">
                                <h5 class="modal-title" id="sendMessageLabel">Send message now</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <div id="msg"></div> 
                                <div class="form-group">
                                    <label for="">Customer Number</label>
                                    <input type="text" id="customerNum" class="form-control" disabled>
                                </div>  
                                <div class="form-group">
                                    <label for="">Your message</label>
                                    <textarea id="customerMessage" class="form-control" placeholder="Type your message"></textarea>
                                </div>  
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" id="send-messaage" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

            <!-- Show Email Modal -->
            <div class="modal fade" id="sendEmail" tabindex="-1" aria-labelledby="sendEmailLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="sendEmailNow" method="POST" action="{{url('admin/email')}}">
                            @csrf 
                            <div class="modal-header">
                                <h5 class="modal-title" id="sendEmailLabel">Send Email now</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <div id="msg"></div> 
                                <div class="form-group">
                                    <label for="">Customer Email</label>
                                    <input type="text" id="customerEmail" class="form-control" disabled>
                                </div>  
                                <div class="form-group">
                                    <label for="">Your message</label>
                                    <textarea id="customerMessage" class="form-control" placeholder="Type your message"></textarea>
                                </div>  
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" id="send-email" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 


@endsection