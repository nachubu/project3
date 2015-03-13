 
 <div class="row" id="primaryInfo">
            <div class="col-md-12">
                <div class="col-md-6">
                      <form class="form form-horizontal">  
                      
                      <div class="form-group"> 
                       <label class="col-sm-5 control-label">CDS Officer.</label> 
                      <div class="col-sm-5">
  			<input name="cds_officer" id="cds_officer" class="form-control"  />	

                      </div>         
                      </div>
                      </form>
                      <form class="form form-horizontal">   
                      <div class="form-group">
                         <label class="col-sm-5 control-label">Order No.</label> 
                      <div class="col-sm-5">
                        <input class="form-control" id="orderNo" name="orderNo" type="text"/>
                      </div>         
                      </div>
                      </form>
                </div>
                <div class="col-md-6">
                    <form class="form form-horizontal">  
                      <div class="form-group">
                        <label class="col-sm-5 control-label"></label> 
                      <div class="col-sm-5">
                        <input class="form-control" type="hidden" />
                      </div>         
                      </div>
                      </form>
                      <form class="form form-horizontal">   
                      <div class="form-group">
                        <label class="col-sm-5 control-label"></label> 
                      <div class="col-sm-5">
                        <input class="btn btn-success" id="btNext"  type="button" value="Next" />
                      </div>         
                      </div>
                      </form>
                </div>
            </div>
</div> 

<div style="z-index: 3000; position: absolute; top: 250px; left: 470px; display:none" id="loader">
{{HTML::image('assets/img/loader.gif')}} Please waiting . . . 
</div>     

                                   

<form id="myWizard"  class="form-horizontal">
<input type="hidden" value="{{$code}}" name="code" /> 
    <div style="display:none" id="all">

@if(Auth::user()->role == "approver")
        <section class="step" data-step-title="Sender's Details(From)">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Sender's Name</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="sender_name" />
                          </div>
                          </div>  
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Company Name</label> 
                          <div class="col-sm-5">
                             <?php $companies = Company::all(); ?>
                           <select class="form-control" name="sender_company">
                              <option></option>
                               @foreach($companies as $company)
                               <option value="{{$company->id}}">{{$company->name}}</option>
                               @endforeach
                            </select>  
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Street Name</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="sender_street" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">House Name</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="sender_house" />
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Postal Code/Area</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="sender_code" />
                            </div>
                          </div>                                              
                    </div>    
                    <div class="col-md-6">
                           <div class="form-group">
                            <label class="col-sm-5 control-label">District</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="sender_district" />
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Region</label> 
                            <div class="col-sm-5">
                            <?php $regions = Region::all(); ?>
                           <select class="form-control" name="sender_region">
                                            <option></option>
                                            @foreach($regions as $region)
                                              <option value="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                            </select>           
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Tel No</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="sender_telephone" />
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Mob No</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="sender_mobile" />
                            </div>
                            
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Email</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="sender_email" />
                            </div>
                          </div>                                                                
                    </div>    
                </div>
            </div>    
        </section>



        <section class="step" data-step-title="Receiver's Details(To)">  
             
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Receiver's Name</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="receiver_name"/>
                          </div>
                          </div>  
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Company Name</label> 
                          <div class="col-sm-5">
                            <?php $companies = Company::all(); ?>
                           <select class="form-control" name="receiver_company">
                                            <option></option>
                                            @foreach($companies as $company)
                                              <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                            </select>  
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Street Name</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="receiver_street"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">House Name</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="receiver_house"/>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Postal Code/Area</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="receiver_code"/>
                            </div>
                          </div>                                              
                    </div>    
                    <div class="col-md-6">
                           <div class="form-group">
                            <label class="col-sm-5 control-label">District</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="receiver_district"/>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Region</label> 
                            <div class="col-sm-5">
                              <?php $regions = Region::all(); ?>
                           <select class="form-control" name="receiver_region">
                                            <option></option>
                                            @foreach($regions as $region)
                                              <option value="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                            </select>                                      
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Tel No</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="receiver_telephone"/>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Mob No</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="receiver_mobile"/>
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Email</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="receiver_email"/>
                            </div>
                          </div>                                                                
                    </div>    
                </div>
            </div>    
        </section>

        <section class="step" data-step-title="Item Details"> 
        
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                          <p>FULL DESCRIPTION OF ITEM</p>
                          <textarea class="form-control" name="description"></textarea> 
                           <div class="radio2">
                          <label>
                            <input type="radio" name="checkcontent" value="1" checked> Content verified
                          </label>
                          <label>
                            <input type="radio" name="checkcontent" value="0"> Content not verified
                          </label>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Weight</label> 
                            <div class="col-sm-7">
                              <input class="form-control" type="text" name="item_weight" id="item_weight" />
                            </div>
                        </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Actual</label> 
                            <div class="col-sm-7">
                              <input class="form-control" type="text" name="item_actual" id="item_actual" />
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Excess</label> 
                            <div class="col-sm-7">
                              <input class="form-control" type="text" name="item_excess" id="item_excess" />
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label"></label> 
                            <div class="col-sm-7">
                              Kilogram (Kg) <input type="radio" name="weightRadios"  value="kg" checked>
                              &nbsp; &nbsp; &nbsp; gram (g) <input type="radio" name="weightRadios"  value="g">
                            </div>
                          </div>                                       
                    </div>    
                    <div class="col-md-6">
                        <div class="pull-left">
                            <p>Quantity of Item</p>
                            <textarea class="form-control" name="item_quantity"></textarea>
                        </div>
                        <div class="pull-right">    
                           <p>Packing</p>
                           <textarea class="form-control" name="item_packing"></textarea> 
                        </div> 
                        <br/>
                        <br/>
                        <p>Dimension in cm</p>
                        <table class="table table-bordered">
                            <tr>
                              <th>Piece</th>
                              <th>Length</th>
                              <th>Width</th>
                              <th>Height</th>
                            </tr>
                            <tr>
                              <td><input type="text" class="form-control" name="piece_1" /></td>
                              <td><input type="text" class="form-control" name="length_1" /></td>
                              <td><input type="text" class="form-control" name="width_1" /></td>
                              <td><input type="text" class="form-control" name="height_1" /></td>
                            </tr>
                            <tr>
                              <td><input type="text" class="form-control" name="piece_2" /></td>
                              <td><input type="text" class="form-control" name="length_2" /></td>
                              <td><input type="text" class="form-control" name="width_2" /></td>
                              <td><input type="text" class="form-control" name="height_2" /></td>
                             </tr>
                        </table>    
                        <p><button class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> More</button></p>                                                          
                    </div>    
                </div>
            </div>   
        </section>
  @endif

  @if(Auth::user()->role == "approver")
        <section class="step" data-step-title="Other Details">       
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                           <div class="form-group">
                            <label class="col-sm-5 control-label">Type of service</label> 
                          <div class="col-sm-5">
                            <select class="form-control" name="type_service">
                                <option value="1">Standard</option>
                                <option value="2">Very Urgent</option>
                                <option value="3">Special</option>
                                <option value="4">other</option>
                            </select>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Type of Payment</label> 
                            <div class="col-sm-5">
                            <select class="form-control" name="type_payment">
                                <option>Cash</option>
                                <option>Credit</option>
                                <option>Cheque</option>

                            </select>
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Cost</label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="charge_cost" id="cost" />
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Insurance(Value)</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="insurance" />
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">other</label> 
                            <div class="col-sm-5">
                              <input class="form-control" type="text" name="other" />
                            </div>
                          </div>                          
                    </div>    
                    <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Time received </label> 
                          <div class="col-sm-5">
                            <input class="form-control" type="text" name="time_received" id="datepicker" />
                          </div>
                          </div>
                        @endif

                         @if(Auth::user()->role != "receiver")  
                                  <div class="form-group">
                                    <div class="col-sm-10 alert alert-info">
                                    <center>
                                    Receiver Details
                                    </center>
                                    </div> 
                                  </div> 
                                  <div class="form-group">
                                    <label class="col-sm-5 control-label">Name</label> 
                                    <div class="col-sm-5">
                                      <input class="form-control" type="text" name="receiver_name" />
                                    </div>
                                  </div> 
                                  <div class="form-group">
                                    <label class="col-sm-5 control-label">Contact</label> 
                                    <div class="col-sm-5">
                                      <input class="form-control" type="text" name="receiver_contact" />
                                    </div>
                                  </div> 
                                  <div class="form-group">
                                    <label class="col-sm-5 control-label time-deriver" >Time delivered</label> 
                                    <div class="col-sm-5">
                                      <input class="form-control" type="text" name="time_delivered" id="datepicker1" />
                                    </div>
                                  </div>   
                        @endif

                    </div>    
                </div>
            </div>   
        </section>

    </div>

</form>

{{HTML::script('assets/plugins/jquery-1.10.2.js')}}
{{HTML::script('assets/scripts/jquery-ui.js')}}
{{HTML::script('assets/scripts/timepicker.js')}}
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#datepicker, #datepicker1" ).focusin(function(){
			$(this).datetimepicker();
		});
		
          });
    </script>
{{HTML::script('assets/scripts/eW.js')}}

<script>

$(document).ready(function(){

    $('#orderNo').on('keyup',function(){
	var orderNo  = $(this).val();
	var wC       = $('#waybill_code').val();
	$.post('orderNo', {orderNo: orderNo, wC:wC}, function(data){
		if(data === "not"){
			$('#btNext').hide();	
		}else{
			$('#btNext').show();
		}
	});
    });	

    $('#item_actual').on('blur', function(){
        var item_actual   = $(this).val();
        var item_weight   = $('#item_weight').val();
        var excess_weight = (item_weight - item_actual);
        $('#item_excess').val(excess_weight);
    });

    $('#item_weight').on('blur', function(){
        
        var item_weight = $(this).val();
        var from        = $('#lfrom').val();
        var to          = $('#lto').val();

        $.post('weightCost', {item_weight:item_weight, from:from, to:to}, function(cost){
            $('#cost').val(cost);
        });
    });

    $('#btNext').on('click', function(){
        $('#primaryInfo').fadeOut(100,function(){
            $('#all').fadeIn(1000);
             $('#myWizard').easyWizard({submitButtonClass:"btn btn-success", buttonsClass: "btn btn-primary"});
        });
    });
   

});
</script>
