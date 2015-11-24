@extends('layouts.main')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('content')
@if($type!='search')
<div class="span3">
    <ul class="nav nav-tabs nav-stacked nav-coupon-category">
        <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{URL::to('/')}}"><i class="icon-ticket"></i>All</a>
        </li>
        @if($type=='category')
            @foreach($allCategories as $getCat)
            <li {{ Request::segment(2)==$getCat->category_slug ? 'class="active"' : ''}}>
                <a href="{{URL::to('/')}}/category/{{$getCat->category_slug}}">{{$getCat->category_name}}</a>
            </li>
            @endforeach
        @elseif($type=='store')
            @foreach($allStores as $getStore)
            <li {{ Request::segment(2)==$getStore->store_slug ? 'class="active"' : ''}}>
                <a href="{{URL::to('/')}}/store/{{$getStore->store_slug}}">{{$getStore->store_name}}</a>
            </li>
            @endforeach
        @endif
    </ul>
</div>
@endif

<?php
if($type=='search')
    $span='span12';
else
    $span='span9';
?>

<div class="{{$span}}">
                <div class="row row-wrap">
                    
                    @foreach($allCoupons as $coupDetails)

                    <div class="span3">
                     <?php

                       $cat_slug=$coupDetails->category->category_slug;
                       $store_slug=$coupDetails->store->store_slug;
                   
                    ?>
                        <!-- COUPON THUMBNAIL -->
                        <a href="#" class="coupon-thumb">
                            <img src="{{URL::to('/')}}/uploads/images/coupon/{{$coupDetails->coupon_image}}" alt="{{$coupDetails->coupon_name}}" title="{{$coupDetails->coupon_name}}" />
                            <div class="coupon-inner">
                                <h5 class="coupon-title">{{$coupDetails->coupon_name}}</h5>
                                <p class="coupon-desciption">{{html_entity_decode($coupDetails->short_description)}}</p>
                                <div class="coupon-meta"><span class="coupon-time"><i class="icon-check-sign" style="color:#7FA832;"></i><span style="margin-left: 2%;font-size: 12px;">Verified</span></span>
                                    <div class="coupon-price"><span class="coupon-new-price" onclick="getDetails('{{$store_slug}}','{{$cat_slug}}','{{$coupDetails->id}}')">Get Coupon</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> 
                    @endforeach

                </div>
                <div class="pagination" style="text-align: center;">
                    <?php if(count($allCoupons)!=0) { echo $allCoupons->links(); } else { echo '<span class="alert alert-error">No Result Found</span>';}  ?>
                </div>
                <div class="gap"></div>
</div>
@stop
@section('js')
<script type="text/javascript">
    
function getDetails(store,category,couponId)
{
    window.location.href='{{URL::to("/")}}/details/'+store+'/'+category+'/'+couponId;
}

</script>
@stop