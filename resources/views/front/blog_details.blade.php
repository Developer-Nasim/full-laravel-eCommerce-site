@extends('layouts.front')
@section('blog') active @endsection
@section('frontend') 

    @foreach ($detailses as $item) 
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="{{url('/')}}">home</a></li>
                                <li><a>{{$item->Title}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--blog body area start-->
        <div class="blog_details blog_padding mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <!--blog grid area start-->
                        <div class="blog_details_wrapper">
                            <div class="blog_thumb">
                              <img src="{{asset('/'.$item->image)}}" alt="">
                            </div>
                            <div class="blog_content">
                                <h3 class="post_title">{{$item->Title}}</h3>
                                <div class="post_meta"> 
                                    @php
                                        $times = date('M m Y', strtotime($item->created_at));
                                    @endphp
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>  Posted on  {{$times}}	</span>

                                </div>
                                <div class="post_content">
                                    {!! $item->Body !!}
                                </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        @php
                                            $tags = explode(',',$item->tags);
                                        @endphp
                                        @foreach ($tags as $tags_item)
                                            <span class="badge badge-success">{{$tags_item}}</span>  
                                        @endforeach
                                    </div>

                                    <div class="social_sharing">
                                        <h3>share this post:</h3>
                                        <div class="priduct_social">
                                            <!-- AddToAny BEGIN -->
                                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                                <a class="a2a_button_facebook"></a>
                                                <a class="a2a_button_twitter"></a>
                                                <a class="a2a_button_pinterest"></a> 
                                                <a class="a2a_button_linkedin"></a>
                                                <a class="a2a_button_telegram"></a> 
                                                <a class="a2a_button_tumblr"></a>
                                            </div> 
                                            <!-- AddToAny END --> 
                                        </div> 
                                    </div>
                                </div>
                            </div> 
                            <div class="comments_box">
                                <h3>3 Comments </h3>
                                <div class="comment_list">
                                    <div class="comment_thumb">
                                        <img src="{{asset('/')}}/assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">Admin</a></h5>
                                            <span>October 16, 2018 at 1:38 am</span>
                                        </div>
                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                                        <div class="comment_reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="comment_list list_two">
                                    <div class="comment_thumb">
                                        <img src="{{asset('/')}}/assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">Demo</a></h5>
                                            <span>October 16, 2018 at 1:38 am</span>
                                        </div>
                                        <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                                        <div class="comment_reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_list">
                                    <div class="comment_thumb">
                                        <img src="{{asset('/')}}/assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">Admin</a></h5>
                                            <span>October 16, 2018 at 1:38 am</span>
                                        </div>
                                        <p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at</p>
                                        <div class="comment_reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comments_form">
                                <h3>Leave a Reply </h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Comment </label>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="author">Name</label>
                                            <input id="author" type="text">

                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="email">Email </label>
                                            <input id="email" type="text">
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="website">Website </label>
                                            <input id="website" type="text">
                                        </div>
                                    </div>
                                    <button class="button" type="submit">Post Comment</button>
                                </form>
                            </div>
                        </div>
                        <!--blog grid area start-->
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="blog_sidebar_widget"> 
                            <div class="widget_list widget_tag">
                                <h3>Tags</h3>
                                <div class="tag_widget">
                                    <ul>
                                        @php
                                            $tags = explode(',',$item->tags);
                                        @endphp
                                        @foreach ($tags as $tags_item) 
                                            <li><a>{{$tags_item}}</a></li> 
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget_list widget_post">
                                <h3>Recent Posts</h3>
                                @php
                                    $detailses = App\AddBlog::where('id', '!=', $item->id )->latest()->limit(4)->get();
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
        <!--blog section area end-->
    @endforeach

@endsection