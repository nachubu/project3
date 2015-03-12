<?php


class WC extends Eloquent{
  protected $table = "waybillcodes";	
  public $timestamps =false;

  public static function used()
  {
  	$cn  = WC::where('code', $code)->first();
  	return $cn->used;
  }	
}
