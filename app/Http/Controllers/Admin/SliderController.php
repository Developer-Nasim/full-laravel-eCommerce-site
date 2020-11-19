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
use App\Slider;
use Image;
use DB;
use Carbon\Carbon;

class SliderController extends Controller
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


    // Index
    public function index(){
        return view('admin.slider');
    }

    // All-Index
    public function allindex(){
        $data = Slider::latest()->get();
        return view('admin.all_slider', compact('data'));
    }

    // Edit index
    public function edit_page($id){
        $data = Slider::where('id', $id)->latest()->get();
        return view('admin.editSlider', compact('data'));
    }

    // Add slider
    public function sliderAdd(Request $request){
        $img        =  $request->file('sliderImg'); 
        $name_gen   = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/slider/'.$name_gen);
        $url        = 'admin/dist/images/slider/'.$name_gen;
        Slider::insert([
            'slider_img'        => $url,
            'slider_wrp'        => $request->blog_content,
            'created_at'        => Carbon::now(),
        ]); 
        return Redirect()->back()->with('slider_added', 'Your slider is added');
    }
 

    // Edit slider
    public function sliderEdit(Request $request){

        $fimg = Slider::where('id',$request->id)->first(); 
        unlink($fimg->slider_img); 

        $img        =  $request->file('sliderImg');   
        $name_gen   = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/slider/'.$name_gen);
        $url        = 'admin/dist/images/slider/'.$name_gen;
        
        Slider::where('id', $request->id)->update([
            'slider_img'        => $url,
            'slider_wrp'        => $request->blog_content,
            'updated_at'        => Carbon::now(),
        ]); 
        return Redirect()->back()->with('slider_updated', 'Your slider is Updated');
    }
 
    // active
    public function active($id){
        Slider::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json();
    }

    // Inactive
    public function inactive($id){
        Slider::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json();
    } 

    // Delete
    public function delete($id){ 
        $fimg = Slider::where('id',$id)->first(); 
        unlink($fimg->slider_img); 
        Slider::find($id)->delete();
        return response()->json();
    }



}
