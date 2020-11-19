<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Product;
use App\Banner;
use Image;
use DB;
use Carbon\Carbon;

class BannerController extends Controller
{
    
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
        $all_data = Banner::latest()->get();
        return view('admin.banner', compact('all_data'));
    }

    // Insert Small Banner
    public function smallBanner(Request $req){
        $img = $req->file('bannerImage');
        $name_gen   = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/banner/'.$name_gen);
        $img_url    = 'admin/dist/images/banner/'.$name_gen;
        
        Banner::insert([
            'small_banner'  => $img_url,
            'big_banner'    => $img_url,
            'side_banner'   => $img_url,
            'banner_status' => 1,
            'created_at'    => Carbon::now()
        ]);

        $dataPass = Banner::where('small_banner', $img_url)->first();
        return response()->json($dataPass);
    }  

    // Delete Small banner
    public function delete($id){ 
        $fimg = Banner::where('id',$id)->first();
        if ($fimg->small_banner) { 
            unlink($fimg->small_banner); 
        }elseif($fimg->big_banner) {
            unlink($fimg->big_banner); 
        }elseif($fimg->banner_status) {
            unlink($fimg->banner_status); 
        }elseif($fimg->side_banner) {
            unlink($fimg->side_banner); 
        }
        Banner::find($id)->delete();
        return response()->json();
    }

    // Insert Big Banner
    public function BiglBanner(Request $req){
        $img = $req->file('bannerImage');
        $name_gen   = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/banner/'.$name_gen);
        $img_url    = 'admin/dist/images/banner/'.$name_gen;
        
        Banner::insert([
            'small_banner'  => $img_url,
            'big_banner'    => $img_url,
            'side_banner'   => $img_url,
            'banner_status' => 2,
            'created_at'    => Carbon::now()
        ]);

        $dataPass = Banner::where('big_banner', $img_url)->first();
        return response()->json($dataPass);
    }  
 
    // Insert Side Banner
    public function sideBanner(Request $req){
        $img = $req->file('bannerImage');
        $name_gen   = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/banner/'.$name_gen);
        $img_url    = 'admin/dist/images/banner/'.$name_gen;
        
        Banner::insert([
            'small_banner'  => $img_url,
            'big_banner'    => $img_url,
            'side_banner'   => $img_url,
            'banner_status' => 3,
            'created_at'    => Carbon::now()
        ]);

        $dataPass = Banner::where('side_banner', $img_url)->first();
        return response()->json($dataPass);
    }  
 



}
