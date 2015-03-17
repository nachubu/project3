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
                            <i class="fa fa-user"></i> Add User information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6" >
       
                                                               
                                    {{Form::open(array("url"=>'user/add', "class"=>"form-horizontal", "role"=>"form"))}}
                                      <div class="form-group">
                                        <label class="col-sm-5 control-label">Firstname</label> 
                                        <div class="col-sm-5">
                                          <input class="form-control" type="text" name="firstname" />
                                        </div>
                                      </div> 
                                      <div class="form-group">
                                        <label class="col-sm-5 control-label">Lastname</label> 
                                        <div class="col-sm-5">
                                          <input class="form-control" type="text" name="lastname" />
                                        </div>
                                      </div> 
                                      <div class="form-group">
                                        <label class="col-sm-5 control-label">Email</label> 
                                        <div class="col-sm-5">
                                          <input class="form-control" type="text" name="email" />
                                        </div>
                                      </div> 
                                      <div class="form-group">
                                        <label class="col-sm-5 control-label">Password</label> 
                                        <div class="col-sm-5">
                                          <input class="form-control" type="password" name="password" />
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-5 control-label">Repeat Password</label> 
                                        <div class="col-sm-5">
                                          <input class="form-control" type="password" name="cpassword" />
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-5 control-label">Position/Role</label> 
                                        <div class="col-sm-5">
                                         <select class="form-control" name="role">
                                          <option></option>
                                           <option value="Approver">Approver</option>
                                           <option value="Zone Manager">Zone Manager</option>
                                           <option value="Operation Manager">Operation Manager</option>
                                           <option value="Account Manager">Account Manager</option>
                                           <option value="Customer">Customer</option>
                                           <option value="Manager">Admin</option>
                                        </select>  
                                        </div>
                                      </div> 
                                      <div class="form-group">
                                        <label class="col-sm-5 control-label"></label> 
                                        <div class="col-sm-5">
                                          <input class="form-control btn btn-success"  type="submit" name="sender_code" value="submit" />
                                        </div>
                                      </div> 
                                    </form>
                                </div>
                                <div class="col-md-6">

                                </div>
                          </div>

                    </div>                  
              </div>  
@stop