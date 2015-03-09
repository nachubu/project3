<?php

class WaybillController extends BaseController {



	
  
    public function orderNo(){
	
	$orderNo = Input::get('orderNo');
	$wC      = Input::get('wC');
	$wo      = WO::whereRaw('order_no = ? and waybill_id = ? ', array($orderNo, $wC))->count();
		

	if($wo == 0){
		WO::create(
			array(
				"order_no"   => $orderNo,
				"waybill_id" => $wC
			)
		);
	}else{
		return "not";		
	}	
    }	
    

    public function autoSearch() {
        $term = Request::get('term');
        $locations = Tarrif::where('origin', 'LIKE', '%' . $term . '%')->distinct()->get()->take(1);
        $rx = array();
        foreach ($locations as $l) {
            $rx['name'] = $l->origin;
        }
        return Response::json($rx);
    }

    public function autoSearchLto() {
        $term = Request::get('term');
        $locations = Tarrif::where('destination', 'LIKE', '%' . $term . '%')->distinct()->get()->take(1);
        $rx = array();
        foreach ($locations as $l) {
            $rx['name'] = $l->destination;
        }
        return Response::json($rx);
    }

    public function create() {
        $regions = Region::all();
        return View::make('waybills.add', compact('regions'));
    }

    public function index() {
        $waybills = Waybill::all();
        return View::make('waybills.index', compact('waybills'));
    }

    public function search() {
        $code = Input::get('code');
        $lf = Input::get('lf');
        $lt = Input::get('lt');

        $c1 = Tarrif::where('origin', $lf)->count();
        $c2 = Tarrif::where('destination', $lt)->count();

        $c = Tarrif::whereRaw("origin = ? and destination = ?", array($lf, $lt))->count();

        if ($c == 0) {
            return;
        }

        if ($c1 == 0 || $c2 == 0) {
            
        } else {
            $wc = WC::where('code', $code)->count();

            if ($wc == 0) {
                
            } else {

                //$cn = Waybill::where('code', $code)->count();
		$cn  = WC::where('code', $code)->first()->used;

		

                if ($cn == 1) {
                    //$waybill = Waybill::where('code', $code)->first();
                    //return View::make('waybills.filled_form', compact('waybill'));
                } else {
                    // $newWaybill = Waybill::create(array(
                    // 			"code" => $code
                    // 	));
                    // return View::make('waybills.empty_form')->with('waybill_id', $newWaybill->id);
                    return View::make('waybills.empty_form')->with('code', $code);
                }
            }
        }
    }

    public function show($id) {
        return View::make('waybills.show')->with('id', $id);
    }

    public function wcpy() {
        $inputs = Input::all();
        $cpy = $inputs['cpy'];
        $waybills = Waybill::where('address_sender', Address::where('company_id', $cpy)->first()->id)->get();
        if (count($waybills) != 0) {
            $waybills = Waybill::where('address_sender', Address::where('company_id', $cpy)->first()->id)->get();
            return View::make('waybills.regions', compact('waybills'));
        } else {
            return View::make('waybills.error');
        }
    }

   public function wR(){

	$inputs = Input::all();
        $fd     = $inputs['fd'];
        $td     = $inputs['td'];
	// query between $fd and $td
	$waybills = Waybill::whereBetween('date_delivery', array($fd, $td))->get();
        return View::make('waybills.reports', compact('waybills'))->with('fd', $fd)->with('td', $td);
	
   }	

    public function w() {
        $inputs = Input::all();
        $lf = $inputs['lf'];
        $lt = $inputs['lt'];
        $waybills = Waybill::whereRaw('origin = ? and destination = ? ', array($lf, $lt))->count();
        if ($waybills == 0) {
            return View::make('waybills.error');
        } else {
            $waybills = Waybill::whereRaw('origin = ? and destination = ? ', array($lf, $lt))->get();
            return View::make('waybills.regions', compact('waybills'));
        }
    }

    public function getWaybills() {
        $inputs = Input::all();
        $wbs = $inputs['wbs'];
        return View::make('waybills.getWaybills')->with('wbs', $wbs);
    }

    public function store() {
        $inputs = Input::all();
        Waybill::storeWaybill($inputs);
        return "saved";
    }

    public function getWeightCost() {

        $inputs = Input::all();
        $units = (integer) $inputs['item_weight'];
        $item_weight = Tarrif::getUnits($units);
        $from = Input::get('from');
        $to = Input::get('to');

        $cost = Tarrif::whereRaw("origin = ? and destination = ? and units = ?", array($from, $to, $item_weight))->first()->cost;

        return $cost;
    }

}
