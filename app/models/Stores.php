<?php
class Stores extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stores';
	protected $guarded = array('id');

	public function coupon()
	{
		return $this->hasMany('Coupons');
	}
	
}