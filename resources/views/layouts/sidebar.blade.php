<div class="col-md-3 left_col">
<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> Churches <span></span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('bootstrap/images/img.jpg') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2 style="text-transform:capitalize">{{ auth()->user()->name }}</h2>
    </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            @if(auth()->user()->church_id == 1)
                <li><a href='/home'><i class="fa fa-home"></i> Home </a></li>
                <li><a href='/church'><i class="fa fa-book"></i> Churches </a></li>
            @endif
        <li><a href='/user'><i class="fa fa-user"></i>Users </a></li>
        <li><a><i class="fa fa-phone"></i> Contacts <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="/contact-groups">Contacts groups</a></li>
            </ul>
        </li>
        <li><a><i class="fa fa-envelope"></i> Messages <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="/sent-quick-messages">Quick Message</a></li>
                <li><a href="/display-sent-messages">Sent Messages</a></li>
                <li><a href="/message-categories"><i class=""></i> Message categories </a></li>
                <li><a href="/incoming-messages"><i class=""></i> Incoming messages </a></li>

            </ul>
        </li>
        <li><a><i class="fa fa-cc-paypal"></i> Payments <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="/packages">Packages</a></li>
                <li><a href="/logs">Logs</a></li>
            </ul>
        </li>
        
        <li><a href="/change-passwords"><i class="fa fa-lock"></i> Change Password </a></li>
        </ul>
    </div>
    </div>
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
