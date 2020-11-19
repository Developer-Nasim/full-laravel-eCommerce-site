@extends('layouts.front')
@section('frontend') 
 
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog area start-->
    <div class="blog_page_section mt-32">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog_wrapper">
                        @foreach ($blog_data as $item)
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="{{url('admin/blog/'.$item->Title)}}"><img src="{{asset('/'.$item->image)}}" alt=""></a>
                            </div>
                            <div class="blog_content">
                                <h3><a href="{{url('admin/blog/'.$item->Title)}}">{{$item->Title}}</a></h3>
                                <div class="blog_meta">
                                    <span class="post_date"><i class="fa-calendar fa"></i> Februaey 02, 2019</span>
                                </div>
                                <div class="blog_desc"> 
                                </div>
                                <div class="readmore_button">
                                    <a href="{{url('admin/blog/'.$item->Title)}}">read more</a>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget"> 
                        <div class="widget_list widget_tag">
                            <h3>Tags</h3>
                            <div class="tag_widget">
                                <ul>
                                    @php
                                        $tagss = App\AddBlog::where('status', 1)->first();
                                        $tag = explode(',',$tagss->tags);
                                    @endphp
                                    @foreach ($tag as $tags_item) 
                                        <li><a>{{$tags_item}}</a></li> 
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget_list widget_post">
                            <h3>Recent Posts</h3>
                            @php
                                $detailses = App\AddBlog::latest()->limit(4)->get();
                            @endphp
                            @foreach ($detailses as $recentitem)
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="{{url('admin/blog/'.$recentitem->Title)}}"><img src="{{asset('/'.$recentitem->image)}}" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="{{url('admin/blog/'.$recentitem->Title)}}">{{$recentitem->Title}}</a></h3>
                                    @php
                                        $extDates = date('M m Y', strtotime($recentitem->created_at));
                                    @endphp
                                    <span>{{$extDates}}</span>
                                </div>
                            </div>  
                            @endforeach
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->

    <!--blog pagination area start--> 
        <div class="blog_pagination">
            <div class="container">
                <div class="row">
                    <div class="col-12"> 
                        {{$blog_data->links()}}  
                    </div>
                </div>
            </div>
        </div> 
    <!--blog pagination area end-->

@endsection