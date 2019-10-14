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
                                <div class="col-md-12">
                                       <div class="col-md-3">
                                            <div class="input-group">
                                                @include('layouts.breadcrumbs')
                                            </div>
                                        </div> 
                                            <div class="col-md-3">
                                            <form class="pull-right pt-4" role="search" action="/search-message-categories" method="post" >
                                                @csrf
                                                    <div class="input-group">
                                                            <input type="text" class="form-control col-md-4" placeholder="Search" name="category" id="srch-term" >
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i>
                                                                </button>
                                                            </div>
                                                    </div>
                                                    </form>
                                            </div>
                                            <div class="col-md-3">
                                            
                                                <div class="input-group-btn">
                                                    <<button href="/add-message-category"><button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Message category
                                                    </button></a>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="input-group-btn">
                                                    <a href="/add-search-term"> <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Search term
                                                    </button></a>
                                                </div>
                                            </div>
                                </div>
                        </div>
                    <!--Table-->
                <div class="row">
                            <div class="col-lg-12">
                                <section class="box col-lg-12 col-sm-12 col-md-12 mt-3">
                                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm bg-white" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class="th-sm">Id</th>
                                                        <th class="th-sm">Message category
                                                        </th>
                                                        <th class="th-sm">Number of categories</th>
                                                        <th class="th-sm">Option</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Prayer request</td>
                                                    <td>20</td>
                                                    <td><a href="/add-search-term">View/edit</a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Bible study</td>
                                                    <td>10</td>
                                                    <td><a href="/add-search-term">View/edit</a></td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </section>
                               
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
