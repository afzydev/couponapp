<?php

class FrontEndController extends BaseController {

	protected $allCategories;
	protected $allStores;

	public function __construct()
    {
		$this->allCategories=Categories::orderBy('category_name', 'asc')->get();
		$this->allStores=Stores::orderBy('store_name', 'asc')->get();
    }

	public function getIndex()
	{
		$allCoupons=Coupons::orderBy('id', 'desc')->paginate(20);
		$type='category';
		$data=array(
			'pageTitle'		=>	'CouponJadu - Home',
			'allCategories'	=>	$this->allCategories,
			'allStores'		=>	$this->allStores,
			'allCoupons'	=>	$allCoupons,
			'type'			=>	$type
			);
		return View::make('home',$data);	
	}

	public function getCategory($cat_slug=null)
	{
		$categories=Categories::where('category_slug',$cat_slug)->lists('id'); // Get Category According to SLUG
		$allCoupons=Coupons::whereIn('category_id',$categories)->paginate(20); // Get Coupons According to Category Selected
		$type='category';
		$data=array(
			'pageTitle'		=>	'CouponJadu - Get Latest Coupons',
			'allCoupons'	=>	$allCoupons,
			'allCategories'	=>	$this->allCategories,
			'allStores'		=>	$this->allStores,
			'type'			=>	$type
			);
		return View::make('home',$data);
	}

	public function getDetails($store_slug=null,$category_slug=null,$couponId=null)
	{
		$couponDetails=Coupons::where('id',$couponId)->first(); // Get Coupons According to Category Selected
		$similarCoupons=Coupons::where('store_id',$couponDetails->store_id)->where('category_id',$couponDetails->category_id)->get();

		$data=array(
			'pageTitle'		=>	'CouponJadu',
			'couponDetails'	=>	$couponDetails,
			'similarCoupons'=>	$similarCoupons,
			'allCategories' =>	$this->allCategories,
			'allStores'		=>	$this->allStores
			);
		return View::make('details',$data);	
	}

	public function getStore($store_slug=null)
	{
		$stores=Stores::where('store_slug',$store_slug)->lists('id'); // Get Category According to SLUG
		$allCoupons=Coupons::whereIn('store_id',$stores)->paginate(20); // Get Coupons According to Category Selected
		$type='store';
		$data=array(
			'pageTitle'		=>	'CouponJadu - Get Latest Coupons',
			'allCoupons'	=>	$allCoupons,
			'allCategories'	=>	$this->allCategories,
			'allStores'		=>	$this->allStores,
			'type'			=>	$type
			);
		return View::make('home',$data);
	}
	public function getContact()
	{
		$data=array(
			'pageTitle'	=>	'CouponJadu - Contact Us',
			'allStores'	=>	$this->allStores,
			'allCategories'	=>	$this->allCategories
			);
		return View::make('contact',$data);
	}

	function getSearch()
	{
		$searchinput=Input::get('q');
		$allCoupons=Coupons::where('tags','LIKE','%'.$searchinput.'%')->paginate(20);
		$type='search';
		$data=array(
			'pageTitle'		=>	'CouponJadu - Search',
			'allCoupons'	=>	$allCoupons,
			'allCategories'	=>	$this->allCategories,
			'allStores'		=>	$this->allStores,
			'type'			=>	$type
			);
		return View::make('home',$data);
		
	}
	
}
