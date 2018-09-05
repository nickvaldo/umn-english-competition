<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="#" class="waves-effect"><i class="fa fa-user" style="margin-right: 0.7em"></i><span class="hide-menu">{{session('admin')['last_name']}}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{URL::to('/admin/account_setting')}}"><i class="ti-settings"></i> Account Setting</a></li>
                    <li><a href="{{URL::to('/admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <li class="nav-small-cap m-t-10">--- Main</li>
            <li> <a href="{{URL::to('/admin/index')}}" class="waves-effect"><i class="fa fa-calendar" style="margin-right: 0.7em"></i> <span class="hide-menu"> Terms </span></a> </li>
            @if(session()->has('selected_term'))
            <li class="nav-small-cap m-t-10">--- Accounting Week {{ session('selected_term')['term']->period_year }}</li>
                <li> <a href="{{URL::to('/admin/term/'.session('selected_term')['period_id'])}}" class="waves-effect"><i class="fa fa-desktop" style="margin-right: 0.7em"></i> <span class="hide-menu"> Dashboard </span></a> </li>
                @if(isset(session('selected_term')['universitas_term_id']))
                    <li class="nav-small-cap m-t-10">--- Universitas</li>
                    <li> <a href="{{URL::to('/admin/questions/'.session('selected_term')['universitas_term_id'])}}" class="waves-effect"><i class="fa fa-file-text-o" style="margin-right: 0.7em"></i> <span class="hide-menu"> Question </span></a> </li>
                    <li> <a href="{{URL::to('/admin/participants')}}" class="waves-effect"><i class="fa fa-users" style="margin-right: 0.7em"></i> <span class="hide-menu"> Participants <span class="fa arrow"></span> <!--<span class="label label-rouded label-custom pull-right">4</span>--></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{URL::to('/admin/participants/institutions/'.session('selected_term')['universitas_term_id'])}}"><i class="fa fa-university" style="margin-right: 0.7em"></i> Institutions</a> </li>
                            <li> <a href="{{URL::to('/admin/participants/students/'.session('selected_term')['universitas_term_id'])}}"><i class="fa fa-graduation-cap" style="margin-right: 0.7em"></i> Students</a> </li>
                        </ul>
                    </li>
                @endif
                @if(isset(session('selected_term')['sma_term_id']))
                    <li class="nav-small-cap m-t-10">--- SMA / SMK</li>
                    <li> <a href="{{URL::to('/admin/questions/'.session('selected_term')['sma_term_id'])}}" class="waves-effect"><i class="fa fa-file-text-o" style="margin-right: 0.7em"></i> <span class="hide-menu"> Question </span></a> </li>
                    <li> <a href="{{URL::to('/admin/participants')}}" class="waves-effect"><i class="fa fa-users" style="margin-right: 0.7em"></i> <span class="hide-menu"> Participants <span class="fa arrow"></span> <!--<span class="label label-rouded label-custom pull-right">4</span>--></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{URL::to('/admin/participants/institutions/'.session('selected_term')['sma_term_id'])}}"><i class="fa fa-university" style="margin-right: 0.7em"></i> Institutions</a> </li>
                            <li> <a href="{{URL::to('/admin/participants/students/'.session('selected_term')['sma_term_id'])}}"><i class="fa fa-graduation-cap" style="margin-right: 0.7em"></i> Students</a> </li>
                        </ul>
                    </li>
                @endif
            @endif
            <!--<li class="nav-small-cap m-t-10">--- User</li>
            <li> <a href="{{URL::to('/admin/candidates')}}" class="waves-effect"><i class="fa fa-users" style="margin-right: 0.7em"></i> <span class="hide-menu"> Candidates </span></a> </li>
            <li> <a href="{{URL::to('/admin/employees')}}" class="waves-effect"><i class="fa fa-briefcase" style="margin-right: 0.7em"></i> <span class="hide-menu"> Employees </span></a> </li>
            <li> <a href="{{URL::to('/admin/contributors')}}" class="waves-effect"><i class="fa fa-suitcase" style="margin-right: 0.7em"></i> <span class="hide-menu"> Contributors </span></a> </li>
            <li> <a href="index.html" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right">4</span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="index.html">Candidates</a> </li>
                    <li> <a href="index2.html">Employees</a> </li>
                    <li> <a href="index3.html">Contributors</a> </li>
                </ul>
            </li>-->
            <li class="nav-small-cap">--- Others</li>
            <li> <a href="{{URL::to('/admin/logos')}}" class="waves-effect"><i class="fa fa-image" style="margin-right: 0.7em"></i> <span class="hide-menu"> Logos </span></a> </li>
            <li> <a href="{{URL::to('/admin/sponsors')}}" class="waves-effect"><i class="fa fa-briefcase" style="margin-right: 0.7em"></i> <span class="hide-menu"> Sponsors </span></a> </li>
            <li> <a href="{{URL::to('/admin/title')}}" class="waves-effect"><i class="fa fa-pencil-square-o" style="margin-right: 0.7em"></i> <span class="hide-menu"> Title </span></a> </li>
            <li> <a href="{{URL::to('/admin/rule')}}" class="waves-effect"><i class="fa fa-exclamation-circle" style="margin-right: 0.7em"></i> <span class="hide-menu"> Rule </span></a> </li>
            <li class="nav-small-cap">--- Support</li>
            <!--<li><a href="documentation.html" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Documentation</span></a></li>
            <li><a href="gallery.html" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span class="hide-menu">Gallery</span></a></li>
            <li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li>-->
            <li><a href="{{URL::to('/admin/logout')}}" class="waves-effect"><i class="fa fa-sign-out"></i> <span class="hide-menu">Log out</span></a></li>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->
