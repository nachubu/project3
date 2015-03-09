@extends('layouts.master')

@section('main')
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
                            SHIPMENT WAYBILL
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6" >
                                    <form class="form-horizontal" role="form">
                                      <div class="form-group">
                                        <div class="col-sm-5">
                                          <input type="text" class="form-control location" id="lfrom" name="origin" placeholder="Origin/From" />	
                                        </div>
                                        <div class="col-sm-5">
                                          <input type="text" class="form-control location" id="lto" name="destination" placeholder="Destination/To" />	
                                        </div>
                                      </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form class="form-horizontal" role="form">
                                      <div class="form-group">
                                          <label class="col-sm-5 control-label">Waybill No.</label> 
                                        <div class="col-sm-5">
                                          <input class="form-control" type="text" id="waybill_code" name="code" />
                                        </div>
                                      </div>    
                                    </form>
                                </div>
                          </div>
                          <div style="display:none" id="loader2">
                            <div class="alert alert-success">
                              <center>
                                <b>Successfully waybill added </b>
                              </center>
                            </div>
                        </div>   
                          <div id="content"></div>
                        </div>
                    </div>                  
             	</div>	
{{HTML::script('assets/scripts/jquery-ui.js')}}
<script>
function split( val ) {
      return val.split( /,\s*/ );
}
function extractLast( term ) {
      return split( term ).pop();
}
(function(){
	
		

	$('#lto').autocomplete({
          source: function( request, response ) {
          $.getJSON( "autoSearchLto", {
            term: extractLast( request.term )
          }, response );
        }
    	});

	//Codes fopr onKeyUp 
	$('#lfrom').autocomplete({
          source: function( request, response ) {
          $.getJSON( "autoSearch", {
            term: extractLast( request.term )
          }, response );
        }
    	});
})();
</script>
@stop
