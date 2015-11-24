@extends ('admin.dashboard')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('page_heading','Add Category')
@section('content')
<div class="col-lg-6">
    {{Form::open(array('class'=>'','id'=>'addCategory'))}}
        
        <div class="form-group">
            <label class="control-label" >Category Name <span class="red-star">★</span></label>
           {{Form::text('category_name','',array('class'=>'form-control','placeholder'=>'Enter Category'))}}
            <div class="" id="category_name_error"></div>
        </div>


        <div class="form-group">
            <label class="control-label" >Category Slug <span class="red-star">★</span></label>
           {{Form::text('category_slug','',array('class'=>'form-control','placeholder'=>'Enter Category Slug'))}}
            <div class="" id="category_slug_error"></div>
        </div>
        
        <div class="form-group" id="waitingDiv">

        </div>

        {{Form::submit('Save',array('class'=>'btn btn-lg btn-success btn-block'))}}

   {{Form::close()}}
    
</div>
@stop
