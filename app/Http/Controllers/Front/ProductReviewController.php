<?php
namespace App\Http\Controllers\Front; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Banner;
use App\Category;
use App\subcategory;
use App\UnderSub;
use App\Product;
use App\Newslatter;
use App\productReview;
use Image;
use DB;
use Carbon\Carbon;

class ProductReviewController extends Controller
{
    public function reviewInsert(Request $req, $id){
        productReview::insert([
            'name'      =>  $req->name,
            'email'     =>  $req->email,
            'review'    =>  $req->review,
            'rate'      =>  $req->cont,
            'product_id'=>  $req->id,
            'created_at'=>  Carbon::now(),
        ]);

        $data = productReview::all()->where('product_id', $id);
        $data = count($data);
        return response()->json($data, 200);
    }
} 