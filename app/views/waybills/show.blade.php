 @extends('layouts.master')

@section('main')
  <?php $way = Waybill::find($id); ?>
  <div id="page-wrapper" style="font-size: 13px">
     <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h4 class="page-header"></h4>
                </div>
                <!--End Page Header -->
         </div>
         <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             WAYBILL INFORMATION
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6" >
                                    <form class="form-horizontal" role="form">
                                      <div class="form-group">
                                        <div class="col-sm-5">
                                          <b>From/Orgin</b>: {{Region::find($way->origin)->name}}
                                        </div>
                                        <div class="col-sm-5">
                                          <b>To/Destination</b>: {{Region::find($way->destination)->name}}
                                        </div>
                                      </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form class="form-horizontal" role="form">
                                      <div class="form-group">
                                        <div class="col-sm-5">
                                          <b>Waybill</b> : {{$way->code}}
                                        </div>
                                        <div class="col-sm-5">
                                          <b>CDS officer</b>: 
                                        </div>
                                      </div>
                                    </form>
                                </div>
                          </div>

 
 <div class="row" id="primaryInfo">
            <div class="col-md-12">
                <div class="col-md-6">
                      <form class="form form-horizontal">  
                      
                      <div class="form-group"> 
                       <label class="col-sm-5 control-label"></label> 
                      <div class="col-sm-5">
   
                      </div>         
                      </div>
                      </form>
                      <form class="form form-horizontal">   
                      <div class="form-group">
                    <!--     <label class="col-sm-5 control-label">Flyer No.</label> 
                      <div class="col-sm-5">
                        <input class="form-control" id="flyer" type="text"/>
                      </div>  -->        
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
                        <input class="btn btn-success" id="btNext"  type="button" value="Show more" />
                      </div>         
                      </div>
                      </form>
                </div>
            </div>
</div> 

<div style="z-index: 3000; position: absolute; top: 250px; left: 470px; display:none" id="loader">
{{HTML::image('assets/img/loader.gif')}} Please waiting . . . 
</div>     

<div style="display:none" id="all">                                  

<form id="myWizard"  class="form-horizontal">
   

@if(Auth::user()->role == "approver")
        <section class="step" data-step-title="Sender's Details(From)">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Sender's Name</label> 
                          <div class="col-sm-5">
                            
                          </div>
                          </div>  
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Company Name</label> 
                          <div class="col-sm-5">
                             
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Street Name</label> 
                            <div class="col-sm-5">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">House Name</label> 
                          <div class="col-sm-5">
                           
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Postal Code/Area</label> 
                            <div class="col-sm-5">
                             
                            </div>
                          </div>                                              
                    </div>    
                    <div class="col-md-6">
                           <div class="form-group">
                            <label class="col-sm-5 control-label">District</label> 
                          <div class="col-sm-5">
                            
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Region</label> 
                            <div class="col-sm-5">
                                     
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Tel No</label> 
                          <div class="col-sm-5">
                           
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Mob No</label> 
                            <div class="col-sm-5">
                              
                            </div>
                            
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Email</label> 
                            <div class="col-sm-5">
                              
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
                            
                          </div>
                          </div>  
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Company Name</label> 
                          <div class="col-sm-5">
                            
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Street Name</label> 
                            <div class="col-sm-5">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">House Name</label> 
                          <div class="col-sm-5">
                            
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Postal Code/Area</label> 
                            <div class="col-sm-5">
                              
                            </div>
                          </div>                                              
                    </div>    
                    <div class="col-md-6">
                           <div class="form-group">
                            <label class="col-sm-5 control-label">District</label> 
                          <div class="col-sm-5">
                            
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Region</label> 
                            <div class="col-sm-5">
                                                                   
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Tel No</label> 
                          <div class="col-sm-5">
                            
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Mob No</label> 
                            <div class="col-sm-5">
                              
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Email</label> 
                            <div class="col-sm-5">
                              
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
                              
                            </div>
                        </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Actual</label> 
                            <div class="col-sm-7">
                              
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Excess</label> 
                            <div class="col-sm-7">
                              
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
                            
                        </div>
                        <div class="pull-right">    
                           <p>Packing</p>
                           
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
                            
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Type of Payment</label> 
                            <div class="col-sm-5">
                            
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Cost</label> 
                          <div class="col-sm-5">
                            
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Insurance(Value)</label> 
                            <div class="col-sm-5">
                              
                            </div>
                          </div> 
                          <div class="form-group">
                            <label class="col-sm-5 control-label">other</label> 
                            <div class="col-sm-5">
                              
                            </div>
                          </div>                          
                    </div>    
                    <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-5 control-label">Time received </label> 
                          <div class="col-sm-5">
                            
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
                                      
                                    </div>
                                  </div> 
                                  <div class="form-group">
                                    <label class="col-sm-5 control-label">Contact</label> 
                                    <div class="col-sm-5">
                                      
                                    </div>
                                  </div> 
                                  <div class="form-group">
                                    <label class="col-sm-5 control-label">Time delivered</label> 
                                    <div class="col-sm-5">
                                      
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
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#datepicker" ).datepicker();
          });
    </script>
{{HTML::script('assets/scripts/eW.js')}}

<script>

$(document).ready(function(){



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
    var i = 0;
    var f = 0;
    $('#btNext').on('click', function(){  
            if(i==0){
              $('#all').fadeIn(100);
              $(this).val('show less').removeClass('btn btn-danger').addClass('btn btn-success');
              if(f==0){
               $('#myWizard').easyWizard({submitButtonClass:"btn btn-success",'submitButton': false, buttonsClass: "btn btn-primary"});
               f++;
            }
              i++;
            }else{
               $('#all').fadeOut(100);
                $(this).val('show more').removeClass('btn btn-success').addClass('btn btn-danger');
               i = 0;
            }
    });


   

});
</script>
                        </div>
                    </div>                  
              </div>  
@stop

















