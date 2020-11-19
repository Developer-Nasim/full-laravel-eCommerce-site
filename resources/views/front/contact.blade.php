@extends('layouts.front')
@section('frontend') 
   
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact map start-->
    <div class="contact_map mt-32">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map-area"> 
                        <div id="test" class="gmap3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact map end-->

    @php
        $infoData = App\About::latest()->get();
    @endphp
    @foreach ($infoData as $item)
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>contact us</h3>
                        <p>{{$item->about_desc}}</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Address : {{$item->address}}</li>
                            <li><i class="fa fa-envelope-o"></i> <a href="mailto:{{$item->email}}">{{$item->email}}</a></li>
                            <li><i class="fa fa-phone"></i> <a href="tel:{{$item->number}}">{{$item->number}}</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>Tell us your project</h3>

                        <div id="message_sent_fromUser">
                            
                        </div>

                        <form id="contact_form">
                            <p>
                                <label> Your Name (required)</label>
                                <input name="name" id="name" placeholder="Name *" type="text" required>
                            </p>
                            <p>
                                <label> Your Email (required)</label>
                                <input name="email" id="email" placeholder="Email *" type="email" required>
                            </p>
                            <p>
                                <label> Subject</label>
                                <input name="subject" id="subject" placeholder="Subject *" type="text" required>
                            </p>
                            <div class="contact_textarea">
                                <label> Your Message</label>
                                <textarea placeholder="Message *" name="message" id="message" class="form-control2" required></textarea>
                            </div>
                            <button type="submit"> Send</button>
                            <p class="form-messege"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact area end--> 
    @endforeach

@endsection