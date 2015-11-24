@extends ('admin.dashboard')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('page_heading','Edit User')
@section('content')
<div class="col-lg-6">
    {{Form::model($userDetails,array('class'=>'','id'=>'addNewUser'))}}
        <div class="form-group">
            <label class="control-label">Name <span class="red-star">★</span></label>
           {{Form::text('name',null,array('class'=>'form-control','placeholder'=>'Enter Name'))}}
            <div class="" id="name_error"></div>
        </div>
        <div class="form-group">
            <label class="control-label" >Email <span class="red-star">★</span></label>
           {{Form::text('email',null,array('class'=>'form-control','placeholder'=>'Enter Email'))}}
            <div class="" id="email_error"></div>
        </div>
        <div class="form-group">
            <label class="control-label" >Password <span class="red-star">★</span></label>
            {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password'))}}
            <div class="" id="password_error"></div>
        </div>
        <div class="form-group">
            <label class="control-label" >Re-Enter Password <span class="red-star">★</span></label>
           {{Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'Enter Re-Enter Password'))}}
            
        </div>
        <div class="form-group" id="waitingDiv">

        </div>

        {{Form::submit('Update',array('class'=>'btn btn-lg btn-success btn-block'))}}

   {{Form::close()}}
    
</div>
@stop


