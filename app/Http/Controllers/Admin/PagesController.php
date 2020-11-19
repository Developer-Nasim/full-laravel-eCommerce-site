<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Pages;
use App\Contact;
use Image;
use Carbon\Carbon;

class PagesController extends Controller
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
        $data = Pages::latest()->get();
        return view('admin.pages', compact('data'));
    }

    // make_page
    public function make_page(){ 
        return view('admin.make_page');
    }

    // Preview page
    public function preview($name){
        $page_data = Pages::where('name', $name)->first();
        return view('front.pages', compact('page_data'));
    }

    // create page
    public function create_page(Request $request){
        Pages::insert([
            'name'          => $request->page_name,
            'page_content'  => $request->page_content,
            'created_at'    =>  Carbon::now(),
        ]);

        return Redirect()->back()->with('page_added', 'Page created SuccessFully..!');
    }

     
    // active
    public function active($id){
        Pages::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json();
    }

    // Inactive
    public function inactive($id){
        Pages::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json();
    } 

    // Delete
    public function delete($id){  
        Pages::find($id)->delete();
        return response()->json();
    }



}
