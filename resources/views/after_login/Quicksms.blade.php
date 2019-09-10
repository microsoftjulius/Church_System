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
                    <!--Setupform-->

                    <form class="col-md-offset-1 col-sm-10" style="border-width: 4px 4px 4px 4px; padding :1em; background-color:white;" action="/adds-user" method="POST">
                        @csrf
                    <div class="panel-heading text-center"><h4></h4>
                    <hr>
                    </div>
                            <div class="form-group row md-form">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Contact Groups</label>
                                <div class="col-sm-8">
                                     
                                            <select class="form-control form-control-lg">
                                                <option>Choose Your Group</option>
                                                <option>Kikoni Group</option>
                                                <option>Wandegeya Group</option>
                                                <option>Kasubi Group</option>
                                                <option>Nakulyabe Group</option>
                                            </select>  
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Current Date/Time</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="dateshown" name="current_date_time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Text Message</label>
                                <div class="col-sm-8">
                                <textarea type="text" class="form-control form-control-lg" onkeyup="countChars(this);" rows="7" name="message"></textarea>
                                <p class="text-" id="charNum">0 characters</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Contact Character </label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-lg" name="characters" id="colFormLabelLg" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="text-center py-4 mt-3 ">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </div>
                        </form>

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
    </body>
</html>
