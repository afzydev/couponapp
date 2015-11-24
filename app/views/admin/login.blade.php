@extends ('layouts.adminmain')
@section('pageTitle')
{{$pageTitle}}
@stop
@section ('body')
<div class="container">
        <div class="row" style="margin-top: 15%;">
            <div class="col-md-4 col-md-offset-4">
               <h2>Login To CouponJadu!</h2>
                        {{Form::open(array('class'=>'','id'=>'loginForm'))}}
                            <fieldset>
                                <div class="form-group">
                                   {{Form::text('email','',array('class'=>'form-control','placeholder'=>'Enter Email'))}}
                                </div>
                                <div class="form-group">
                                    {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password'))}}
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>

                                 <div id="loginMessage"></div>
                                <!-- Change this to a button or input when using this as a form -->
                                
                                {{Form::submit('Login',array('class'=>'btn btn-lg btn-success btn-block'))}}
                            </fieldset>
                        {{Form::close()}}
                
            </div>
        </div>
    </div>
@stop
@section('js')
<script type="text/javascript">
  $(function(){
    $( "#loginForm" ).submit(function( event ) {
    
      event.preventDefault();
      
      //remove class and html data after resubmitting the form
      $('#loginMessage').empty().append('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Authenticating Please Wait...');
     
      var $form = $( this ),
        data = $form.serialize(),
        url = $form.attr( "action" );

      var posting = $.post( url, { formData: data } );
     
      posting.done(function( data ) {
        
        if(data.fail) {
          $('#loginMessage').html('<div class="alert alert-danger">Login Failed</div>');
        } // fail
        if(data.success) {
          if(data.userType=='admin')
          {
            window.location.replace("{{URL::to('/')}}/admin/");
          }         
        } // fail           
      }); //done
    });
 });
</script>
@stop
