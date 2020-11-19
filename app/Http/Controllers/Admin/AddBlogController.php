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
use Image;
use DB;
use Carbon\Carbon;

class AddBlogController extends Controller{
    
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    // index
    public function index(){
        return view('admin.add_blog');
    }
    
    // Front index
    public function frontBlog(){
        $blog_data = AddBlog::where('status', 1)->paginate(5);
        return view('front.blog', compact('blog_data'));
    }
    
    // All blogs
    public function all_blogs(){
        $blog_data = AddBlog::latest()->get();
        return view('admin.all_blogs', compact('blog_data'));
    }

    // Add a post
    public function addPost(Request $req){ 
        $title      = str_replace (' ', '-', $req->Title);
        $title      = str_replace (',', '-', $title);
        $title      = str_replace ('.', '-', $title);
        $title      = str_replace ('"', '-', $title);
        $title      = str_replace ("'", '-', $title); 
        $img        = $req->file('blogImg');
        $img_name   =  $title.'-'.hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/blog/'.$img_name);
        $url        = 'admin/dist/images/blog/'.$img_name; 
        AddBlog::insert([
            'Title' 	=> $req->Title,
            'image' 	=> $url,
            'Body' 	    => $req->blog_content,
            'tags' 	    => $req->tags,
            'created_at'=> Carbon::now()
        ]); 
        return Redirect()->bacK()->with('blogAdded', 'Posted successfully..!');
    }
    
    // Edit data show
    public function showforEdit($id){
        $data = AddBlog::where('id', $id)->latest()->get();
        return view('admin.blog_edit', compact('data'));
    }
    
    // editSubmit
    public function editSubmit(request $req){ 
        $fimg = AddBlog::where('id',$req->id)->first(); 
        unlink($fimg->image); 
        $title      = str_replace (' ', '-', $req->Title);
        $title      = str_replace (',', '-', $title);
        $title      = str_replace ('.', '-', $title);
        $title      = str_replace ('"', '-', $title);
        $title      = str_replace ("'", '-', $title);
        $img        = $req->file('blogImg');
        $img_name   =  $title.'-'.hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->save('admin/dist/images/blog/'.$img_name);
        $url        = 'admin/dist/images/blog/'.$img_name;

        AddBlog::where('id', $req->id)->update([
            'Title'         => $req->Title,
            'image'         => $req->url,
            'Body'          => $req->blog_content,
            'tags'          => $req->tags,
            'updated_at'    => Carbon::now()
        ]);
        return Redirect()->back()->with('Updated', 'Updated successfully');
    }

    // Blog details
    public function blog_detailse($title){
        $detailses = AddBlog::where('status', 1)->where('Title', $title)->latest()->get();
        return view('front.blog_details', compact('detailses'));
    }

    // active
    public function active($id){
        AddBlog::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json();
    }

    // Inactive
    public function inactive($id){
        AddBlog::where('id', $id)->update([
            'status' => 0
        ]);
        return response()->json();
    }
    
    // Delete
    public function delete($id){ 
        $fimg = AddBlog::where('id',$id)->first(); 
        unlink($fimg->image); 
        AddBlog::find($id)->delete();
        return response()->json();
    }

    
}
