<!DOCTYPE html>
<html lang="en">
    @include('layouts.styling')
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <!-- sidebar menu -->
                        @include('layouts.sidebar')
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>  
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                @include('layouts.topnav')
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="row top_tiles">
                                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-home"></i></div>
                                            <div class="count">{{ auth()->user()->count_churches() }}</div>
                                            <h3>Churches</h3>
                                            <p>Registered Churches</p>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-users"></i></div>
                                            <div class="count">{{ auth()->user()->count_users_in_church() }}</div>
                                            <h3>Users</h3>
                                            <p>Churches With Users</p>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-phone"></i></div>
                                            <div class="count">2</div>
                                            <h3>Contacts</h3>
                                            <p>Total Contacts Registered</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Setupform-->

                        <!--checkboxs-->
                        <div class="mc-field-group input-group"><strong>What Kind Of Shoes Are You Interested In?</strong><br>
    
                        <ul>
                            
                            <li><input id="selectAll" type="checkbox"><label for='selectAll'>Select All</label></li>
                            <li><input id="mce-group[19]-19-0" type="checkbox" name="group[19][8]" value="8" /><label for="mce-group[19]-19-0">Women's</label></li>
                            <li><input id="mce-group[19]-19-1" type="checkbox" name="group[19][16]" value="16" /><label for="mce-group[19]-19-1">Men's</label></li>
                            <li><input id="mce-group[19]-19-2" type="checkbox" name="group[19][32]" value="32" /><label for="mce-group[19]-19-2">Kid's</label></li>
                            <li><input id="mce-group[19]-19-3" type="checkbox" name="group[19][64]" value="64" /><label for="mce-group[19]-19-3">Athletic</label></li>
                            <li><input id="mce-group[19]-19-4" type="checkbox" name="group[19][128]" value="128" /><label for="mce-group[19]-19-4">Outdoor</label></li>
                            <li><input id="mce-group[19]-19-5" type="checkbox" name="group[19][256]" value="256" /><label for="mce-group[19]-19-5">Dress Shoes</label></li>
                            <li><input id="mce-group[19]-19-6" type="checkbox" name="group[19][512]" value="512" /><label for="mce-group[19]-19-6">Casual</label></li>
                            <li><input id="mce-group[19]-19-7" type="checkbox" name="group[19][1024]" value="1024" /><label for="mce-group[19]-19-7">Flip Flops</label></li>
                        </ul>
                    </div>

                    <div class="row">
                    </div>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                @include('layouts.footer')
                <!-- /footer content -->
            </div>
        </div>
    
            @include('layouts.javascript')

            <script type="text/javascript">

            $("#selectAll").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                
            });


            jackHarnerSig();
            </script>
    </body>
</html>
