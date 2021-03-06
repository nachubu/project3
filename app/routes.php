<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::post('waybill/orderNo', 'WaybillController@orderNo');

Route::get('exportFile', function() {

	$fd = $_GET['fd'];
	$td = $_GET['td'];


	$waybs = Waybill::whereBetween('date_delivery', array($fd, $td))->get();
	
    $pdf = PDF::loadView('waybills.summary', compact('waybs'))->setorientation('land');
    return $pdf->download('waybill.pdf');
});

Route::get('exportFileExcel', function() {


Excel::create('New file', function($excel) {

    $excel->sheet('New sheet', function($sheet) {
	        
	$sheet->loadView('waybills.excelWaybill');

    });

});

});



Route::get('create', function() {
    Excel::create('New file', function($excel) {

        $excel->sheet('New sheet', function($sheet) {

            $sheet->loadView('waybills.error');
        });
    })->export('xls');
});

Route::get('importDB', function() {

    $path = "files/file.xls";

    Excel::load($path, function($reader) {

        $dt = array();
        $reader->each(function($sheet) {
            // Loop through all rows
            $sheet->each(function($row) {
                $og = $row->orgin;
                $ds = $row->destination;
                $u1 = (integer) $row->uone;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "1000",
                            "cost" => $u1
                ));
                $u2 = (integer) $row->utwo;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "500",
                            "cost" => $u2
                ));
                $u3 = (integer) $row->uthree;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "200",
                            "cost" => $u3
                ));
                $u4 = (integer) $row->ufour;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "100",
                            "cost" => $u4
                ));
                $u5 = (integer) $row->ufive;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "50",
                            "cost" => $u5
                ));
                $u6 = (integer) $row->usix;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "20",
                            "cost" => $u6
                ));
                $u7 = (integer) $row->useven;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "10",
                            "cost" => $u7
                ));
                $u8 = (integer) $row->ueight;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "5",
                            "cost" => $u8
                ));
                $u9 = (integer) $row->unine;
                $t = Tarrif::create(array(
                            "origin" => $og,
                            "destination" => $ds,
                            "units" => "0.5",
                            "cost" => $u9
                ));
            });
        });


        return "Okay!!! imported . . . .";
    });
});
//############################################

Route::get('/', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@validate');
Route::get('home', 'LoginController@dashboard');
Route::get('waybill/add', array("uses" => 'WaybillController@create', 'as' => 'waybill'));
Route::post('waybill/add', 'WaybillController@store');
Route::post('waybills/getWaybills', 'WaybillController@getWaybills');
Route::post('waybills/w', 'WaybillController@w');
Route::post('waybills/wR', 'WaybillController@wR');
Route::post('waybills/wcpy', 'WaybillController@wcpy');
Route::post('waybill/search', 'WaybillController@search');
Route::get('waybill/autoSearch', 'WaybillController@autoSearch');
Route::get('waybill/autoSearchLto', 'WaybillController@autoSearchLto');
Route::post('waybill/weightCost', 'WaybillController@getWeightCost');
Route::get('waybills', 'WaybillController@index');
Route::get('user/add', 'UserController@create');
Route::post('user/add', 'UserController@store');
Route::get('waybill/show/{id}', 'WaybillController@show');
Route::get('users', 'UserController@users');


//waybills


//managers ManagerController
Route::get('manager/zone','ManagerController@zone');
Route::get('manager/account','ManagerController@account');
Route::get('manager/operation','ManagerController@operation');
Route::get('manager/zone/waybill','ManagerController@zwaybills');

//dashboard for all users according to roles
Route::get('manager/zone/dashboard','ManagerController@zoneIndex');




