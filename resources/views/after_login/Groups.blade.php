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
                @include('layouts.message')
                <!-- Search form -->
                <div class="row">
                            <form class="pull-right pt-4" role="search" action="/search" method="Post" >
                            @csrf
                                <div class="col-md-12">
                                        <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                    <div class="input-group">
                                                            <input type="text" class="form-control col-md-12" placeholder="Search" name="search" id="srch-term" required>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i>
                                                                </button>
                                                            </div>
                                                    </div>
                                            </div>
                                </div>
                            </form>
                        </div>
                    <!--Table-->
                <div class="row">
                            <div class="col-lg-12">
                                <section class="box col-lg-12 col-sm-12 col-md-12 mt-3">
                                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm bg-white" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">ID</th>
                                                    <th class="th-sm">Message Body
                                                    </th>
                                                    <th class="th-sm">Number of Contacts Sent To
                                                    </th>
                                                    <th class="th-sm">Created By
                                                    </th>
                                                    <th class="th-sm">Date/Time</th>
                                                    <th class="th-sm"> Message Status</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                </section>
                            </div>
                    </div>
                    <div class="col-md-2 pull-right">
                        <div class="input-group">
                        <a href="{{url()->previous()}}"><button type="button" class="btn btn-danger"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</i></button></a>
                        </div>
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
    </body>
</html>
