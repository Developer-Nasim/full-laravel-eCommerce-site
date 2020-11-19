<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\subcategory;
use App\UnderSub;
use Image;
use DB;
use Carbon\Carbon;

class undersubCategoryController extends Controller{
    
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
        $all_category       = Category::latest()->get();
        $all_subcategory    = subcategory::latest()->get();
        $UnderSubController = UnderSub::latest()->get();
        return view('admin.undersubcategory', compact('all_category','all_subcategory','UnderSubController'));
    }

    // Insert
    public function save(Request $req){  
        $data =  UnderSub::insert([
            'category_id'       => $req->categoryNm,
            'sub_category'      => $req->categorySubNm,
            'under_sub_category'=> $req->undersubcategoryname, 
            'created_at'        => Carbon::now(),
        ]);  
        $cate       = Category::where('id', $req->categoryNm)->first();
        $sbcate     = subcategory::where('id', $req->categorySubNm)->first();
        $sbunder    = UnderSub::where('under_sub_category', $req->undersubcategoryname)->first();  
        return response()->json([
            'categ'     => $cate->name,
            'sbname'    => $sbcate->sub_name,
            'sbun'      => $sbunder->under_sub_category,
            'created_at'=> $sbunder->created_at,
            'id'        => $sbunder->id,
        ], 200);
    }   

    // select
    public function select($id){
        $subCategorys    = subcategory::where('category_id', $id)->latest()->get();
        return response()->json($subCategorys, 200);
    }

    // Delete
    public function delete($id){  
        UnderSub::find($id)->delete();
        return response()->json();
    }
 
 

}
