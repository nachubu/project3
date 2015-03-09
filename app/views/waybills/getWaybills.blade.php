@if($wbs == "all")
<table class="table table-striped table-bordered table-hover" id="example">
<thead>
    <tr>
        <th>#</th>
        <th>waybill code</th>
        <th>receive date</th>
        <th>deliver date</th>
        <th>status</th>
        <th>operations</th>
    </tr>
</thead>
<tbody>
    <?php 
        $i = 1; 
        $waybills = Waybill::all();
    ?>
    @foreach($waybills as $waybill)
    <tr class="odd gradeX">
        <td>{{$i}}</td>
        <td>{{$waybill->code}}</td>
        <td>{{$waybill->date_pickup}}</td>
        <td>{{$waybill->date_delivery}}</td>
        <td>{{Waybill::getStatus($waybill->code)}}</td>
        <td>
        <button class="btn btn-xs btn-success" title="Edit waybill"><i class="fa fa-pencil"></i></button>
        <a href='{{url("waybill/show/{$waybill->id}")}}'><button class="btn btn-xs btn-primary" title="view waybill"><i class="fa fa-file-o"></i></button></a>
        <button class="btn btn-xs btn-danger" title="delete waybill"><i class="fa fa-trash-o"></i></button>
        <button class="btn btn-xs btn-info" title="waybill log"><i class="fa fa-list-alt"></i></button>
        </td>
    </tr>
     <?php $i++; ?>
    @endforeach
</tbody>
</table>

{{HTML::script('assets/plugins/jquery-1.10.2.js')}}
{{HTML::style('assets/media/css/jquery.dataTables.css')}}
{{HTML::style('assets/css/jq.ui.css')}}
{{HTML::style('assets/media/css/jquery.dataTables_themeroller.css')}}  
{{HTML::script('assets/media/js/jquery.dataTables.js')}}
<script type="text/javascript">
    $(document).ready(function(){
            $('#example').dataTable({
                "bJQueryUI": false,
            "sPaginationType": "full_numbers",
           "fnDrawCallback": function( oSettings ) {
               $(".deleteuser").click(function(){
                var id1 = $(this).parent().attr('id');
                $(".deleteuser").show("slow").parent().find("span").remove();
                var btn = $(this).parent().parent();
                $(this).hide("slow").parent().append("<span><br>Delete? <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Y</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> N</a></span>");
                $("#no").click(function(){
                    $(this).parent().parent().find(".deleteuser").show("slow");
                    $(this).parent().parent().find("span").remove();
                });
                $("#yes").click(function(){
                    $(this).parent().html("<br><i class=''></i><span style='font-size: 11px; color:red'>deleting...</span>");
                    $.post("users/delete/"+id1,function(data){
                      btn.hide("slow").next("hr").hide("slow");
                   });
                });
            });//endof deleting category
           }
            });
    });
</script>
@elseif($wbs == "regions")
<?php $companies = Company::all(); ?>
<div class="row">
<div class="col-md-6" >
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <div class="col-sm-5">
            Company Name: 
        </div>
        <div class="col-sm-5">
          <select class="form-control" id="company" >
            <option></option>
            @foreach($companies as $company)
              <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
          </select> 
        </div>
      </div>
    </form>
</div>
<div class="col-md-6">
    <form class="form-horizontal" role="form">
      <div class="form-group">
          <label class="col-sm-5 control-label"></label> 
        <div class="col-sm-5">
          <input class="form-control btn btn-success" type="button"  id="getWyb" value="Search Waybills" />
        </div>
      </div>    
    </form>
</div>
</div>
<span id="fdkbk" style="display:none">Please waiting . . . </span>
<div id="results"></div>

{{HTML::script('assets/plugins/jquery-1.10.2.js')}}
<script type="text/javascript">
    $(document).ready(function(){

        $('#getWyb').on('click', function(){
                        var company = $('#company').val();
                        $('#fdkbk').show();
                        $('#results').html('');
                        $('.row').css({opacity: "0.9"});
                        $.post('waybills/wcpy', {cpy : company}, function(data){
                            $('#fdkbk').hide();
                            $('.row').css({opacity: "1"});
                            $('#results').html(data);
                        });
        });

    });    
</script>
@elseif($wbs == "company")
<?php $regions = Region::all(); ?>
<div class="row">
<div class="col-md-6" >
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <div class="col-sm-5">
          <select class="form-control" id="lfrom" name="origin">
            <option>Orgin/From</option>
            @foreach($regions as $region)
              <option value="{{$region->id}}">{{$region->name}}</option>
            @endforeach
          </select>  
        </div>
        <div class="col-sm-5">
          <select class="form-control" id="lto" name="destination">
            <option>Destination/To</option>
            @foreach($regions as $region)
              <option value="{{$region->id}}">{{$region->name}}</option>
            @endforeach
          </select> 
        </div>
      </div>
    </form>
</div>
<div class="col-md-6">
    <form class="form-horizontal" role="form">
      <div class="form-group">
          <label class="col-sm-5 control-label"></label> 
        <div class="col-sm-5">
          <input class="form-control btn btn-success" type="button"  id="getWyb" value="Search Waybills" />
        </div>
      </div>    
    </form>
</div>
</div>
<span id="fdkbk" style="display:none">Please waiting . . . </span>
<div id="results"></div>

{{HTML::script('assets/plugins/jquery-1.10.2.js')}}
<script type="text/javascript">
    $(document).ready(function(){

        $('#getWyb').on('click', function(){
                        var lfrom = $('#lfrom').val();
                        var lto   = $('#lto').val();
                        $('#fdkbk').show();
                        $('#results').html('');
                        $('.row').css({opacity: "0.9"});
                        $.post('waybills/w', {lf:lfrom, lt:lto}, function(data){
                            $('#fdkbk').hide();
                            $('.row').css({opacity: "1"});
                            $('#results').html(data);
                        });
        });

    });    
</script>


@else

<?php $regions = Region::all(); ?>
<div class="row">
<div class="col-md-6" >
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <div class="col-sm-5">
           <input placeholder="From date" id="fromdate" type="text" class="form-control datefromto" />
        </div>
        <div class="col-sm-5">
          <input placeholder="To date" id="todate" type="text" class="form-control datefromto" />
        </div>
      </div>
    </form>
</div>
<div class="col-md-6">
    <form class="form-horizontal" role="form">
      <div class="form-group">
          <label class="col-sm-5 control-label"></label> 
        <div class="col-sm-5">
          <input class="form-control btn btn-success" type="button"  id="getWyb" value="Generate Reports" />
        </div>
      </div>    
    </form>
</div>
</div>
<span id="fdkbk" style="display:none">Please waiting . . . </span>
<div id="results"></div>

{{HTML::script('assets/plugins/jquery-1.10.2.js')}}
{{HTML::script('assets/scripts/jquery-ui.js')}}
{{HTML::script('assets/scripts/timepicker.js')}}
    <script type="text/javascript">
        $(document).ready(function(){
            $( ".datefromto" ).focusin(function(){
			$(this).datetimepicker();
		});
		
          });
    </script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#getWyb').on('click', function(){
                        var lfrom = $('#fromdate').val();
                        var lto   = $('#todate').val();
                        $('#fdkbk').show();
                        $('#results').html('');
                        $('.row').css({opacity: "0.9"});
                        $.post('waybills/wR', {fd:lfrom, td:lto}, function(data){
                            $('#fdkbk').hide();
                            $('.row').css({opacity: "1"});
                            $('#results').html(data);
                        });
        });

    });    
</script>




@endif 


