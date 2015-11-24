<?php
class AdminController extends BaseController {
		
	protected $userData;
	
	public function __construct()
    {
       		$this->userData = User::whereId(Auth::user()->id)->first();	
    }
   
	public function getIndex() {			
			$data = array(
			'userData'	=> $this->userData,
			'pageTitle'	=>	'Dashboard'
		);
			return View::make('admin.datanalytics',$data);
	}
	
	public function getAddUsers() {
			$data = array(
				'userData'	=> $this->userData,
				'pageTitle'	=>	'Add Users'
			);
			return View::make('admin.addusers',$data);
	}

	public function postAddUsers() {
			
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields); 
		$formData = array(
			'name'				=>	$formFields['name'],
			'email'				=>	$formFields['email'],
			'password'			=>	$formFields['password'],
			'password_confirmation'		=>  $formFields['password_confirmation'],
			);
	  // return Response::json(array('data'=>$inputData));
		$rules = array(
			'name'				=>	'required',
			'email'				=>	'required|email|unique:users',
			'password'			=>	'required|min:6|confirmed'
			);
		
		$validator = Validator::make($formData,$rules);
		if($validator->fails())
			return Response::json(array(
				'fail' => true,
				'errors' => $validator->getMessageBag()->toArray()
				));
		else {
			//hash it now
			unset($formData['password_confirmation']);
			$formData['password'] = Hash::make($formData['password']);

			$formData['user_type'] = 'user';
			if(User::create($formData))						
				return Response::json(array('success' => true));
		}
	
	}
	
	public function getViewUsers() {

			$users=User::orderBy('id','desc')->paginate(15);
			$data = array(
				'userData'	=>  $this->userData,
				'pageTitle'	=>  'View Users',
				'user'		=>	$users
			);
			return View::make('admin.viewusers',$data);
	}
	
	public function getEditUser($userId) {
			$users = User::whereId($userId)->first();
			$data = array(
				'userData'	=> $this->userData,
				'pageTitle'	=>	'Edit Users',
				'userDetails'		=>	$users
			);
			return View::make('admin.edituser',$data);
	}

	public function postEditUser($id) {
		
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields); 
		$formData = array(
			'name'				=>	$formFields['name'],
			'email'				=>	$formFields['email'],
			'password'			=>	$formFields['password'],
			'password_confirmation'		=>  $formFields['password_confirmation'],
			);
	  // return Response::json(array('data'=>$inputData));
		$rules = array(
			'name'				=>	'required',
			'email'				=>	'required|email|unique:users',
			'password'			=>	'required|min:6|confirmed'
			);
		
		$validator = Validator::make($formData,$rules);
		if($validator->fails())
			return Response::json(array(
				'fail' => true,
				'errors' => $validator->getMessageBag()->toArray()
				));
		else {
			//hash it now
			unset($formData['password_confirmation']);
			$formData['password'] = Hash::make($formData['password']);
			if(User::whereId($id)->update($formData))						
				return Response::json(array('success' => true));
		}
	
	}
	
	public function getAddCategory() {
					
			$data = array(
				'userData'	=> $this->userData,
				'pageTitle'	=>	'Add Category'
			);
			return View::make('admin.addcategory',$data);
	}
	
	public function postAddCategory() {
			
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields); 
		$formData = array(
			'category_name'				=>	$formFields['category_name'],
			'category_slug'				=>	$formFields['category_slug']
			);
		$rules = array(
			'category_name'				=>	'required|unique:categories',
			'category_slug'				=>	'required|unique:categories'
			);
		
		$validator = Validator::make($formData,$rules);
		if($validator->fails())
			return Response::json(array(
				'fail' => true,
				'errors' => $validator->getMessageBag()->toArray()
				));
		else {
			//hash it now
			if(Categories::create($formData))						
				return Response::json(array('success' => true));
		}
	
	}

	public function getViewCategory() {
			$categories=Categories::all();
			$data = array(
				'userData'				=>  $this->userData,
				'pageTitle'				=>  'View Category',
				'listcategories'		=>	$categories
			);
			return View::make('admin.viewcategory',$data);
	}

	public function getEditCategory($categoryId) {
			$categoryDetails = Categories::whereId($categoryId)->first();
			$data = array(
				'userData'	=> $this->userData,
				'pageTitle'	=>	'Edit Category',
				'categoryDetails'		=>	$categoryDetails
			);
			return View::make('admin.editcategory',$data);
	}

	public function postEditCategory($categoryId) {
			
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields); 
		$formData = array(
			'category_name'				=>	$formFields['category_name'],
			'category_slug'				=>	$formFields['category_slug']
			);
		$rules = array(
			'category_name'				=>	'required|unique:categories,category_name' . ($categoryId ? ",$categoryId" : ''),
			'category_slug'				=>	'required|unique:categories,category_slug' . ($categoryId ? ",$categoryId" : '')
			);
		
		$validator = Validator::make($formData,$rules);
		if($validator->fails())
			return Response::json(array(
				'fail' => true,
				'errors' => $validator->getMessageBag()->toArray()
				));
		else {
			//hash it now
			if(Categories::whereId($categoryId)->update($formData))						
				return Response::json(array('success' => true));
		}
	
	}
	
	public function getAddStore() {
					
			$data = array(
				'userData'	=> $this->userData,
				'pageTitle'	=>	'Add Store'
			);
			return View::make('admin.addstore',$data);
	}

	public function postAddStore() {
			
		$inputData = Input::all();
		$formData = array(
			'store_name'				=>	$inputData['store_name'],
			'store_image'				=>	$inputData['store_image'],
			'store_slug'				=>	$inputData['store_slug'],
			);
		$rules = array(
			'store_name'				=>	'required|unique:stores',
			'store_image'				=>	'required|image',
			'store_slug'				=>	'required|unique:stores'
			);
		
		$validator = Validator::make($formData,$rules);
		if($validator->fails())
		{

			$validation=$validator->getMessageBag()->toArray();
			foreach($validation as $k=>$v)
			{
				$val[$k]=$v;
			}
			return Redirect::to('admin/add-store')->with('error',$val)->withInput();

		}
		else {
			//hash it now
			$file=$formData['store_image'];
			$destinationPath = public_path().'/uploads/images/store';
			$filename = $file->getClientOriginalName();
			$extension =$file->getClientOriginalExtension();
			$final_img= $filename;
			$upload_success = $file->move($destinationPath, $final_img);
			$img = Image::make($destinationPath.'/'.$final_img);
			$img->resize(300, 150);
			$img->save($destinationPath.'/'.$final_img);
			$formData['store_image']=$final_img;
			if(Stores::create($formData))						
				return Redirect::to('admin/add-store')->with('success','Store has been Successfuly added');
		}
	
	}

	public function getViewStore() {

			$stores=Stores::all();
			$data = array(
				'userData'				=>  $this->userData,
				'pageTitle'				=>  'View Store',
				'liststores'			=>	$stores
			);
			return View::make('admin.viewstore',$data);
	}

	public function getEditStore($storeId) {
			$stores = Stores::whereId($storeId)->first();
			$data = array(
				'userData'			=> $this->userData,
				'pageTitle'			=>	'Edit Store',
				'storesDetails'		=>	$stores
			);
			return View::make('admin.editstore',$data);
	}

	public function postEditStore($storeId) {
			
		$inputData = Input::all();

		if(empty($inputData['store_image']))
		{
			$formData = array(
				'store_name'				=>	$inputData['store_name'],
				'store_slug'				=>	$inputData['store_slug']
			);
		$rules = array(
				'store_name'				=>	'required|unique:stores,store_name' . ($storeId ? ",$storeId" : ''),
				'store_slug'				=>	'required|unique:stores,store_slug' . ($storeId ? ",$storeId" : '')
			);
		}
		else
		{
			$formData = array(
				'store_name'				=>	$inputData['store_name'],
				'store_image'				=>	$inputData['store_image'],
				'store_slug'				=>	$inputData['store_slug']
				);
			$rules = array(
				'store_name'				=>	'required|unique:stores,store_name' . ($storeId ? ",$storeId" : ''),
				'store_image'				=>	'required|image',
				'store_slug'				=>	'required|unique:stores,store_slug' . ($storeId ? ",$storeId" : '')
				);
		}

		$validator = Validator::make($formData,$rules);
		if($validator->fails())
		{
			$validation=$validator->getMessageBag()->toArray();
			foreach($validation as $k=>$v)
			{
				$val[$k]=$v;
			}
			return Redirect::to('admin/edit-store/'.$storeId)->with('error',$val);

		}
		else {
			//hash it now
			if(!empty($formData['store_image']))
			{
				$file=$formData['store_image'];
				$destinationPath = public_path().'/uploads/images/store';
				$filename = $file->getClientOriginalName();
				$extension =$file->getClientOriginalExtension();
				$final_img= $filename;
				$upload_success = $file->move($destinationPath, $final_img);
				$img = Image::make($destinationPath.'/'.$final_img);
				$img->resize(300, 150);
				$img->save($destinationPath.'/'.$final_img);
				$formData['store_image']=$final_img;
			}
			else
			{
				$formData['store_image']=$inputData['saved_image'];
			}
			if(Stores::whereId($storeId)->update($formData))						
				return Redirect::to('admin/edit-store/'.$storeId)->with('success','Store has been Successfuly updated');
		}
	
	}



	public function getAddCoupon() {

			$categories=Categories::lists('category_name','id');
			$categories['']='Select Category';

			$stores=Stores::lists('store_name','id');
			$stores['']='Select Store';

			$data = array(
				'userData'				=>  $this->userData,
				'categories'			=>	$categories,
				'stores'				=>	$stores,
				'pageTitle'				=>  'Add Coupon'
			);
			return View::make('admin.addcoupon',$data);
	}

	public function postAddCoupon() {
			
		$getData=Input::all();
		$saveData=array();
		foreach ($getData as $value) {
			if(empty($value))
			{
				$saveData[]=1;
				return Redirect::to('admin/add-coupon')->with('error','Please complete all the fields')->withInput();
			}
		}

		$file=$getData['coupon_image'];
		
		if(count($saveData)==0)
		{
			$all_uploaded_files=array('jpg','png','jpeg');
			$destinationPath = public_path().'/uploads/images/coupon';
			//$filename = str_random(12);
			$filename = $file->getClientOriginalName();
			$extension =$file->getClientOriginalExtension();			
			$final_img= $filename;
			list($width, $height, $type, $attr) = getimagesize($file);
			if(in_array($extension,$all_uploaded_files) && $width>=300 && $height>=150)
			{
				$upload_success = $file->move($destinationPath, $final_img);
				
				$img = Image::make($destinationPath.'/'.$final_img);
				$img->resize(300, 150);
				$img->save($destinationPath.'/'.$final_img);
				$saveData=array(
					'coupon_name'		=>	$getData['coupon_name'],
					'coupon_code'		=>	$getData['coupon_code'],
					'category_id'		=>	$getData['category_id'],
					'store_id'			=>	$getData['store_id'],
					'coupon_image'		=>	$final_img,
					'short_description'	=>	$getData['short_description'],
					'description'		=>	$getData['description'],
					'url'				=>	$getData['url'],
					'tags'				=>	$getData['tags']
					);

				if(Coupons::create($saveData))
				{
					return Redirect::to('admin/add-coupon')->with('success','Successfuly added new Coupon to store');
				}
			}
			else
			{
					return Redirect::to('admin/add-coupon')->with('error','Upload only JPG,JPEG,PNG type images of 300X150 dimensions.')->withInput();
			}
		}
	}

	public function getViewCoupon() {

			$coupons=Coupons::all();
			$data = array(
				'userData'				=>  $this->userData,
				'pageTitle'				=>  'View Coupon',
				'listcoupons'			=>	$coupons
			);
			return View::make('admin.viewcoupon',$data);
	}

	public function getEditCoupon($couponId) {
			$coupons = Coupons::whereId($couponId)->first();
			$categories=Categories::lists('category_name','id');
			$categories['']='Select Category';
			$stores=Stores::lists('store_name','id');
			$stores['']='Select Store';

			$data = array(
				'userData'			=> $this->userData,
				'pageTitle'			=> 'Edit Coupon',
				'couponsDetails'	=>	$coupons,
				'categories'		=>	$categories,
				'stores'			=>	$stores
			);
			return View::make('admin.editcoupon',$data);
	}

	public function postEditCoupon($couponId) {
			
		$getData=Input::all();

		$saveData=array();
		foreach ($getData as $key=>$value) {
			if(empty($value))
			{
				if($key!='coupon_image')
				{
					$saveData[]=1;
					return Redirect::to('admin/edit-coupon/'.$couponId)->with('error','Please complete all the fields')->withInput();
				}
			}
		}

		if(count($saveData)==0)
		{

			if(!empty($getData['coupon_image']))
			{
				$file=$getData['coupon_image'];
				$all_uploaded_files=array('jpg','png','jpeg');
				$destinationPath = public_path().'/uploads/images/coupon';
				//$filename = str_random(12);
				$filename = $file->getClientOriginalName();
				$extension =$file->getClientOriginalExtension();
				$final_img= $filename;
				list($width, $height, $type, $attr) = getimagesize($file);

				if(in_array($extension,$all_uploaded_files) && $width>=300 && $height>=150)
				{
					$upload_success = $file->move($destinationPath, $final_img);
					$img = Image::make($destinationPath.'/'.$final_img);
					$img->resize(300, 150);
					$img->save($destinationPath.'/'.$final_img);

					$get_upload_img=Coupons::whereId($couponId)->lists('coupon_image');
					$del_img=$get_upload_img[0];
					File::delete(public_path().'/uploads/images/coupon/'.$del_img);
				}
				else
				{
					return Redirect::to('admin/edit-coupon/'.$couponId)->with('error','Upload only JPG,JPEG,PNG type images of 300X150 dimensions')->withInput();
				}
			}
			else
			{
				$get_img=Coupons::whereId($couponId)->lists('coupon_image');
				$final_img=$get_img[0];
			}
			$saveData=array(
				'coupon_name'		=>	$getData['coupon_name'],
				'coupon_code'		=>	$getData['coupon_code'],
				'category_id'		=>	$getData['category_id'],
				'store_id'			=>	$getData['store_id'],
				'coupon_image'		=>	$final_img,
				'short_description'	=>	$getData['short_description'],
				'description'		=>	$getData['description'],
				'url'				=>	$getData['url'],
				'tags'				=>	$getData['tags']
				);
			if(Coupons::whereId($couponId)->update($saveData))
			{
				return Redirect::to('admin/edit-coupon/'.$couponId)->with('success','Successfuly Updated');
			}
			
		}
	}

	
}
