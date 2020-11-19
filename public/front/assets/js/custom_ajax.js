$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
 

$(document).on('click','#product_preview_btn',function(e){
    e.preventDefault(); 
    const graveModel    = $('.modal_body');
    const id            = $(this).data('id');
    const setId         = $('#product_preview').attr('data-id', id);
    console.log(id);
    $.ajax({
        url: '/home/add/product/preview/'+id,
        type: 'POST',
        success: function (datas){
            $(graveModel).html();
            const discount = (datas.price*datas.discount)/100;
            const totalPrice    = datas.price-discount;
            const fb_share = 'https://www.localhost.com/admin/brand'+datas.title;
            $(graveModel).html(`
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large" id="display_itemm" style="display: block !important">
  
 
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{asset('front')}}/assets/img/product/product1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{asset('front')}}/assets/img/product/product2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{asset('front')}}/assets/img/product/product3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="{{asset('front')}}/assets/img/product/product5.jpg" alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>`+datas.title+`</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$`+totalPrice+`</span>
                                    <span class="old_price" >$`+datas.price+`</span>
                                </div>
                                <div class="modal_description mb-15">
                                `+datas.short_desc+`
                                </div>
                                <div class="variants_selects"> 
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option form-control" name="color">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <input min="1" max="100" step="2" value="1" name="qty" class="form-control" style="width:100px;display:inline-block" type="number">
                                        <button type="submit">add to cart</button>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="https://www.facebook.com/sharer.php?u=`+fb_share+`"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="https://twitter.com/share?url=`+fb_share+`&text=`+datas.title+`&hashtags=`+datas.title+`"><i class="fa fa-twitter"></i></a></li>
                                      
                                        <li class="linkedin"><a href="https://www.linkedin.com/shareArticle?url=`+fb_share+`&title=`+datas.title+`"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`); 
                const img = json_decode(datas.product_img);
                $.each(img, function (key,val) {
                    $('.modal_tab').html('<div class="tab-pane fade show active" id="tab1" role="tabpanel"><div class="modal_tab_img"><a><img src="http://localhost:8000/'+val+'" alt=""></a></div></div>');
                })
        }
    });
})

// Add to cart
$(document).on('click','#addtocart', function(e){
    e.preventDefault();
    const id    = $(this).data('id');
    const title = $(this).data('title');
    const price = $(this).data('price');
    const addpr = {
        product_id: id,
        product_title: title,
        product_price: price,
    };
    $.ajax({
        url: '/home/add/to/cart/'+id,
        type: 'POST',
        data: addpr,
        cache: false,
        success: function (data) { 
            $('#totalitemPrice').html(data.total);
            $('.cart_quantity').html(data.qty);
        }
    })
})
 
// Add to wish
$(document).on('click','#addtoWhish', function(e){
    e.preventDefault();
    const id    = $(this).data('id');
    const title = $(this).data('title'); 
    const whisData = {
        product_id: id,
        product_title: title,
    };
    $.ajax({
        url: '/home/add/to/whish/'+id,
        type: 'POST',
        data: whisData,
        cache: false,
        success: function (data) {
            $('.wishlist_quantity').html(data);
        }
    })
})
 
// Add to compare
$(document).on('click','#addtoCompare', function(e){
    e.preventDefault();
    const id    = $(this).data('id');
    const title = $(this).data('title'); 
    const whisData = {
        product_id: id,
        product_title: title,
    }; 
    $.ajax({
        url: '/home/add/to/compare/'+id,
        type: 'POST',
        data: whisData,
        cache: false,
        success: function (data) {
            $('.Compare').html('<i class="icon-repeat"></i> Compare ('+data+')'); 
        }
    })
})

$('#emls').on('submit', function (e) {
    e.preventDefault();
    const email = $('#email').val();
    $.ajax({
        url: '/home/add/subcriber',
        type: 'POST',
        data: {email:email},
        success: function (data) {
            console.log('Subscribed');
            $('#emls').trigger('reset');
        }
    })
});


$('#product_reviewsssss').on('submit', function(e){
    e.preventDefault();  
    const atr     = $('#product_reviewsssss input[name="author"]').val(); 
    const id      = $('#product_reviewsssss').data('id'); 
    const eml     = $('#product_reviewsssss input[name="email"]').val(); 
    const cmt     = $('#product_reviewsssss textarea[name="comment"]').val(); 
    const sdt     = $('#product_reviewsssss input[name="radio_star"]').val();
    const allData = {
        name: atr,
        email: eml,
        cont: sdt,
        review:cmt,
        id: id,
    }
    $.ajax({
        url: '/home/review/add/'+id,
        type: 'POST',
        data: allData,
        success: function (data) {
            $('#review_count').html(`Reviews (`+data+`)`);
               $('.all_feeds').prepend(`<div class="reviews_comment_box">
               <div class="comment_thmb">
                   <img src="http://localhost:8000/front/assets/img/blog/comment2.jpg" alt="">
               </div>
               <div class="comment_text">
                   <div class="reviews_meta">
                       <div class="star_rating">
                           <ul> 
                           <li><a href="#">`+sdt+`<i class="ion-ios-star"></i></a></li>    
                           </ul>
                       </div>
                       <p><strong>`+atr+`</strong>- now </p>
                       <span>`+cmt+`</span>
                   </div>
               </div> 
           </div>`);  
            $('#product_reviewsssss').trigger('reset');
        },
        error: function (errors) {
            console.log(errors)
        }
    })
})

$('#addTocatfrom_details').on('click', function(){
    const id        = $(this).data('id');
    const price     = $(this).data('price');
    const qty= $('#addTocatfrom_details_qty').val();
    const datas = {
        id: id,
        qty: qty,
        price: price,
    }   
    $.ajax({
        url: '/add/tocart/from/detailse/'+id,
        type: 'POST',
        data: datas,
        success: function (data){ 
            $('#alertss').html('Yeah this is added');
            $('#totalitemPrice').html(data.total);
            $('.cart_quantity').html(data.qty);
        }
    });
});

$('#price_range').slider({
    range:true,
    min:1000,
    max:65000,
    values:[1000, 65000],
    step:500,
    stop:function(event, ui)
    {
        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
        $('#hidden_minimum_price').val(ui.values[0]);
        $('#hidden_maximum_price').val(ui.values[1]);
        filter_data();
    }
});


// Cart Update
$(document).on('click','#product_update_cart', function (e){
    e.preventDefault();
    const id = $(this).data('id');
    const qty = $('#cart_qty').val();
    $.ajax({
        url: '/cart/update/'+id,
        type: 'POST',
        data: {qty:qty},
        success: function (data) { 
            console.log('success');
        }
    })
})
// Cart Delete
$(document).on('click','#product_remove_cart', function (e){
    e.preventDefault();
    const id = $(this).data('id'); 
    const row = $('.allcontent tr[data-id="'+id+'"]');
    $.ajax({
        url: '/cart/remove/'+id,
        type: 'POST',
        success: function (data) { 
            $(row).remove().fadeOut();
            $('.cart_quantity').html(data);
        }
    })
})


// Whishlist Delete
$(document).on('click','#product_remove_whish', function (e){
    e.preventDefault();
    const id = $(this).data('id'); 
    const row = $('.allWhishContent tr[data-id="'+id+'"]');
    $.ajax({
        url: '/cart/remove/whishlist/'+id,
        type: 'POST',
        success: function (data) {
            $(row).remove().fadeOut();
            $('.wishlist_quantity').html(data);
        }
    })
})
 
// Whishlist to Cart
$(document).on('click','#product_whish_cart', function (e){
    e.preventDefault();
    const id    = $(this).data('id'); 
    const row   = $('.allWhishContent tr[data-id="'+id+'"]');
    const price = $(this).data('price');
    $.ajax({
        url: '/cart/whishlist/to/cart/'+id,
        type: 'POST',
        data: {product_price: price},
        success: function (data) {
            $(row).remove().fadeOut(); 
            $('.wishlist_quantity').html(data);
        }
    })
})
 

$(document).on('submit', '#contact_form', function (e) {
    e.preventDefault();
    const name = $('#contact_form #name').val();
    const email = $('#contact_form #email').val();
    const subject = $('#contact_form #subject').val();
    const message = $('#contact_form #message').val();
    const cdata = {
        name:name,
        email:email,
        subject:subject,
        message:message,
    }
    $.ajax({
        url: '/send/message',
        type: 'POST',
        data: cdata,
        success: function(data) {
            $('#message_sent_fromUser').html('');
            $('#message_sent_fromUser').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thank you..! This message has been sent</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
        }
    })
});