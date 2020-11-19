<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Image;
use Carbon\Carbon;

class BrandController extends Controller{

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
        $all_data = Brand::latest()->get();
        return view('admin.brand', compact('all_data'));
    }

    // Insert
    public function save(Request $req){ 
        $img        = $req->file('brand_img');
        $img_name   =  strtolower($req->brand_name).'-'.hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/brand/'.$img_name);
        $url        = 'admin/dist/images/brand/'.$img_name; 
        $data =  Brand::insert([
            'name'          => $req->brand_name,
            'img'           => $url,
            'created_at'    => Carbon::now(),
            'updated_at'    => null,
        ]);  
        $allData    = Brand::where('img', $url)->first(); 
        return response()->json([
            'id'    => $allData->id,
            'name'  => $allData->name,
            'img'   => $allData->img,
            'create'=> $allData->created_at,
            'update'=> $allData->created_at,
            'status'=> $allData->status,
        ], 200);
 
        
    }  

    // active
    public function active($id){
        Brand::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json();
    }

    // Inactive
    public function inactive($id){
        Brand::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json();
    }

    // Edit_data show
    public function editeDataShow($id){
        $data = Brand::where('id', $id)->first();
        return response()->json($data, 200);
    }

    // Edit submit
    public function editeDataSub(Request $req, $id){
        $dts = Brand::where('id', $id)->first();
        if ($req->file('editBrandImage')) {
            unlink($dts->img);
            $img    = $req->file('editBrandImage');
            $nm_gen = $req->editBrandName.'.'.hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->save('admin/dist/images/brand/'.$nm_gen);
            $url   = 'admin/dist/images/brand/'.$nm_gen;
            Brand::where('id', $id)->update([
                'name'        => $req->editBrandName,
                'img'         => $url,
                'updated_at'  => Carbon::now(),
            ]); 
        }else{ 
            Brand::where('id', $id)->update([
                'name'        => $req->editBrandName,
                'updated_at'  => Carbon::now(),
            ]); 
        }
        return response()->json($dts, 200);
    }
 
    // Delete
    public function delete($id){ 
        $fimg = Brand::where('id',$id)->first();
        unlink($fimg->img);
        Brand::find($id)->delete();
        return response()->json();
    }



}
