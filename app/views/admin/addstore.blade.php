@extends ('admin.dashboard')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('page_heading','Add Store')
@section('content')
<?php



?>
<div class="col-lg-6">
    {{Form::open(array('class'=>'','id'=>'addStore','files'=>true))}}
        
        @if(Session::has('success'))
         <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="form-group">
            <label class="control-label" >Store Name <span class="red-star">★</span></label>
           {{Form::text('store_name','',array('class'=>'form-control','placeholder'=>'Enter Store'))}}
            <?php            
            if(Session::has('error'))
            {
                $msg=Session::get('error');
                if(array_key_exists('store_name', $msg))
                {
                ?>
            <div class="alert alert-danger">{{$msg['store_name'][0]}}</div>
            <?php
                }
            }
            ?>

        </div>

        <div class="form-group">
            <label class="control-label" >Store Image <span class="red-star">★</span></label>
            <input type="file" class="form-control" id="store_image" name="store_image" >
            <?php            
            if(Session::has('error'))
            {
                $msg=Session::get('error');
                if(array_key_exists('store_image', $msg))
                {
                ?>
            <div class="alert alert-danger">{{$msg['store_image'][0]}}</div>
            <?php
                }
            }
            ?>
        </div>

        <div class="form-group">
            <label class="control-label" >Store Slug <span class="red-star">★</span></label>
           {{Form::text('store_slug','',array('class'=>'form-control','placeholder'=>'Enter Store Slug'))}}
            <?php            
            if(Session::has('error'))
            {
                $msg=Session::get('error');
                if(array_key_exists('store_slug', $msg))
                {
                ?>
            <div class="alert alert-danger">{{$msg['store_slug'][0]}}</div>
            <?php
                }
            }
            ?>

        </div>
   
        {{Form::submit('Save',array('class'=>'btn btn-lg btn-success btn-block'))}}

   {{Form::close()}}
    
</div>
@stop
