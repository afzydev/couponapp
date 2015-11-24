@extends('layouts.adminmain')
@section('pageTitle')
{{$pageTitle}}
@stop
@section('page_heading','Dashboard')
@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('/') }}">CouponJadu</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                     
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li><a href="{{ URL::to('/admin/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
								</li>
							</ul>
							<!-- /.dropdown-user -->
						</li>
						<!-- /.dropdown -->
					</ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('admin/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                        
                        <li>
                            <a href="#"></i>Manage Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*add-users') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/add-users') }}">Add New User</a>
                                </li>
                                <li {{ (Request::is('*view-users') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/view-users') }}">View/Edit Users</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"></i>Manage Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*add-category') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/add-category') }}">Add New Category</a>
                                </li>
                                <li {{ (Request::is('*view-category') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/view-category') }}">View/Edit Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"></i>Manage Stores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*add-store') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/add-store') }}">Add New Stores</a>
                                </li>
                                <li {{ (Request::is('*view-store') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/view-store') }}">View/Edit Stores</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"></i>Manage Coupons<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*add-coupon') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/add-coupon') }}">Add New Coupon</a>
                                </li>
                                <li {{ (Request::is('*view-coupon') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('/admin/view-coupon') }}">View/Edit Coupon</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                       
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
           
			<div class="row">  
				@yield('content')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

@if(($pageTitle!="Add Coupon")||($pageTitle!="Edit Coupon"))
@if($pageTitle!="Add Store")
@if($pageTitle!="Edit Store")
@section('js')
<script type="text/javascript">
  $(function(){

    $("form").submit(function( event ) {
          event.preventDefault();          
          //remove class and html data after resubmitting the form
          $('#waitingDiv').empty().append('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Validating Please Wait...');
          var $form = $( this ),
            data = $form.serialize(),
            url = $form.attr( "action" );

          var posting = $.post( url, { formData: data } );
          posting.done(function( data ) {
            
          var values = {};
            $.each($('form').serializeArray(), function(i, field) {
            values[field.name] = field.value;
          });

          $.each(values, function( key, val ) {
                var errorDiv = '#'+key+'_error';
                $(errorDiv).removeClass('alert alert-danger');
                $(errorDiv).empty();
           });
        
            if(data.fail) {
          // console.log(data.errors);
              $.each(data.errors, function( index, value ) {
                var errorDiv = '#'+index+'_error';
                $(errorDiv).addClass('alert alert-danger');
                $(errorDiv).empty().append(value);
              });
              
              $('#waitingDiv').empty();
            } // fail
            if(data.success) {
                var content = '<div class="alert alert-success" role="alert"><h4></b>Successfully Saved !</div>';
              $('#waitingDiv').delay(500).html(content);
              
            } //success


          }); //done
        });
 });
</script>
@stop
@endif
@endif
@endif



