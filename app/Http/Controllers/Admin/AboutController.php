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
use App\AddBlog;
use App\About;
use Image;
use DB;
use Carbon\Carbon;

class AboutController extends Controller{

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
        return view('admin.about');
    }

    // Info save
    public function saveInfo(Request $request){

        $logo_img     = $request->file('logo');
        $pay_img      = $request->file('paymethod'); 

        // Logo Image
        $logo_name    = hexdec(uniqid()).'.'.$logo_img->getClientOriginalExtension(); 
        Image::make($logo_img)->save('admin/dist/images/ganeral/'.$logo_name);
        $logo_url     = 'admin/dist/images/ganeral/'.$logo_name;
        
        // Payment images
        $pay_name    = hexdec(uniqid()).'.'.$pay_img->getClientOriginalExtension(); 
        Image::make($pay_img)->save('admin/dist/images/ganeral/'.$pay_name);
        $pay_url     = 'admin/dist/images/ganeral/'.$pay_name; 

        About::insert([
            'logo'      => $logo_url, 
            'payment'   => $pay_url,
            'number'    => $request->hellp_number,
            'email'     => $request->email,
            'address'   => $request->address,
            'lat'       => $request->let,
            'long'      => $request->long,
            'fb'        => $request->fb,
            'tw'        => $request->tw,
            'lk'        => $request->lk,
            'ins'       => $request->in,
            'pin'       => $request->pn,
            'yt'        => $request->yt,
            'about_desc'=> $request->fewworrd,
        ]);

        return Redirect()->back()->with('info', 'Info is Uploaded');
    }

    // Update save
    public function updateInfo(Request $request){

        $dimg = About::where('id', $request->id)->first();
        unlink($dimg->logo);
        unlink($dimg->payment);


        $logo_img     = $request->file('logo');
        $pay_img      = $request->file('paymethod'); 

        // Logo Image
        $logo_name    = hexdec(uniqid()).'.'.$logo_img->getClientOriginalExtension(); 
        Image::make($logo_img)->save('admin/dist/images/ganeral/'.$logo_name);
        $logo_url     = 'admin/dist/images/ganeral/'.$logo_name;
        
        // Payment images
        $pay_name    = hexdec(uniqid()).'.'.$pay_img->getClientOriginalExtension(); 
        Image::make($pay_img)->save('admin/dist/images/ganeral/'.$pay_name);
        $pay_url     = 'admin/dist/images/ganeral/'.$pay_name; 

        About::where('id', $request->id)->update([
            'logo'      => $logo_url, 
            'payment'   => $pay_url,
            'number'    => $request->hellp_number,
            'email'     => $request->email,
            'address'   => $request->address,
            'lat'       => $request->let,
            'long'      => $request->long,
            'fb'        => $request->fb,
            'tw'        => $request->tw,
            'lk'        => $request->lk,
            'ins'       => $request->in,
            'pin'       => $request->pn,
            'yt'        => $request->yt,
            'about_desc'=> $request->fewworrd,
        ]);

        return Redirect()->back()->with('info', 'Info is Updated SuccessFully!');
    }


}
