 <?php

class Waybill extends Eloquent{
	protected $table = "waybill";
	protected $guarded = array();
	public $timestamps = false;

	public function address(){
		return $this->hasOne('Address');
	}

	public static function getStatus($code){
		$waybill = Waybill::where('code', $code)->first();
		if(Waybill::where('code', $code)->count() != 0){

			if($waybill->date_delivery == "" || $waybill->receiver_name == "" || $waybill->receiver_contact == ""){
				return '<span class="label label-danger"><i class="icon-repeat"></i> not delivered</span>';
			}else{
				return '<span class="label label-success"><i class="icon-refresh icon-spin"></i>  delivered</i>';
			}
		}
	}

	public static function storeWaybill($inputs){


		//return $inputs['orderNo'];

		$sender_name      = $inputs['sender_name'];
		$sender_company   = $inputs['sender_company'];
		$sender_street    = $inputs['sender_street'];
		$sender_house     = $inputs['sender_house'];
		$sender_code      = $inputs['sender_code'];
		$sender_district  = $inputs['sender_district'];
		$sender_region    = $inputs['sender_region'];
		$sender_telephone = $inputs['sender_telephone'];
		$sender_mobile    = $inputs['sender_mobile'];
		$sender_email     = $inputs['sender_email'];	
		$sender_company   = $inputs['sender_company'];	
     
     	$receiver_name      = $inputs['receiver_name'];
		$receiver_company   = $inputs['receiver_company'];
		$receiver_street    = $inputs['receiver_street'];
		$receiver_house     = $inputs['receiver_house'];
		$receiver_code      = $inputs['receiver_code'];
		$receiver_district  = $inputs['receiver_district'];
		$receiver_region    = $inputs['receiver_region'];
		$receiver_telephone = $inputs['receiver_telephone'];
		$receiver_mobile    = $inputs['receiver_mobile'];
		$receiver_email     = $inputs['receiver_email'];
		$receiver_company   = $inputs['receiver_company'];



        $verified           = $inputs['checkcontent'] ;
        //$weightRadios       = $inputs['weightRadios'];
        $description        = $inputs['description'];
	    $quantity           = $inputs['item_quantity'];
	    $item_packing       = $inputs['item_packing'];
	    $item_weight        = $inputs['item_weight'];
	    $dimension_length   = $inputs['length_1'];
	    $dimension_width    = $inputs['width_1'];
	    $dimension_height   = $inputs['height_1'];
	    $pieces             = $inputs['piece_1'];
	    $type_payment       = $inputs['type_payment'];
	    $type_service       = $inputs['type_service'];
	    $time_received      = $inputs['time_received'];
        $time_delivered     = $inputs['time_delivered'];
        $charge_insurance   = $inputs['insurance']; 
        $charge_other       = $inputs['other'];
        $receiver_name      = $inputs['receiver_name'];
        $receiver_contact   = $inputs['receiver_contact'];
        $code               = $inputs['code'];
        $cds_officer        = $inputs['cds_officer'];
        $cost               = $inputs['charge_cost'];
        $weight             = $inputs['item_weight'];
        $origin             = $inputs['origin'];
        $destination        = $inputs['destination'];

		$address_sender     = Address::create(array(
								"postalcode"   => $sender_code,
								"district"     => $sender_district,
								"telephone"    => $sender_telephone,
								"mobile"       => $sender_mobile,
								"houseno"      => $sender_house,
								"street"       => $sender_street,
								"emailaddress" => $sender_email,
								"region_id"    => $sender_region,
								"name"         => $sender_name,
								"company_id"   => $sender_company
						   ));

		$address_receiver     = Address::create(array(
						"postalcode"   => $receiver_code,
						"district"     => $receiver_district,
						"telephone"    => $receiver_telephone,
						"mobile"       => $receiver_mobile,
						"houseno"      => $receiver_house,
						"street"       => $receiver_street,
						"emailaddress" => $receiver_email,
						"region_id"    => $receiver_region,
						"name"         => $receiver_name,
						"company_id"   => $receiver_company
				   ));

        $waybill        = Waybill::create(array(
			          "payment_type"      => $type_payment,
		               "date_pickup"      => $time_received,
                       "date_delivery"    => $time_delivered, 
                       "charge_cost"      => $cost,
                       "code"    		  => $code,
                       "charge_insurance" => $charge_insurance,
                       "charge_other"     => $charge_other,
                       "receiver_name"    => $receiver_name,
                       "receiver_contact" => $receiver_contact,
                       "origin"           => $origin,
                       "destination"      => $destination,
                       "address_sender"   => $address_sender->id,
                       "address_receiver" => $address_receiver->id,
                       "service_id"       => $type_service
                       ));

	    $waybill_id         = Waybill::where('code', $code)->first()->id;

	    $wc  = WC::where('code', $code)->first();
	    $wc->used = 1;
	    $wc->save();	
			
		
		$item            = Item::create(array(
                      "description"      => $description,
                      "quantity"         => $quantity, 
                      "packing"          => $item_packing,
                      "weight"           => $item_weight,  
                      "dimension_height" => $dimension_height,
                      "dimension_width"  => $dimension_width,
                      "dimension_length" => $dimension_length, 
                      "pieces"           => $pieces, 
                      "waybill_id"       => $waybill->id
                      ));  
		//$Courier_Waybill  = CourierWaybill::create(array(
		//	          "courier_id"       => $cds_officer,
		//		          "waybill_id"       => $waybill_id,
			    
		//	          ));
		}
}
