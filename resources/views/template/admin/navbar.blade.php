<!-- Top Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="{{URL::to('/admin/index')}}"><b><img src="{{URL::to('assets/upload/logo/Accounting Week Logo.jpg')}}" alt="Accounting Week Logo" height="25.em"/></b><span class="hidden-xs">{{session('admin')['last_name']}}</span></a></div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <!--<li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"><b class="hidden-xs">{{session('admin')['last_name']}}</b> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                    <li><a href="{{URL::to('admin/account_setting')}}"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{URL::to('admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            <!--</li>-->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->
