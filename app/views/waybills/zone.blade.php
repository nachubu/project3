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
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Zone Managers
                    <span class="pull-right">
                        <select id="select-waybills">
                            <option value="all">     All</option>
                            <option value="regions"> By Company</option>
                            <option value="company"> By regions</option>
                <option value="reports"> By reports</option>
                        </select>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="load-waybills">

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Create At</th>
                                        <th>Update At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($wregions as $user)
                                    <tr class="odd gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$user->address_sender}}</td>
                                        <td>{{$user->address_receiver}}</td>
                                        <td>{{$user->receiver_name}}</td>
                                        <td>{{$user->receiver_contact}}</td>
                                        <td>
                                            <button class="btn btn-xs btn-success" title="Edit waybill"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-xs btn-primary" title="view waybill"><i class="fa fa-file-o"></i></button>
                                            <button class="btn btn-xs btn-danger" title="delete waybill"><i class="fa fa-trash-o"></i></button>
                                            <button class="btn btn-xs btn-info" title="waybill log"><i class="fa fa-list-alt"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                             
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>  


    {{HTML::style('assets/media/css/jquery.dataTables.css')}}
    {{HTML::style('assets/css/jq.ui.css')}}
    {{HTML::style('assets/media/css/jquery.dataTables_themeroller.css')}}  
    {{HTML::script('assets/media/js/jquery.dataTables.js')}}

    <script>
        $(document).ready(function() {

           

            $('#select-waybills').on('change', function() {
                var wbs = $(this).val();
                $('#load-waybills').css({opacity: "0.1"});
                $.post('waybills/getWaybills', {wbs: wbs}, function(data) {
                    $('#load-waybills').css({opacity: "1"});
                    $('#load-waybills').html(data);
                });
            });

            $('#dataTables-example').dataTable({
                "bJQueryUI": false,
                "sPaginationType": "full_numbers",
                "fnDrawCallback": function(oSettings) {
                    $(".deleteuser").click(function() {
                        var id1 = $(this).parent().attr('id');
                        $(".deleteuser").show("slow").parent().find("span").remove();
                        var btn = $(this).parent().parent();
                        $(this).hide("slow").parent().append("<span><br>Delete? <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Y</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> N</a></span>");
                        $("#no").click(function() {
                            $(this).parent().parent().find(".deleteuser").show("slow");
                            $(this).parent().parent().find("span").remove();
                        });
                        $("#yes").click(function() {
                            $(this).parent().html("<br><i class=''></i><span style='font-size: 11px; color:red'>deleting...</span>");
                            $.post("users/delete/" + id1, function(data) {
                                btn.hide("slow").next("hr").hide("slow");
                            });
                        });
                    });//endof deleting category
                }
            });
        });
    </script> 
    @stop
