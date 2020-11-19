<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Front-end routes START
Route::get('/home', 'Front\homeController@index');
Route::get('/', 'Front\homeController@index');
 
Auth::routes(); 
Route::get('/home', 'HomeController@index')->name('home');  



// Seach page
Route::get('shop/shearch', 'Front\ShopController@search');

// Cart 
Route::post('/home/add/to/cart/{id}', 'Front\AddCartController@addCart');
Route::get('home/cart','Front\AddCartController@cartData');
Route::post('/cart/remove/{id}','Front\AddCartController@Delete');
Route::post('/cart/update/{id}','Front\AddCartController@Update');

// Add to Whish-list
Route::get('/home/go/to/whish/', 'Front\WhishListController@index');
Route::post('/home/add/to/whish/{id}', 'Front\WhishListController@addWhish');
Route::post('/cart/remove/whishlist/{id}', 'Front\WhishListController@delete');
Route::post('/cart/whishlist/to/cart/{id}', 'Front\WhishListController@wishtoCart');

// Add to Compare 
Route::post('/home/add/to/compare/{id}', 'Front\AddtoCompareController@addCompare');

// Product-preview
Route::post('/home/add/product/preview/{id}', 'Front\homeController@showData');

// Product-preview
Route::post('/home/add/subcriber', 'Front\NewslatterController@newslatterAdd');

// Product-detailse
Route::get('/home/shop/product/details/{product_name}', 'Admin\ProductController@detailse');
Route::post('/add/tocart/from/detailse/{id}', 'Admin\ProductController@addtocart');
Route::post('/home/review/add/{id}', 'Front\ProductReviewController@reviewInsert');

// Shop
Route::get('/shop','Front\ShopController@index');
Route::get('/home/popular/category/{name}','Front\ShopController@popularCategory');

// /Checkout page
Route::get('home/shop/check/out','Front\checkOut@index');
Route::post('home/shop/checkout/place/order','Front\checkOut@placeOrder')->name('place.order.now');







// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END




 




// Admin home
Route::get('/admin/home', 'Admin\AdmnController@index'); 

// About
Route::get('admin/about/all', 'Admin\AboutController@index');
Route::post('admin/about/info/save', 'Admin\AboutController@saveInfo')->name('save.info');
Route::post('admin/about/info/update', 'Admin\AboutController@updateInfo')->name('update.info');


// Orders
Route::get('admin/order', 'Admin\OrderController@index');
Route::post('admin/datafor/message/{id}', 'Admin\OrderController@showNum');
Route::post('admin/datafor/email/{id}', 'Admin\OrderController@showEmail'); 

// Brand-routers START
Route::get('/admin/brand', 'Admin\BrandController@index');
Route::post('/admin/add/brand', 'Admin\BrandController@save');
Route::post('/admin/delete/brand/{id}', 'Admin\BrandController@delete');
Route::post('/admin/active/brand/{id}', 'Admin\BrandController@active');
Route::post('/admin/inactive/brand/{id}', 'Admin\BrandController@inactive');
Route::post('/admin/editModal/brand/{id}', 'Admin\BrandController@editeDataShow');
Route::post('/admin/editSub/brand/{id}', 'Admin\BrandController@editeDataSub');


// Category-routers
Route::get('/admin/category', 'Admin\CategoryController@index');
Route::post('/admin/add/category', 'Admin\CategoryController@save');
Route::post('/admin/delete/category/{id}', 'Admin\CategoryController@delete');
Route::post('/admin/active/category/{id}', 'Admin\CategoryController@active');
Route::post('/admin/inactive/category/{id}', 'Admin\CategoryController@inactive');
Route::post('/admin/editModal/category/{id}', 'Admin\CategoryController@editeDataShow');
Route::post('/admin/editSub/category/{id}', 'Admin\CategoryController@editeDataSub');
Route::get('/shop/sub/category/{sub_name}','Admin\CategoryController@showCategory');
Route::get('/shop/sub/under/category/{sub_name}','Admin\CategoryController@showUnCategory');


// Sub-Category-routers
Route::get('/admin/subcategory', 'Admin\subCategoryController@index');
Route::post('/admin/add/sub/category', 'Admin\subCategoryController@save');
Route::post('/admin/delete/subcategory/{id}', 'Admin\subCategoryController@delete'); 


// Sub-Category-routers
Route::get('/admin/undersubcategory', 'Admin\undersubCategoryController@index');
Route::post('/admin/add/under/sub/category', 'Admin\undersubCategoryController@save');
Route::post('/admin/delete/under/subcategory/{id}', 'Admin\undersubCategoryController@delete');
Route::post('/admin/category/change/{id}', 'Admin\undersubCategoryController@select');

// Back Prodcut-routes
Route::get('/admin/products', 'Admin\ProductController@index');
Route::get('/admin/product/edit/{id}', 'Admin\ProductController@update_index');
Route::post('/admin/product/edit/submit', 'Admin\ProductController@update_submit')->name('edit.submit');
Route::get('/admin/all/products', 'Admin\ProductController@allindex');
Route::post('/admin/product/delection/main_category/{id}', 'Admin\ProductController@mainCategory');
Route::post('/admin/product/delection/sub_category/{id}', 'Admin\ProductController@subCategory');
Route::post('/admin/add/product', 'Admin\ProductController@savePost');
Route::post('/admin/active/product/{id}', 'Admin\ProductController@active');
Route::post('/admin/inactive/product/{id}', 'Admin\ProductController@inactive');
Route::post('/admin/delete/product/{id}', 'Admin\ProductController@delete');

// Coupon-routers START
Route::get('/admin/coupon', 'Admin\CouponController@index');
Route::post('/admin/add/coupon', 'Admin\CouponController@save');
Route::post('/admin/delete/coupon/{id}', 'Admin\CouponController@delete');
Route::post('/admin/active/coupon/{id}', 'Admin\CouponController@active');
Route::post('/admin/inactive/coupon/{id}', 'Admin\CouponController@inactive'); 

// Banner-routers START
Route::get('/admin/banner', 'Admin\BannerController@index');
Route::post('/admin/banner-small/add', 'Admin\BannerController@smallBanner');
Route::post('/admin/banner/delated/{id}', 'Admin\BannerController@delete');

Route::post('/admin/banner-big/add', 'Admin\BannerController@BiglBanner'); 
Route::post('/admin/banner-big/delated/{id}', 'Admin\BannerController@BigDelete');

Route::post('/admin/banner-side/add', 'Admin\BannerController@sideBanner'); 
Route::post('/admin/banner-side/delated/{id}', 'Admin\BannerController@sideDelete');



// Blog
Route::get('home/all/blog', 'Admin\AddBlogController@frontBlog');
Route::get('admin/add/blog', 'Admin\AddBlogController@index');
Route::get('admin/all/blogs', 'Admin\AddBlogController@all_blogs');
Route::post('/admin/blog/add/post', 'Admin\AddBlogController@addPost');
Route::post('/admin/inactive/blog/{id}', 'Admin\AddBlogController@inactive');
Route::post('/admin/active/blog/{id}', 'Admin\AddBlogController@active');
Route::post('/admin/delete/blog/{id}', 'Admin\AddBlogController@delete');
Route::get('/admin/blog/edit/{id}', 'Admin\AddBlogController@showforEdit');
Route::post('/admin/blog/edit/post', 'Admin\AddBlogController@editSubmit');
Route::get('/admin/blog/{title}', 'Admin\AddBlogController@blog_detailse');

 

// Contact
Route::get('home/contact', 'Admin\ContactController@indexFront');
Route::post('send/message', 'Admin\ContactController@messageSend');

 

// Header slider
Route::get('admin/header/slider', 'Admin\SliderController@index');
Route::get('admin/header/all/slider', 'Admin\SliderController@allindex');
Route::post('admin/header/slider/add', 'Admin\SliderController@sliderAdd')->name('add.slider');
Route::post('admin/header/slider/edit', 'Admin\SliderController@sliderEdit')->name('edit.slider');
Route::post('admin/active/slider/{id}', 'Admin\SliderController@active');
Route::post('admin/inactive/slider/{id}', 'Admin\SliderController@inactive');
Route::post('admin/delete/slider/{id}', 'Admin\SliderController@delete');
Route::get('admin/slider/edit/{id}', 'Admin\SliderController@edit_page');


// Page Routes
Route::get('admin/pages/all', 'Admin\PagesController@index');
Route::get('admin/pages/make_new', 'Admin\PagesController@make_page');
Route::post('admin/pages/make.page', 'Admin\PagesController@create_page')->name('add.page');
Route::post('admin/active/page/{id}', 'Admin\PagesController@active');
Route::post('admin/inactive/page/{id}', 'Admin\PagesController@inactive');
Route::post('admin/delete/page/{id}', 'Admin\PagesController@delete');
Route::get('home/page/{page_name}', 'Admin\PagesController@preview');