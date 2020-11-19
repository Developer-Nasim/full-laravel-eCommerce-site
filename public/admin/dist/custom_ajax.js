$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});


// Add brand
$('#createBrand').on('submit',function (e) {
    e.preventDefault(); 
    const data = new FormData(this);
    const msg  = $('#createBrand #msg');
    $.ajax({
        url: '/admin/add/brand',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $('#createBrand #save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... `);
        },
        success: function(data){ 
            $(msg).html('');
 
            $btn = '';
            if (data.status == 0) {
                $btn = '<span class="badge badge-danger"> In Active</span>'
            }else{
                $btn = '<span class="badge badge-primary">Active</span>'
            }

            $actbtn = '';
            if (data.status == 0) { 
                $actbtn = '<button class="btn btn-danger" id="Brand_active" data-id='+data.id+'>Active</button>' 
            }else{
                $actbtn = '<button class="btn btn-danger" id="Brand_inactive" data-id='+data.id+'>In Active</button>' 
            } 
            $('#brandData').prepend(`<tr data-id="`+data.id+`">
                <td>`+data.name+`</td>
                <td><img style="width: 50px" src="http://localhost:8000/`+data.img+`" alt=""></td>
                <td>`+data.create+`</td>
                <td></td>
                <td id="brand_status">`+$btn+`</td>
                <td>
                    <div id="actBtn" style="display: inline-block;">
                        `+$actbtn+`
                    </div>
                    <button class="btn btn-primary" data-id="`+data.id+`" id="editBrand" data-toggle="modal" data-target="#editBrand"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                        </svg>
                    </button>
                    <button class="btn btn-danger" data-id="`+data.id+`" id='delete_brand'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                        </svg>
                    </button>
                    </td>
            </tr>`);

            $('#createBrand #save').html(`Save`);
            $(msg).html(`<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Uploaded successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`); 

            $('#createBrand #brand_name').val('');
            $('#createBrand #brand_img').val('');

        }  
    });
}); 

$('#createBarand').on('hidden.bs.modal', function (e) {
    const msg  = $('#createBrand #msg');
    $(msg).html('');
})


// Active Brand
$(document).on('click','#Brand_active', function () {
    const id    = $(this).data('id'); 
    const badge = $('#brandData').find('tr[data-id="'+id+'"] #brand_status');
    const btn  = $('#brandData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/active/brand/'+id, 
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="Brand_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-primary">Active</span>`);
            $(btn).html(`<button class="btn btn-danger" id="Brand_inactive" data-id='`+id+`'>In Active</button>`);
        }
    }) 
});

// In-Active Brand
$(document).on('click','#Brand_inactive', function () {
    const id    = $(this).data('id');
    const badge = $('#brandData').find('tr[data-id="'+id+'"] #brand_status');
    const btn  = $('#brandData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/inactive/brand/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="Brand_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-danger">In Active</span>`);
            $(btn).html(`<button class="btn btn-primary" id="Brand_active" data-id='`+id+`'>Active</button>`);
        }
    }) 
});

// Edit-modal data-showing
$(document).on('click', '#editBrand', function (){
    const id        = $(this).data('id');
    const bId       = $('#edite_brand #brId');
    const setID     = $('#edite_brand').attr('data-id', id);
    const name      = $('#edite_brand #editBrandName');
    const image     = $('#edite_brand #editBrandImage');
    $.ajax({
        url: '/admin/editModal/brand/'+id,
        type: 'POST',
        success: function (data) {
            $(bId).val('');  
            $(name).val('');  
            $(image).val(''); 
            $(bId).val(data.id);   
            $(name).val(data.name);    
            $(image).val(data.img); 
        }
    });
    
});


// Edit-update
$('#edite_brand').on('submit', function (e){
    e.preventDefault();
    const id        = $(this).data('id'); 
    const data      = new FormData(this); 
    const data_name_row = $('#brandData').find('tr[data-id="'+id+'"] td#brandNameRow');
    const data_img_row  = $('#brandData').find('tr[data-id="'+id+'"] td#brandImageRow');
    $.ajax({
        url: '/admin/editSub/brand/'+id,
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false, 
        beforeSend: function(){
            $('#edite_brand #editsave').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">`)
        },
        success: function (data) {
            $(data_name_row).html(data.name);
            $(data_img_row).html(`<img style="width: 50px" src="http://localhost:8000/`+data.img+`" alt="">`); 
            $('#edite_brand #editsave').html(`Save`);
        }
    });
    
});


// Delete Brand
$(document).on('click','#delete_brand', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#brandData').find('#delete_brand[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/brand/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function () {
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#brandData').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});

 

// /////////////////////////////////////////////////////////////////////////////////////////
//              End Brand ajax  & Category Ajax start
// /////////////////////////////////////////////////////////////////////////////////////////

 
// Add category
$('#createCateg').on('submit',function (e) {
    e.preventDefault(); 
    const data = new FormData(this);
    const msg  = $('#createCateg #msg');
    $.ajax({
        url: '/admin/add/category',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $('#createCateg #save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving... `);
        },
        success: function(data){ 
            $(msg).html('');
 
            $btn = '';
            if (data.status == 0) {
                $btn = '<span class="badge badge-danger"> In Active</span>'
            }else{
                $btn = '<span class="badge badge-primary">Active</span>'
            }


            $actbtn = '';
            if (data.status == 0) { 
                $actbtn = '<button class="btn btn-danger" id="categ_active" data-id='+data.id+'>Active</button>' 
            }else{
                $actbtn = '<button class="btn btn-danger" id="categ_inactive" data-id='+data.id+'>In Active</button>' 
            } 
            $('#cateData').prepend(`<tr data-id="`+data.id+`">
                <td>`+data.name+`</td> 
                <td>now</td>
                <td></td>
                <td id="brand_status">`+$btn+`</td>
                <td>
                    <div id="actBtn" style="display: inline-block;">
                        `+$actbtn+`
                    </div>
                    <button class="btn btn-primary" data-id="`+data.id+`" id="editCateg" data-toggle="modal" data-target="#categEdit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                        </svg>
                    </button>
                    <button class="btn btn-danger" data-id="`+data.id+`" id='delete_categ'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                        </svg>
                    </button>
                    </td>
            </tr>`);

            $('#createCateg #save').html(`Save`);
            $(msg).html(`<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Uploaded successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);  

            $('#createCateg #categoryname').val('');
        }  
    });
}); 

$('#createCategory').on('hidden.bs.modal', function (e) {
    const msg  = $('#createCateg #msg');
    $(msg).html('');
})


// Active category
$(document).on('click','#categ_active', function () {
    const id    = $(this).data('id'); 
    const badge = $('#cateData').find('tr[data-id="'+id+'"] #categ_status');
    const btn  = $('#cateData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/active/category/'+id, 
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="Brand_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-primary">Active</span>`);
            $(btn).html(`<button class="btn btn-danger" id="Brand_inactive" data-id='`+id+`'>In Active</button>`);
        }
    }) 
});

// In-Active category
$(document).on('click','#categ_inactive', function () {
    const id    = $(this).data('id');
    const badge = $('#cateData').find('tr[data-id="'+id+'"] #categ_status');
    const btn  = $('#cateData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/inactive/category/'+id,
        cache: false,
        beforeSend: function (){
            $(btn).html(`<button class="btn btn-warning" id="categ_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-danger">In Active</span>`);
            $(btn).html(`<button class="btn btn-primary" id="categ_active" data-id='`+id+`'>Active</button>`);
        }
    }) 
});

// Delete
$(document).on('click','#delete_categ', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#cateData').find('#delete_categ[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/category/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function (){
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#cateData').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});


// Edit-modal data-showing
$(document).on('click', '#editCateg', function (){
    const id        = $(this).data('id'); 
    const setID     = $('#edite_categ').attr('data-id', id);
    const name      = $('#edite_categ #editCategName'); 
    $.ajax({
        url: '/admin/editModal/category/'+id,
        type: 'POST',
        success: function (data) { 
            $(name).val('');     
            $(name).val(data.name);    
        }
    });
    
});

// Edit-update
$('#edite_categ').on('submit', function (e){
    e.preventDefault();
    const id        = $(this).data('id'); 
    const data      = new FormData(this);  
    const data_name_row = $('#cateData').find('tr[data-id="'+id+'"] #categNameRow'); 
    $.ajax({
        url: '/admin/editSub/category/'+id,
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false, 
        beforeSend: function(){
            $('#edite_categ #editsave').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">`)
        },
        success: function (data) {
            $(data_name_row).html(data.name); 
            $('#edite_categ #editsave').html(`Save`);
        }
    });
    
});
 
 

// /////////////////////////////////////////////////////////////////////////////////////////
//             END Category Ajax & Sub-category start
// /////////////////////////////////////////////////////////////////////////////////////////

   
 
// Add
$('#subcreateCateg').on('submit',function (e) {
    e.preventDefault(); 
    const data = new FormData(this);
    const msg  = $('#subcreateCateg #msg');
    $.ajax({
        url: '/admin/add/sub/category',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $('#subcreateCateg #save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving... `);
        },
        success: function(data){ 
            $(msg).html('');
  
            $('#subcateData').prepend(`<tr data-id="`+data.id+`">
                <td>`+data.sub_name+`</td> 
                <td>`+data.category_id+`</td>
                <td>now</td>  
                <td><button class="btn btn-danger" data-id="`+data.id+`" id='delete_subcateg'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path> </svg>
                    </button>
                </td>
            </tr>`);

            $('#subcreateCateg #save').html(`Save`);
            $(msg).html(`<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Uploaded successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);  

            $('#subcreateCateg #subcategoryname').val('');
        }  
    });
}); 

$('#subcreateCategory').on('hidden.bs.modal', function (e) {
    const msg  = $('#subcreateCateg #msg');
    $(msg).html('');
})


// Delete
$(document).on('click','#delete_subcateg', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#subcateData').find('#delete_subcateg[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/subcategory/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function (){
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#subcateData').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});



// /////////////////////////////////////////////////////////////////////////////////////////
//             END Sub Category Ajax & Under Sub-category start
// /////////////////////////////////////////////////////////////////////////////////////////

    

// Add brand
$('#undersubcreateCateg').on('submit',function (e) {
    e.preventDefault(); 
    const data = new FormData(this);
    const msg  = $('#undersubcreateCateg #msg'); 
    $.ajax({
        url: '/admin/add/under/sub/category',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $('#undersubcreateCateg #save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving... `);
        },
        success: function(data){
            $(msg).html(''); 

            $('#UndersubcateData').prepend(`<tr data-id="`+data.id+`">
                <td>`+data.categ+`</td> 
                <td>`+data.sbname+`</td> 
                <td>`+data.sbun+`</td>
                <td>Now</td>  
                <td><button class="btn btn-danger" data-id="`+data.id+`" id='delete_undersubcateg'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path> </svg>
                    </button>
                </td>
            </tr>`);
         
            $('#undersubcreateCateg #save').html(`Save`);
            $(msg).html(`<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Uploaded successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);  

            $('#undersubcreateCateg #subcategoryname').val(' ');
            $('#undersubcreateCateg #categoryNm').val('  ');
            $('#undersubcreateCateg #categorySubNm').val('  ');
            $('#undersubcreateCateg #undersubcategoryname').val(' ');
        }  
    });
}); 

$('#UndersubcreateCategory').on('hidden.bs.modal', function (e) {
    const msg  = $('#undersubcreateCateg #msg');
    $(msg).html('');
})


// Select dependancy
$('#undersubcreateCateg #categoryNm').on('change', function(){
    const id = $(this).val(); 
    $.ajax({
        url: '/admin/category/change/'+id,
        type: 'POST',
        success: function (data){
            $('#categorySubNm').html(''); 
            $.each(data, function(key,val) {
                $('#categorySubNm').append(`<option value="`+val.id+`">`+val.sub_name+`</option>`);
            });
        }
    })
});

 
// Delete
$(document).on('click','#delete_undersubcateg', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#UndersubcateData').find('#delete_undersubcateg[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/under/subcategory/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function (){
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#UndersubcateData').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});

  
// /////////////////////////////////////////////////////////////////////////////////////////
//             END Under Sub-category & Product  START
// /////////////////////////////////////////////////////////////////////////////////////////


$('#add_product #Main_category').on('change', function () {
   const id      = $(this).val();
   $.ajax({
        url: '/admin/product/delection/main_category/'+id,
        type: 'POST',
        success: function (data) {
            console.log(id)
            $('#add_product #Sub_category').html('');
            $.each(data, function (key, val){
                $('#add_product #Sub_category').append(`<option value="`+val.id+`">`+val.sub_name+`</option> `);
            }); 
        }
   })
});
$('#add_product #Sub_category').on('change', function () {
   const id      = $(this).val();
   $.ajax({
        url: '/admin/product/delection/sub_category/'+id,
        type: 'POST',
        success: function (data) {
            console.log(data);
            $('#add_product #under_sub_category').html('');
            $.each(data, function (key, val){
                $('#add_product #under_sub_category').append(`<option value="`+val.id+`">`+val.under_sub_category+`</option> `);
            }); 
        }
   })
});

// product-adding
$('#add_product').on('submit', function(e) {
    e.preventDefault();
    const allDatas = new FormData(this);
    const msg = $('#add_product #msg');
    $.ajax({
        url: '/admin/add/product',
        type: 'POST',
        data: allDatas,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $('#add_product #submit').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            $(msg).html('');
            $('#add_product #submit').html('Upload');
            $(msg).html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Product is approved</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
            $('#add_product #Sub_category').html('');
            $('#add_product #under_sub_category').html('');
            $('#add_product').trigger('reset');
            $('.product_img .pip').remove();
            $('.summernote').html('');
        },
        error: function (errors) { 
            $(msg).html('');
            $.each(errors.responseJSON.errors, function (index, value) {
                $('#add_product #submit').html('fix problemm and then click');
                $(msg).append(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>`+value[0]+`</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div> `);
            });

        }
    });
});

// Active Product
$(document).on('click','#pro_active', function () {
    const id    = $(this).data('id'); 
    const badge = $('#products').find('tr[data-id="'+id+'"] #pro_status');
    const btn  = $('#products').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/active/product/'+id, 
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="pro_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-primary">Active</span>`);
            $(btn).html(`<button class="btn btn-danger" id="pro_inactive" data-id='`+id+`'>In Act</button>`);
        }
    }) 
});

// In-Active Product
$(document).on('click','#pro_inactive', function () {
    const id    = $(this).data('id');
    const badge = $('#products').find('tr[data-id="'+id+'"] #pro_status');
    const btn  = $('#products').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/inactive/product/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="pro_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-danger">In Active</span>`);
            $(btn).html(`<button class="btn btn-primary" id="pro_active" data-id='`+id+`'>Active</button>`);
        }
    }) 
});

// Delete Brand
$(document).on('click','#delete_product', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#products').find('#delete_product[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/product/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function () { 
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);  
        },
        success: function (data) {
            const rowsss     = $('#products').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});

// Add-coupon
$('#createCoupon').on('submit', function(e){
    e.preventDefault(); 
    const couponCoude = $('#createCoupon #coupon_code').val();
    const couponDisco = $('#createCoupon #discount').val();
    const all_coupon  = {
        code: couponCoude,
        disc: couponDisco,
    }
    const msg  = $('#createCoupon #msg');
    $.ajax({
        url: '/admin/add/coupon',
        type: 'POST',
        data:all_coupon,
        beforeSend: function () {
            $('#createCoupon #save').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... `);
        },
        success: function(data){ 
            $(msg).html('');
 
            $btn = '';
            if (data.status == 0) {
                $btn = '<span class="badge badge-danger"> In Active</span>'
            }else{
                $btn = '<span class="badge badge-primary">Active</span>'
            } 
            $actbtn = '';
            if (data.status == 0) { 
                $actbtn = '<button class="btn btn-danger" id="coupon_active" data-id='+data.id+'>Active</button>' 
            }else{
                $actbtn = '<button class="btn btn-danger" id="coupon_inactive" data-id='+data.id+'>In Active</button>' 
            } 
            $('#couponData').prepend(`<tr data-id="`+data.id+`">
                <td>`+data.coupon_code+`</td> 
                <td>`+data.discount+`</td> 
                <td id="coupon_status">`+$btn+`</td>
                <td>
                    <div id="actBtn" style="display: inline-block;">
                        `+$actbtn+`
                    </div> 
                    <button class="btn btn-danger" data-id="`+data.id+`" id='delete_coupon'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                        </svg>
                    </button>
                    </td>
            </tr>`);

            $('#createCoupon #save').html(`Save`);
            $(msg).html(`<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Uploaded successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`); 

            $('#createCoupon').trigger('reset');

        }  
    })
});

$('#createCoupon').on('hidden.bs.modal', function (e) {
    const msg  = $('#createCoupon #msg');
    $(msg).html('');
})

// Active Coupon
$(document).on('click','#coupon_active', function () {
    const id    = $(this).data('id'); 
    const badge = $('#couponData').find('tr[data-id="'+id+'"] #coupon_status');
    const btn  = $('#couponData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/active/coupon/'+id, 
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="coupon_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-primary">Active</span>`);
            $(btn).html(`<button class="btn btn-danger" id="coupon_inactive" data-id='`+id+`'>In Active</button>`);
        }
    }) 
});

// In-Active Coupon
$(document).on('click','#coupon_inactive', function () {
    const id    = $(this).data('id');
    const badge = $('#couponData').find('tr[data-id="'+id+'"] #coupon_status');
    const btn  = $('#couponData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/inactive/coupon/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="coupon_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-danger">In Active</span>`);
            $(btn).html(`<button class="btn btn-primary" id="coupon_active" data-id='`+id+`'>Active</button>`);
        }
    }) 
});

// Delete Coupon
$(document).on('click','#delete_coupon', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#couponData').find('#delete_coupon[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/coupon/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function () {
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#couponData').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});





// Active Blog
$(document).on('click','#blog_active', function () {
    const id    = $(this).data('id');
    console.log(id)
    const badge = $('#blog_posts').find('tr[data-id="'+id+'"] #post_sttus');
    const btn  = $('#blog_posts').find('tr[data-id="'+id+'"] #activeInactive_btn');
    $.ajax({
        type: 'POST',
        url: '/admin/active/blog/'+id, 
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="blog_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-primary">Active</span>`);
            $(btn).html(`<button class="btn btn-danger" id="blog_inactive" data-id='`+id+`'>In Active</button>`);
        }
    }) 
});

// In-Active Blog
$(document).on('click','#blog_inactive', function () {
    const id    = $(this).data('id');
    console.log(id)
    const badge = $('#blog_posts').find('tr[data-id="'+id+'"] #post_sttus');
    const btn  = $('#blog_posts').find('tr[data-id="'+id+'"] #activeInactive_btn');
    $.ajax({
        type: 'POST',
        url: '/admin/inactive/blog/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="blog_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-danger">In Active</span>`);
            $(btn).html(`<button class="btn btn-primary" id="blog_active" data-id='`+id+`'>Active</button>`);
        }
    }) 
});

// Delete Blog
$(document).on('click','#delete_blog', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#blog_posts').find('#delete_blog[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/blog/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function () {
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#blog_posts').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});



 
// /////////////////////////////////////////////////////////////////////////////////////////
//                              END Product & Banner START
// /////////////////////////////////////////////////////////////////////////////////////////



// Add Small Banner 
$(document).on('submit','#createBanners', function (e) {
    e.preventDefault();
    const dataa         = new FormData(this);
    const dataprepare   = $('#bannerData');
    $.ajax({
        url: '/admin/banner-small/add',
        type: 'POST',
        data: dataa,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            $('#createBanner #msg').html();
            $('#createBanner #msg').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success Fuly added</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);

           
            $(dataprepare).prepend(`<tr data-id='`+data.id+`'>
                <td> 
                    <img width="100px" src="http://localhost:8000/`+data.small_banner+`" alt="">
                </td>  
                <td>
                    Just now
                </td> 
                <td> 
                    <span class="badge badge-primary">Small Banner</span> 
                </td>
                <td>  
                    <button class="btn btn-danger" id='delete_banner' data-id='`+data.id+`'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></button>
                </td>
            </tr>`);
       


            $('#createBanners').trigger('reset');
        },
        error: function (errors) {
            $('#msg').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>`+errors+`</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }
    })
});
$('#createBanner').on('hidden.bs.modal', function () { 
    $('#createBanner #msg').html('');
})

$(document).on('click','#delete_banner', function(){
    const id = $(this).data('id');
    const row= $('#bannerData').find('tr[data-id="'+id+'"]');
    $.ajax({
        url: '/admin/banner/delated/'+id,
        type: 'POST',
        success: function (data) {
            $(row).remove().fadeOut();
        }
    })
});



// Add Big Banner 
$(document).on('submit','#createBigBanners', function (e) {
    e.preventDefault();
    const dataa         = new FormData(this);
    const dataprepare   = $('#bannerData');
    $.ajax({
        url: '/admin/banner-big/add',
        type: 'POST',
        data: dataa,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            $('#createBigBanners #msg').html();
            $('#createBigBanners #msg').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success Fuly added</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);

           
            $(dataprepare).prepend(`<tr data-id='`+data.id+`'>
                <td> 
                    <img width="100px" src="http://localhost:8000/`+data.big_banner+`" alt="">
                </td>  
                <td>
                    Just now
                </td> 
                <td> 
                    <span class="badge badge-primary">big Banner</span> 
                </td>
                <td>  
                    <button class="btn btn-danger" id='delete_banner' data-id='`+data.id+`'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></button>
                </td>
            </tr>`);
       


            $('#createBigBanners').trigger('reset');
        },
        error: function (errors) {
            $('#createBigBanners #msg').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>`+errors+`</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }
    })
});
$('#createBigBanner').on('hidden.bs.modal', function () { 
    $('#createBigBanners #msg').html('');
})

$(document).on('click','#delete_banner', function(){
    const id = $(this).data('id');
    const row= $('#bannerData').find('tr[data-id="'+id+'"]');
    $.ajax({
        url: '/admin/banner-big/delated/'+id,
        type: 'POST',
        success: function (data) {
            $(row).remove().fadeOut();
        }
    })
});




// Add Side Banner 
$(document).on('submit','#createSideBanners', function (e) {
    e.preventDefault();
    const dataa         = new FormData(this);
    const dataprepare   = $('#bannerData');
    $.ajax({
        url: '/admin/banner-side/add',
        type: 'POST',
        data: dataa,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            $('#createSideBanners #msg').html();
            $('#createSideBanners #msg').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success Fuly added</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);

           
            $(dataprepare).prepend(`<tr data-id='`+data.id+`'>
                <td> 
                    <img width="100px" src="http://localhost:8000/`+data.small_banner+`" alt="">
                </td>  
                <td>
                    Just now
                </td> 
                <td> 
                    <span class="badge badge-primary">Side Banner</span> 
                </td>
                <td>  
                    <button class="btn btn-danger" id='delete_banner' data-id='`+data.id+`'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></button>
                </td>
            </tr>`);
        

            $('#createSideBanners').trigger('reset');
        },
        error: function (errors) {
            $('#createSideBanners #msg').append(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>`+errors+`</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }
    })
});
$('#createSideBanner').on('hidden.bs.modal', function () { 
    $('#createSideBanners #msg').html('');
})

$(document).on('click','#delete_banner', function(){
    const id = $(this).data('id');
    const row= $('#bannerData').find('tr[data-id="'+id+'"]');
    $.ajax({
        url: '/admin/banner-side/delated/'+id,
        type: 'POST',
        success: function (data) {
            $(row).remove().fadeOut();
        }
    })
});



 
// /////////////////////////////////////////////////////////////////////////////////////////
//                              END Banner & Slider START
// /////////////////////////////////////////////////////////////////////////////////////////


// Add Slider
$(document).on('submit', '#add_new_slider', function (e) {
    e.preventDefault(); 
    const wrp = $('#slidercontent').val(); 
    $.ajax({
        url: '/admin/header/slider/add',
        type: 'POST',
        data: {blog_content:wrp},
        success: function (data) {
            $('#slider_msg').html('');
            $('#slider_msg').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success Fuly added</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
 
        },
        error: function (errors) {
            $('#slider_msg').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>`+errors+`</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }
    });
});


// Active Blog
$(document).on('click','#slider_active', function () {
    const id    = $(this).data('id');
    const badge = $('#sliderData').find('tr[data-id="'+id+'"] #slider_status');
    const btn  = $('#sliderData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/active/slider/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="slider_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-primary">Active</span>`);
            $(btn).html(`<button class="btn btn-danger" id="slider_inactive" data-id='`+id+`'>In Active</button>`);
        }
    }) 
});

// In-Active Blog
$(document).on('click','#slider_inactive', function () {
    const id    = $(this).data('id'); 
    const badge = $('#sliderData').find('tr[data-id="'+id+'"] #slider_status');
    const btn  = $('#sliderData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/inactive/slider/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="slider_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-danger">In Active</span>`);
            $(btn).html(`<button class="btn btn-primary" id="slider_active" data-id='`+id+`'>Active</button>`);
        }
    }) 
});

// Delete Blog
$(document).on('click','#delete_slider', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#sliderData').find('#delete_slider[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/slider/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function () {
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#sliderData').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});



 
// /////////////////////////////////////////////////////////////////////////////////////////
//                              END Slider & Page START
// /////////////////////////////////////////////////////////////////////////////////////////





// Active Blog
$(document).on('click','#page_active', function () {
    const id    = $(this).data('id');
    const badge = $('#pageData').find('tr[data-id="'+id+'"] #page_status');
    const btn  = $('#pageData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/active/page/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="page_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-primary">Active</span>`);
            $(btn).html(`<button class="btn btn-danger" id="page_inactive" data-id='`+id+`'>In Active</button>`);
        }
    }) 
});

// In-Active Blog
$(document).on('click','#page_inactive', function () {
    const id    = $(this).data('id'); 
    const badge = $('#pageData').find('tr[data-id="'+id+'"] #page_status');
    const btn  = $('#pageData').find('tr[data-id="'+id+'"] #actBtn');
    $.ajax({
        type: 'POST',
        url: '/admin/inactive/page/'+id,
        cache: false,
        beforeSend: function () {
            $(btn).html(`<button class="btn btn-warning" id="page_active" data-id='`+id+`'><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`);
        },
        success: function (data) {
            $(badge).html(`<span class="badge badge-danger">In Active</span>`);
            $(btn).html(`<button class="btn btn-primary" id="page_active" data-id='`+id+`'>Active</button>`);
        }
    }) 
});

// Delete Blog
$(document).on('click','#page_delete', function(){
    const mid    = $(this).data('id');
    const dbtn   = $('#pageData').find('#page_delete[data-id="'+mid+'"]');  
    $.ajax({
        url: '/admin/delete/page/'+mid,
        type: 'POST',
        cache: false,
        beforeSend: function () {
            $(dbtn).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        },
        success: function (data) {
            const rowsss     = $('#pageData').find('tr[data-id="'+mid+'"]');
            $(rowsss).remove();
        }
    });
});




 
// /////////////////////////////////////////////////////////////////////////////////////////
//                              END Slider & Page START   
// /////////////////////////////////////////////////////////////////////////////////////////

// Edit-modal data-showing for message
$(document).on('click', '#send-message', function (){
    const id        = $(this).data('id'); 
    const setID     = $('#sendMessageNow').attr('data-id', id);
    const addNumber = $('#sendMessageNow #customerNum'); 

    $.ajax({
        url: '/admin/datafor/message/'+id,
        type: 'POST',
        success: function (data) { 
            $(addNumber).val('');   
            $(addNumber).val(data.phone_number);
            console.log(data);
        }
    });
    
});


 

// Edit-modal data-showing for message
$(document).on('click', '#send-mail', function (){
    const id        = $(this).data('id'); 
    const setID     = $('#sendEmailNow').attr('data-id', id);
    const addEmail  = $('#sendEmailNow #customerEmail'); 

    $.ajax({
        url: '/admin/datafor/email/'+id,
        type: 'POST',
        success: function (data) { 
            $(addEmail).val('');   
            $(addEmail).val(data.email);
            console.log(data);
        }
    });
    
});


 