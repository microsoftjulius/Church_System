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
                    <div class="panel-heading text-center"><h4></h4>
                    <hr>
                    </div>
                            <div class="form-group row md-form">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Contact Groups</label>
                                <div class="col-sm-8">
                                <select class="form-control checkbox" id="group_id" name="group_id" multiple="multiple">
                                  @foreach($drop_down_groups as $picking_from_database)
                                    <option value="{{$picking_from_database->id}}">{{$picking_from_database->group_name}}</option>
                                  @endforeach
                                </select>
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
                                <hr>
                                    <div class="container">
                                        <div class="row">
                                           <div class="col-sm-1"></div>
                                            <div class="form-group"> 
                                                <label class="col-md-1 checkbox-inline" for="checkboxes-0">
                                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                                    <div class="profile_pic">
                                                        <img src="{{ asset('bootstrap/images/mtn.jpg') }}" alt="..." class="mr-2" style="width:200%; height:100%">
                                                    </div>
                                                </label>
                                                <label class="col-md-1 checkbox-inline" for="checkboxes-1">
                                                <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                                                    <div class="profile_pic mr-2">
                                                        <img src="{{ asset('bootstrap/images/Airtel1.png') }}" alt="..." class="" style="width:400%; height:350%">
                                                    </div>
                                                </label>
                                                <label class="col-md-1 checkbox-inline" for="checkboxes-2">
                                                <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
                                                <div class="profile_pic">
                                                        <img src="{{ asset('bootstrap/images/utl.png') }}" alt="..." class="" style="width:300%; height:150%">
                                                    </div>
                                                </label>
                                                <label class="col-md-1 checkbox-inline" for="checkboxes-3">
                                                <input type="checkbox" name="checkboxes" id="checkboxes-3" value="4"> 
                                                 <div class="profile_pic">
                                                        <img src="{{ asset('bootstrap/images/africel.png') }}" alt="..." class="" style="width:50%; height:50%">
                                                </div>
                                                </label>
                                                <label class="col-md-6 checkbox-inline" for="checkboxes-3">
                                                 <span class="text-italic text-success mr-1"><em>(Tick Telecoms To Send To)</em></span>
                                                </label>
                                                <br>
                                            </div>
                                        </div>
                                        
                                    </div> 
                                    <hr>
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
                            </div><br>
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
