<div class="col-md-3 left_col" style="background-color: blue">
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
        <li><a href='/home'><i class="fa fa-home"></i> Home </a></li>
        <li><a href='/church'><i class="fa fa-book"></i> Churches </a></li>
        <li><a href='/user'><i class="fa fa-user"></i>User </a></li>
        {{--  <li><a href="/createchurches"><i class="fa fa-plus"></i>Add new Church</a></li>  --}}
        <li><a href='/contacts' data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-phone"></i> Contacts</a>
        <ul class="collapse list-unstyled">
            <li class="text-center text-white py-4"><a href='/form'><i class="fa fa-table"></i> Form </a></li>
            <li class="text-center text-white p-5"><a href='/groups'><i class="fa fa-group"></i> Groups </a></li>
            <li class="text-center text-white"><a href='/manager'><i class="fa fa-spinner"></i> Manager </a></li>
        </ul>
        </li>
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
