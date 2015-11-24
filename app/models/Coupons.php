<?php
class Coupons extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'coupons';
	protected $guarded = array('id');

	public function category()
	{
		return $this->belongsTo('Categories');
	}

	public function store()
	{
		return $this->belongsTo('Stores');
	}
    
}