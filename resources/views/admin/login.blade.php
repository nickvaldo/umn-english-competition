@extends('layout.admin.master')
@section('content')
<section id="wrapper" class="login-register" style="background-color:#003D73!important">
    <div class="login-box" style="box-shadow: 0.0em 0.0em 0.3em 0.3em #00284C">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" action="{{URL::to('/admin/login')}}" method="POST">
                {{ csrf_field() }}
                <a href="javascript:void(0)" class="text-center db"><img src="{{URL::to('assets/upload/logo/Accounting Week Logo.jpg')}}" height="75.0em" alt="Accounting Week Logo" />
                    <br/><p class="text-muted">ENGLISH COMPETITION ADMINISTRATOR</p></a>
                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input class="form-control <?php if($errors->has('username') || session()->has('username')) echo "input-error"; ?> " type="text" name="username" required="" placeholder="Username" value="{{old('username')}}">
                        @if($errors->has('username'))
                            <p class="text-error">{{ $errors->first('username') }}</p>
                        @elseif(session()->has('username'))
                            <p class="text-error">{{ session('username') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control <?php if($errors->has('password') || session()->has('password')) echo "input-error"; ?>" type="password" name="password" required="" placeholder="Password">
                        @if($errors->has('password'))
                            <p class="text-error">{{ $errors->first('password') }}</p>
                        @elseif(session()->has('password'))
                            <p class="text-error">{{ session('password') }}</p>
                        @endif
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                </div>
                -->
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login_admin">Log In</button>
                    </div>
                </div>
                <!--
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social">
                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                        </div>
                    </div>
                </div>
                -->
                <!--
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="register2.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
                -->
            </form>
            <form class="form-horizontal" id="recoverform" action="index.html">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
