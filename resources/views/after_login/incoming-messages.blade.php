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
                            <form class="pull-right pt-4" role="search" action="/search-sent-messages" method="get" >
                            @csrf
                                <div class="col-md-12">
                                        <div class="col-md-7">
                                            <form action="/dates-filter" method="get">
                                                <div class="input-group">
                                                <div class="input-group-btn">
                                                    <input type="text" class="form-control col-sm-2 mr-2" name="from_date" placeholder=" Date from">
                                                    </div>
                                                    <div class="input-group-btn">
                                                    <input type="text" class="form-control col-sm-2" name="to" placeholder="Date to">
                                                    </div>
                                                    <div class="input-group-btn">
                                                    <button type="button" name="filter" id="filter" class="btn btn-success"><i class="glyphicon glyphicon-search"> filter</i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                            <div class="col-md-3">
                                                    <div class="input-group">
                                                            <input type="text" class="form-control col-md-10" placeholder="Search incoming messages" name="search_message" id="srch-term" required>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i>
                                                                </button>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-2">
                                                    <div class="input-group-btn">
                                                        <div class="form-group row md-form"> 
                                                            <div class="col-md-6">
                                                                <div class="btn-group">
                                                                    <a href="#" class="btn btn-primary btn-block dropdown-toggle " data-toggle="dropdown">
                                                                    Categories &nbsp;<span class="caret"></span>
                                                                    </a>
                                                                    <ul class="dropdown-menu" style="padding: 3px;" id="myDiv">
                                                                    <li><input type="checkbox" id="select_all"/> All categories</li>
                                                                            @foreach($drop_down_categories as $picking_from_category_database)
                                                                                <div class="checkbox">
                                                                                    <label>
                                                                                        <input type="checkbox" class="checkbox dropdown-item checkbox-primary" name="checkbox[]" value="{{$picking_from_category_database->id}}" /> {{ $picking_from_category_database->title }}
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
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
                                                        <th class="th-sm">Id</th>
                                                        <th class="th-sm">Message
                                                        </th>
                                                        <th class="th-sm">Category</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                                @if ($messages_to_categories->currentPage() > 1)
                                                    @php($i =  1 + (($messages_to_categories->currentPage() - 1) * $messages_to_categories->perPage()))
                                                    @else
                                                    @php($i = 1)
                                                    @endif
                                                @foreach ($messages_to_categories as $messages)
                                            <tr>
                                                <th class="th-sm">{{ $i++ }}</th>
                                                <th class="th-sm">{{ $messages->message }}</th>
                                                <th class="th-sm">{{ $messages->title }}</th>
                                            </tr>
                                            @endforeach
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
