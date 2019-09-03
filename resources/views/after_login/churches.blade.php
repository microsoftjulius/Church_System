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
                                            <div class="count">2</div>
                                            <h3>Churches</h3>
                                            <p>Total Churches</p>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-users"></i></div>
                                            <div class="count">2</div>
                                            <h3>Users</h3>
                                            <p>Total Users</p>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-phone"></i></div>
                                            <div class="count">2</div>
                                            <h3>Contacts</h3>
                                            <p>Total Contacts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                <form  class="pull-right">
                    <div class="form-group row col-lg-12">
                        <label for="churchName" class="col-sm-2 col-form-label">Church</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="church_name" placeholder="enter church name"required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Church</button>
                    </div> 
                </form>
                <!--table -->
                <div class="row">
                        <div class="col-lg-12">
                            <section class="box col-lg-12 col-sm-12 col-md-12 mt-3">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">ChurchName
                                        </th>
                                        <th class="th-sm">UserName
                                        </th>
                                        <th class="th-sm">Email
                                        </th>
                                        <th class="th-sm">Description
                                        </th>
                                        <th class="th-sm">Created At
                                        </th>
                                        <th class="th-sm">Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <tr>
                                    <td>St Augustine</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                    <td>Caters all christians</td>
                                    <td>03/09/2019</td>
                                    <td>Delete</td>
                                </tr>
                                <tr>
                                    <td>St Francis</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                    <td>all christians</td>
                                    <td>03/09/2019</td>
                                    <td>Edit</td>
                                </tr>
                                <tr>
                                    <td>St Paul</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                    <td>christians center</td>
                                    <td>03/09/2019</td>
                                    <td>Delete</td>
                                </tr>  
                                </tbody>    
                                </table>    
                            </section>
                        </div>
                    </div>
                    <!--Setupform-->
                    
                    <form class="col-md-offset-3 col-sm-6" style="border: 1px solid black ;border-width: 4px 4px 4px 4px; padding :1em; border: ridge #ccc; background-color:white;">
                    <div class="panel-heading text-center"><h4>Please Enter Church Details</h4></div>
                            <div class="form-group row md-form">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="name" id="materialFormCardNameEx" placeholder="Enter Church name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Database</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="colFormLabel" name="database_name" placeholder="Enter Database name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">URL</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" name="url" id="colFormLabelLg" placeholder="Enter Your url">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control form-control-lg" name="password" id="colFormLabelLg" placeholder="xxxxxxxxxxxxxxx">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Logo</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" name="logo" id="colFormLabelLg" placeholder="attach logo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="text-center py-4 mt-3 ">
                                <button type="submit" class="btn btn-primary">Save</button>
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
