<?php
class Categories extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	protected $guarded = array('id');

	public function coupon()
	{
		return $this->hasMany('Coupons');
	}


}