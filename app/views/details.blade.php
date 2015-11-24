@extends('layouts.main')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('css')
<style type="text/css">
    
.coupon-code{
text-align:center;
font-size: 18px;
}


</style>
@stop
@section('content')
<!-- //////////////////////////////////
//////////////PAGE CONTENT///////////// 
////////////////////////////////////-->


    <div class="container">
        <div class="row coupon">
            <div class="span7">
                <div class="box">
                    <h3>{{$couponDetails->coupon_name}}</h3>
                    <p>{{$couponDetails->description}}</p>

                    <span ><h2 class="coupon-code"><input onclick="this.select();" style="text-align: center;font-size: 24px;font-weight: bold;margin-top: 6px;border-radius: 10px;border: 2px dotted;height: 32px;cursor: context-menu;background: rgb(236, 241, 247);" type='text' value='{{$couponDetails->coupon_code}}' readonly="true" /> and CTRL + C</h2></span>
                    <div class="gap gap-small"></div>
                    <div class="gap gap-small"></div>
                    <div class="gap gap-small"></div>
                    <a class="btn btn-primary btn-large btn-block" style="font-size:30px;" href="#">Go To {{ucwords(Request::segment(2))}}</a>
                </div>
            </div>
            <div class="span2">
                <div class="box">
                <img src="{{URL::to('/')}}/uploads/images/coupon/{{$couponDetails->coupon_image}}" alt="{{ucwords(Request::segment(2))}}" title="{{ucwords(Request::segment(2))}}" />
                </div>
            </div>
            <div class="span3">
                
               
                <div class="row">
                    
                    <div class="span3">
                        <h5>Advertisement</h5>
                    </div>
                </div>
                
            </div>
        </div>
        
        
        <div class="gap gap-small"></div>
    </div>


    <!-- //////////////////////////////////
//////////////END PAGE CONTENT///////// 
////////////////////////////////////-->
@stop