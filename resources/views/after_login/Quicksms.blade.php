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
                    <form class="col-md-offset-1 col-sm-10" style="border-width: 4px 4px 4px 4px; padding :1em; background-color:white;" action="/store-sent-messages" method="POST">
                        @csrf
                        <div class="panel-heading text-center">
                            <h4></h4>
                            <hr>
                        </div>
                        @include('layouts.message')
                        <div class="form-group row md-form">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Contact Groups</label>
                            <div class="col-sm-10">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Select a Group &nbsp;<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="padding: 10px;" id="myDiv">
                                        <li><input type="checkbox" id="select_all"/> Select all Groups</li>
                                            @foreach($drop_down_groups as $picking_from_database)
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="checkbox dropdown-item" name="checkbox[]" value="{{$picking_from_database->id}}" /> {{ $picking_from_database->group_name }}</label>
                                            </div>
                                                @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">Current Date/Time</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="dateshown" name="created_at">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Text Message</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control form-control-lg" onkeyup="countChars(this);" rows="7" id="message" name="message"></textarea>
                                <p class="text-" id="charNum"><span class="text-primary">0 characters [1message is 160 characters,2messages 320 characters]</span></p>
                                <div class="container">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-4 checkbox-inline" for="messages">
                                            <input type="checkbox" name="checkboxes" id="messages-0" value="1">
                                            schedule Message
                                            </label>
                                            <label class="col-md-4 checkbox-inline" for="messages-1">
                                            <input type="checkbox" name="checkboxes" id="messages-1" value="2">
                                            Save message as template
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"> Number of Contacts</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-lg" name="contact_character" id="contact_character" placeholder=""value="{{auth()->user()->count_contacts_in_a_groups()}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="text-center py-4 mt-3 ">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                                <a href="/home"><button type="button" class="btn btn-warning"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</i></button></a>
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
