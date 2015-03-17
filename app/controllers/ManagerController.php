<?php

class ManagerController extends BaseController {

	public function zone()
	{
		$zmanagers = User::where('role', '=', 'Zone Manager')->get();
		return View::make("manager.zoneIndex",compact('zmanagers'));
	}

	public function account()
	{
		$zmanagers = User::where('role', '=', 'Account Manager')->get();
		return View::make("manager.zoneIndex",compact('zmanagers'));
	}

	public function operation()
	{
		$zmanagers = User::where('role', '=', 'Operation Manager')->get();
		return View::make("manager.zoneIndex",compact('zmanagers'));
	}

	public function zoneIndex()
	{
		$zmanagers = User::where('role', '=', 'Operation Manager')->get();
		return View::make("manager.zoneIndex",compact('zmanagers'));
	}

	public function zwaybills()
	{
		
		if (Auth::user()->role == 'Zone Manager') {
		$u_id = Auth::user()->id;
		$zm = DB::table('zonemanagers')->where('manager_id', '=', $u_id)->first();
		$regions = DB::table('region')->where('zone', '=', $zm->zone_id)->get();
		$ar = array();
		$i = 0;
		foreach ($regions as $region) {
			$ar[$i] = $region->name;
			$i++;
		}
		$wregions = DB::table('waybill')->whereIn('destination', $ar)->get();
		}
		
		return View::make("waybills.zone",compact('wregions'));
	}
}