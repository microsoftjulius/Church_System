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
                <form  class="pull-right" action="/search-group" method="POST">
                    @csrf
                    <!--serch form  -->
                    <div class="col-md-12">
                                        <div class="col-md-8"></div>
                                            <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control col-md-12" placeholder="search group" name="group_name" id="srch-term" required>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i>
                                                                </button>
                                                            </div>
                                                    </div>
                                            </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                            <a href="/create-group-form"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> Group</i></button></a>

                                            </div>
                                        </div>
                                </div>
                </form>
                <!--table -->
                <div class="row">
                        <div class="col-lg-12">
                            <section class="box col-lg-12 col-sm-12 col-md-12 mt-3">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">No.</th>
                                        <th class="th-sm">Group Name</th>
                                        <th class="th-sm">Created By</th>
                                        <th class="th-sm">Date Created</th>
                                        <th class="th-sm">Number Of contacts</th>
                                        <th class="th-sm">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $index=>$contact)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $contact->group_name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            @if($contact->number_of_contacts-1 > 0)
                                            <td>{{ $contact->number_of_contacts-1 }}</td>
                                            @else
                                            <td>{{ $contact->number_of_contacts }}</td>
                                            @endif
                                            <td><a href="/view-contacts/{{ $contact->id }}">view contacts</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </section>
                            {{ $contacts->links() }}
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
