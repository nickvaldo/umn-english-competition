@extends('layout.admin.master')
@section('css')
<!-- animation CSS -->
<link href="{{URL::to('assets/admin/css/animate.css')}}" rel="stylesheet">
<!-- Menu CSS -->
<link href="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
.panel .panel-body h3{
    font-weight: 600;
    font-family: Poppins,sans-serif;
    font-size: 14px;
    text-transform: uppercase;
}
</style>
@endsection
@section('js')
<script src="{{URL::to('assets/admin/js/jasny-bootstrap.js')}}"></script>

<script src="{{URL::to('assets/admin/bower_components/jquery/dist/jquery-ui.js')}}"></script>
<script></script>
@endsection
@section('content')
<div id="wrapper">
    @include('template.admin.navbar')
    @include('template.admin.sidebar')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Account Setting</h4> </div>
            </div>
            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"  style="font-size: 1.5em"> Account Form</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="{{ URL::to('admin/account_setting') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="box-title m-t-10">Account Info</h3>
                                                <hr class="m-t-0 m-b-20">

                                                <div class="row">
                                                    <div class="col-md-6 form-group <?php if($errors->has('username')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-12">Username</label>
                                                        <div class="col-md-12">
                                                          <input type="text" class="form-control" name="username" placeholder="Username" value="{{$admin->username}}">
                                                            <span class="help-block"> @if($errors->has('username')) {{ $errors->first('username') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('email')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-12">Email</label>
                                                        <div class="col-md-12">
                                                          <input type="email" class="form-control" name="email" placeholder="Email" value="{{$admin->email}}">
                                                            <span class="help-block"> @if($errors->has('email')) {{ $errors->first('email') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group <?php if($errors->has('first_name')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-12">First Name</label>
                                                        <div class="col-md-12">
                                                          <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$admin->first_name}}">
                                                            <span class="help-block"> @if($errors->has('first_name')) {{ $errors->first('first_name') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('middle_name')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-12">Middle Name</label>
                                                        <div class="col-md-12">
                                                          <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{$admin->middle_name}}">
                                                            <span class="help-block"> @if($errors->has('middle_name')) {{ $errors->first('middle_name') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group <?php if($errors->has('last_name')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-12">Last Name</label>
                                                        <div class="col-md-12">
                                                          <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$admin->last_name}}">
                                                            <span class="help-block"> @if($errors->has('last_name')) {{ $errors->first('last_name') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="update_user_admin"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::previous()}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-body">
                                <form action="{{ URL::to('admin/account_setting') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="box-title m-t-10">Account Password</h3>
                                                <hr class="m-t-0 m-b-20">

                                                <div class="col-md-12 form-group <?php if($errors->has('current_password')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-12">Current Password</label>
                                                    <div class="col-md-12">
                                                        <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                                                        @if($errors->has('current_password'))
                                                            <span class="help-block" style="color:red">{{ $errors->first('current_password') }}</span>
                                                        @elseif(session()->has('current_password'))
                                                            <span class="help-block" style="color:red">{{ session('current_password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-12 form-group <?php if($errors->has('new_password')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-12">New Password</label>
                                                    <div class="col-md-12">
                                                        <input type="password" class="form-control" name="new_password" placeholder="New Password">
                                                        <span class="help-block" color="red"> @if($errors->has('new_password')) {{ $errors->first('new_password') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-12 form-group <?php if($errors->has('new_password_confirmation')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-12">Retype New Password</label>
                                                    <div class="col-md-12">
                                                        <input type="password" class="form-control" name="new_password_confirmation" placeholder="Retype New Password">
                                                        <span class="help-block" color="red"> @if($errors->has('new_password_confirmation')) {{ $errors->first('new_password_confirmation') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                    
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="update_password_admin"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::previous()}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--./row-->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection
