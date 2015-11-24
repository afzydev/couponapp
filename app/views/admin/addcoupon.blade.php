@extends ('admin.dashboard')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('page_heading','Add Coupon')
@section('css')
<link rel="stylesheet" href="{{asset("assets/scripts/tagsinput/bootstrap-tagsinput.css") }}" />
@stop
@section('content')
<div class="col-lg-8">
    {{Form::open(array('files'=>true))}}
        
        
        @if(Session::has('error'))
         <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif

        @if(Session::has('success'))
         <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="form-group">
            <label class="control-label" >Coupon Name <span class="red-star">★</span></label>
           {{Form::text('coupon_name','',array('class'=>'form-control','placeholder'=>'Enter Coupon Title not more than 60 Characters','id'=>'coupon_name'))}}
        </div>

        <div class="form-group">
            <label class="control-label" >Coupon Code <span class="red-star">★</span></label>
           {{Form::text('coupon_code','',array('class'=>'form-control','placeholder'=>'Enter Coupon Code'))}}
        </div>

        <div class="form-group">
            <label class="control-label" >Category <span class="red-star">★</span></label>
            {{Form::select('category_id',$categories,null,array('class'=>'form-control'))}}
        </div>

        <div class="form-group">
            <label class="control-label" >Store <span class="red-star">★</span></label>
            {{Form::select('store_id',$stores,null,array('class'=>'form-control'))}}
        </div>
        
        <div class="form-group">
            <label class="control-label" >Upload image <span class="red-star">★</span></label>
            <input type="file" class="form-control" id="coupon_image" name="coupon_image" >
        </div>
        
        <div class="form-group">
            <label class="control-label" >Short Description <span class="red-star">★</span></label>
            {{ Form::text('short_description', '', array('class'=>'form-control','placeholder'=>'Enter Short Description not more than 60 Characters','id'=>'short_description')) }}
         </div>

        <div class="form-group">
            <label class="control-label" >Description <span class="red-star">★</span></label>
            {{ Form::textarea('description', '', array('class'=>'form-control','id'=>'description')) }}
         </div>
       
        <div class="form-group">
            <label class="control-label" >URL <span class="red-star">★</span></label>
           {{Form::text('url','',array('class'=>'form-control','placeholder'=>'Enter URL'))}}
        </div>

        <div class="form-group">
            <label class="control-label" >Add Tags <span class="red-star">★</span></label>
           {{Form::text('tags','',array('class'=>'form-control','placeholder'=>'ADD TAGS FOR SEARCHING','data-role'=>'tagsinput'))}}
        </div>
        
        <button type="submit" class="btn btn-lg btn-success btn-block" >Submit</button>

   {{Form::close()}}
    
</div>
@stop

 <?php
 if(Session::has('error'))
 {
    Session::forget('error');
 }
 if(Session::has('success'))
 {
    Session::forget('success');
 }
 
 ?>
@section('js')
<script type="text/javascript" src="{{asset("assets/scripts/tagsinput/bootstrap-tagsinput.js") }}"></script>
<script type="text/javascript" src="{{asset("assets/scripts/tagsinput/bootstrap-tagsinput.min.js") }}"></script>
<script type="text/javascript" src="{{asset("assets/scripts/tagsinput/bootstrap-tagsinput.min.js.map") }}"></script>
<script type="text/javascript" src="{{asset("assets/scripts/tagsinput/bootstrap-tagsinput-angular
.js") }}"></script>
<script type="text/javascript" src="{{asset("assets/scripts/tagsinput/bootstrap-tagsinput-angular.min.js") }}"></script>

<script type="text/javascript" src="{{asset("assets/scripts/ckeditor/ckeditor.js") }}"></script>
<script type="text/javascript">
    CKEDITOR.replace('description');
//-------Limiting Character length to 100
    $(function() {
    $("#coupon_name").prop('maxLength', 60);
    $("#short_description").prop('maxLength', 60);
    });    
</script>
@stop
