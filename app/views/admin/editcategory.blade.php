@extends ('admin.dashboard')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('page_heading','Edit Category')
@section('content')
<div class="col-lg-6">
    {{Form::model($categoryDetails,array('class'=>'','id'=>'addNewUser'))}}
        <div class="form-group">
            <label class="control-label" >Category Name <span class="red-star">★</span></label>
           {{Form::text('category_name',null,array('class'=>'form-control','placeholder'=>'Enter Category'))}}
            <div class="" id="category_name_error"></div>
        </div>

        <div class="form-group">
            <label class="control-label" >Category Slug <span class="red-star">★</span></label>
           {{Form::text('category_slug',null,array('class'=>'form-control','placeholder'=>'Enter Category Slug'))}}
            <div class="" id="category_slug_error"></div>
        </div>

        <div class="form-group" id="waitingDiv">

        </div>

        {{Form::submit('Update',array('class'=>'btn btn-lg btn-success btn-block'))}}

   {{Form::close()}}
    
</div>
@stop


