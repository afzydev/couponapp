<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//=================Admin Routes by Afzal===============

Route::any('/admin/login', function()
{
	if(Auth::check())
	{
		if(Auth::user()->user_type=="admin")
			return Redirect::to('/admin/');
	}	
	$data = array(
		'pageTitle'	=>	'CouponJadu Login',
	);
	return View::make('admin.login',$data);
	
});

Route::post('/admin/login/',function(){
 	$inputData = Input::get('formData');
 	parse_str($inputData,$formFields);
 	$userDetails = array(
 		'email'	=>	$formFields['email'],
 		'password'	=>	$formFields['password']
 	);

	if(Auth::attempt($userDetails)) {
		return Response::json(array('success'=>true,'userType'=>Auth::user()->user_type));
	} else {

		return Response::json(array('fail'=>true));
	}
});

Route::get('/admin/logout/',function(){
	Auth::logout();
	return Redirect::to('/admin/login/');
});

Route::group(array('before' => 'allow_only_admin'), function()
{
	Route::controller('admin','AdminController');
});

//=================End Admin Routes===============


//=================Front End Routes by Afzal

Route::controller('/','FrontEndController');

//=================End Front End Routes================



