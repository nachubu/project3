<?php 

class Address extends Eloquent{
	
	protected $table = "address";
	protected $guarded = array();
	public    $timestamps = false;

	public function waybill()
    {
        return $this->belongsTo('Waybill', 'address_sender');
    }

}