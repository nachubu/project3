<?php

class Tarrif extends Eloquent{
	protected $table      = "tarrif";
	protected $guarded    = array();
	public    $timestamps = false;

	public static function getUnits($t){
	
		switch($t){
			case (1 <= $t && $t < 5):
				return 1;
			break;
			case (5 < $t&& $t < 10):
				return 5;
			break;
			case (10 < $t && $t < 20):
				return 10;
			break;
			case (20 < $t && $t < 50):
				return 20;
			break;
			case (50 < $t && $t < 100):
				return 50;
			break;
			case (100 < $t && $t < 200):
				return 100;
			break;
			case (200 < $t && $t < 500):
				return 200;
			break;
			case (500 < $t && $t < 1000):
				return 500;
			break;
			case (1000 < $t):
				return 1000;
			break;
			default:
				return $t;
			break;
		}
	} 

}
