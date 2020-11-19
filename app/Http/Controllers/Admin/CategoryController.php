<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Category;
use App\subcategory;
use App\UnderSub;
use Image;
use Carbon\Carbon;

class CategoryController extends Controller{
    
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
        return view('admin.category', compact('all_category'));
    }

    // Insert
    public function save(Request $req){  
        $data =  Category::insert([
            'name'          => $req->categoryname, 
            'created_at'    => Carbon::now(), 
        ]);  
        $allData    = Category::where('name', $req->categoryname)->first(); 
        return response()->json($allData, 200);
    }  

    // active
    public function active($id){
        Category::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json();
    }

    // Inactive
    public function inactive($id){
        Category::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json();
    }

    // Delete
    public function delete($id){  
        Category::find($id)->delete();
        return response()->json();
    }

    // Edit_data show
    public function editeDataShow($id){
        $data = Category::where('id', $id)->first();
        return response()->json($data, 200);
    }

    // Edit submit
    public function editeDataSub(Request $req, $id){
        $dts = Category::where('id', $id)->first(); 
        Category::where('id', $id)->update([
            'name'        => $req->editCategName,
            'updated_at'  => Carbon::now(),
        ]);   
        return response()->json($dts, 200);
    }

    // showCategory
    public function showCategory($subCateName){
        $sub        = subcategory::where('sub_name', $subCateName)->first();
        $subData    = Product::all()->where('subcategory', $sub->id);
        return view('front.sub_category', compact('subData'));
    }

    // showCategory
    public function showUnCategory($subUnCateName){
        $Unsub        = UnderSub::where('under_sub_category', $subUnCateName)->first();
        $UnsubData    = Product::all()->where('undercategory', $Unsub->id);
        return view('front.Un_sub_category', compact('UnsubData'));
    }













}
