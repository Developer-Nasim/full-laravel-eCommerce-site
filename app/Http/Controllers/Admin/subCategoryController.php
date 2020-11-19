<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\subcategory;
use Image;
use Carbon\Carbon;

class subCategoryController extends Controller{
    
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
        $all_category = Category::latest()->get();
        $all_subcategory = subcategory::latest()->get();
        return view('admin.subcategory', compact('all_category','all_subcategory'));
    }

    // Insert
    public function save(Request $req){  
        $data =  subcategory::insert([
            'sub_name'      => $req->subcategoryname,
            'category_id'   => $req->categoryNm,
            'created_at'    => Carbon::now(), 
        ]);  
        $allData    = subcategory::where('sub_name', $req->subcategoryname)->first(); 
        return response()->json($allData, 200);
    }   

    // Delete
    public function delete($id){  
        subcategory::find($id)->delete();
        return response()->json();
    }
 
 

}
