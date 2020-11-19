@extends('layouts.front')
@section('frontend') 
    
<div class="container" style="margin-top: 50px;margin-bottom: 50px">
    <p style="margin-bottom: 30px">Home / {!! $page_data->name !!}</p>
    {!! $page_data->page_content !!}
</div>
@endsection