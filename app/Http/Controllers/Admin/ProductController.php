<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\AddCart;
use App\Product;
use Image;
use DB;
use Carbon\Carbon;

class ProductController extends Controller{
        
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Index page
    public function index(){
        $mainCategory = Category::latest()->get();
        $allBrand     = Brand::latest()->get();
        return view('admin.product', compact('mainCategory', 'allBrand'));
    }
         
    // Edit-Index page
    public function update_index($id){
        $mainCategory = Category::latest()->get();
        $allBrand     = Brand::latest()->get();
        $Product = Product::where('id', $id)->latest()->get();
        return view('admin.editPro', compact('mainCategory', 'allBrand', 'Product'));
    }
        
    // all_Product page
    public function allindex(){ 
        $Product = Product::latest()->get(); 
        return view('admin.all_product', compact('Product'));
    }

    // Main-category
    public function mainCategory($id){
        $data = subcategory::where('category_id', $id)->latest()->get(); 
        return response()->json($data, 200);
    }

    // Sub-category
    public function subCategory($id){
        $data = UnderSub::where('sub_category', $id)->latest()->get(); 
        return response()->json($data, 200);
    }

    // Save_post
    public function savePost(Request $req){ 
        $title_url = str_replace(' ', '-',$req->Title);
        $title_url = str_replace(',', '-',$title_url);
        $title_url = str_replace('.', '-',$title_url);
        $title_url = str_replace("'", '-',$title_url);
        $title_url = str_replace('"', '-',$title_url);
        $file      = $req->file('product_img');
        $url       = [];
        foreach($file as $img){
            $name_gen   = $title_url.'-'.hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->save('admin/dist/images/product/'.$name_gen);
            $img_url    = 'admin/dist/images/product/'.$name_gen;
            $url[] = $img_url;
        } 
        Product::insert([
            'brand'         => $req->brand,
            'category'      => $req->Main_category,
            'subcategory'   => $req->Sub_category,
            'undercategory' => $req->under_sub_category,
            'title'         => $req->Title,
            'url'           => $title_url,
            'price'         => $req->Price, 
            'quantity'      => $req->Quantity,
            'discount'      => $req->Discount,
            'avaiable'      => $req->stock,
            'colors'        => 'red',
            'product_img'   => json_encode($url),
            'short_desc'    => $req->short_desc,
            'full_desc'     => $req->full_desc, 
            'created_at'    => Carbon::now(),
        ]);

        return response()->json();
    }
    
    // Edit submit
    public function update_submit(Request $req){ 
        $fimg = Product::where('id',$req->$id)->first();
        $img_decode = json_decode($fimg->product_img);
        foreach ($img_decode as $value){
            unlink($value);
        }
        $title_url = str_replace(' ', '-',$req->Title);
        $title_url = str_replace(',', '-',$title_url);
        $title_url = str_replace('.', '-',$title_url);
        $title_url = str_replace("'", '-',$title_url);
        $title_url = str_replace('"', '-',$title_url);
        $file      = $req->file('product_img');
        $url       = [];
        foreach($file as $img){
            $name_gen   = $title_url.'-'.hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->save('admin/dist/images/product/'.$name_gen);
            $img_url    = 'admin/dist/images/product/'.$name_gen;
            $url[] = $img_url;
        } 
        Product::where('id', $req->id)->update([
            'brand'         => $req->brand,
            'category'      => $req->Main_category,
            'subcategory'   => $req->Sub_category,
            'undercategory' => $req->under_sub_category,
            'title'         => $req->Title,
            'url'           => $title_url,
            'update_price'  => $req->Price, 
            'quantity'      => $req->Quantity,
            'discount'      => $req->Discount,
            'avaiable'      => $req->stock,
            'colors'        => 'red',
            'product_img'   => json_encode($url),
            'short_desc'    => $req->short_desc,
            'full_desc'     => $req->full_desc, 
            'updated_at'    => Carbon::now(),
        ]);

        return Redirect()->back();
    }

    // active
    public function active($id){
        Product::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json();
    }

    // Inactive
    public function inactive($id){
        Product::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json();
    }
 
    // Delete
    public function delete($id){
        $fimg = Product::where('id',$id)->first();
        $img_decode = json_decode($fimg->product_img);
        foreach ($img_decode as $value){
            unlink($value);
        }
        Product::find($id)->delete();
        return response()->json();
    }

    // Detailse
    public function detailse($name){
        $getSub = UnderSub::where('under_sub_category', $name)->first();
        $detailse_data = Product::where('undercategory', $getSub->id)->latest()->get();
        return view('front.shop_details', compact('detailse_data'));
    }

    // Add to cart from details page
    public function addtocart(Request $req, $id){
        $ip = request()->ip();  
        $test = AddCart::where('ip_address', $ip)->Where('product_id', $id)->latest()->get();
        if (count($test) > 0) {
            $test = AddCart::where('ip_address', $ip)->Where('product_id', $id)->increment('qty');
        }else{
                AddCart::insert([
                'product_id'  => $id,
                'qty'         => $req->qty,
                'price'       => $req->price,
                'total'       => $req->price*$req->qty,
                'ip_address'  => $ip,
                'username'    => 'nasim',
                'created_at'  => Carbon::now()
            ]);
        } 
        $qt     = AddCart::where('ip_address', $ip)->sum('qty');
        $prc    = AddCart::where('ip_address', $ip)->sum('price');
        $total  = $qt*$prc;
        return response()->json([
            'qty'      =>$qt,
            'price'    =>$prc,
            'total'    =>$total,
        ], 200);

    }

}
