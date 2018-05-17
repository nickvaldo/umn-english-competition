<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="#" class="waves-effect"><i class="fa fa-user" style="margin-right: 0.7em"></i><span class="hide-menu"> {{Auth::user()['first_name']." ".Auth::user()['last_name']}}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{URL::to('/admin/emails')}}"><i class="ti-email"></i> Inbox</a></li>
                    <li><a href="{{URL::to('/admin/account_setting')}}"><i class="ti-settings"></i> Account Setting</a></li>
                    <li><a href="{{URL::to('/admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <li class="nav-small-cap m-t-10">--- Main</li>
            <li> <a href="{{URL::to('/admin/dashboard')}}" class="waves-effect"><i class="fa fa-desktop" style="margin-right: 0.7em"></i> <span class="hide-menu"> Dashboard </span></a> </li>
            <li class="nav-small-cap m-t-10">--- User</li>
            <li> <a href="{{URL::to('/admin/candidates')}}" class="waves-effect"><i class="fa fa-users" style="margin-right: 0.7em"></i> <span class="hide-menu"> Candidates </span></a> </li>
            <li> <a href="{{URL::to('/admin/employees')}}" class="waves-effect"><i class="fa fa-briefcase" style="margin-right: 0.7em"></i> <span class="hide-menu"> Employees </span></a> </li>
            <li> <a href="{{URL::to('/admin/contributors')}}" class="waves-effect"><i class="fa fa-suitcase" style="margin-right: 0.7em"></i> <span class="hide-menu"> Contributors </span></a> </li>
            <!--<li> <a href="index.html" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right">4</span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="index.html">Candidates</a> </li>
                    <li> <a href="index2.html">Employees</a> </li>
                    <li> <a href="index3.html">Contributors</a> </li>
                </ul>
            </li>-->
            <li class="nav-small-cap">--- Others</li>
            <li> <a href="{{URL::to('/admin/companies')}}" class="waves-effect"><i class="fa fa-building" style="margin-right: 0.7em"></i> <span class="hide-menu"> Companies </span></a> </li>
            <li> <a href="{{URL::to('/admin/institutions')}}" class="waves-effect"><i class="fa fa-bank" style="margin-right: 0.7em"></i> <span class="hide-menu"> Institutions </span></a> </li>
            <li> <a href="{{URL::to('/admin/testings')}}" class="waves-effect"><i class="fa fa-pencil-square-o" style="margin-right: 0.7em"></i> <span class="hide-menu"> Testings </span></a> </li>
            <li> <a href="{{URL::to('/admin/jobs')}}" class="waves-effect"><i class="fa fa-archive" style="margin-right: 0.7em"></i> <span class="hide-menu"> Jobs </span></a> </li>
            <li> <a href="{{URL::to('/admin/blogs')}}" class="waves-effect"><i class="fa fa-file-text-o" style="margin-right: 0.7em"></i> <span class="hide-menu"> Blogs </span></a> </li>
            <li class="nav-small-cap">--- Support</li>
            <!--<li><a href="documentation.html" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Documentation</span></a></li>
            <li><a href="gallery.html" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span class="hide-menu">Gallery</span></a></li>
            <li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li>-->
            <li><a href="{{URL::to('/admin/logout')}}" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->
