            
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>

                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <!-- <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div> -->
                        <!--end search section-->
                    </li>

                    <li>
                        <a href="{{url('home')}}"> <i class="fa fa-home"></i> Home </a>
                    </li>
                    @if(Auth::user()->role == "admin")
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Users <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('user/add')}}"><i class="fa fa-plus"></i> Add User</a>
                            </li>
                            <li>
                                <a href="{{url('users')}}"><i class="fa fa-cog"></i> Manage users</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                          <a href="#"><i class="fa fa-users"></i> Managers <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('manager/zone')}}"><i class="fa fa-user"></i> Zone Manager</a>
                            </li>
                            <li>
                                <a href="{{url('manager/account')}}"><i class="fa fa-user"></i> Operation Manager</a>
                            </li>
                            <li>
                                <a href="{{url('manager/account')}}"><i class="fa fa-user"></i> Account Manager</a>
                            </li>
                        </ul>
                    </li>
                    
                  @endif
                    <li>
                        <a href="#"><i class="fa fa-file fa-fw"></i> Waybill <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('waybill/add')}}"><i class="fa fa-plus"></i> Add waybill</a>
                            </li>
                            <li>
                                <a href="{{url('waybills')}}"><i class="fa fa-cog"></i> Manage waybill</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="{{url('logout')}}"> <i class="fa fa-power-off"></i> logout </a>
                    </li>
                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
