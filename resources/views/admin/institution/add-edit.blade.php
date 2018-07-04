@extends('layout.admin.master')
@section('css')
<!-- animation CSS -->
<link href="{{URL::to('assets/admin/css/animate.css')}}" rel="stylesheet">
<!-- Menu CSS -->
<link href="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                    <h4 class="page-title">Institution</h4> </div>
            </div>
            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"  style="font-size: 1.5em"> Institution Form</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="@if(!empty((array)$institution)) {{ URL::to('admin/participants/institution/'.$term_id.'/edit/'.$institution->id) }} @else {{ URL::to('admin/participants/institution/'.$term_id.'/add') }} @endif" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                          <div class="col-md-6">
                                              <h3 class="box-title m-t-10">Educational Stage</h3>
                                              <hr class="m-t-0 m-b-20">
                                              <div class="form-group <?php if($errors->has('educational_stage')) echo "has-error"; ?>">
                                                  <div class="checkbox checkbox-success">
                                                      <input id="{{ $educational_stage->id }}" name="educational_stage" value="{{ $educational_stage->id }}" type="checkbox" checked disabled>
                                                      <label for="{{ $educational_stage->id }}"> {{ $educational_stage->educational_stage }} </label>
                                                  </div>
                                              </div>
                                              <input type="hidden" name="educational_stage" value="{{ $educational_stage->id }}">
                                              <!--/span-->
                                              <span class="help-block" style="color:#a94442"> @if($errors->has('educational_stage')) {{ $errors->first('educational_stage') }} @endif</span>
                                          </div>
                                          <div class="col-md-6">
                                              <h3 class="box-title m-t-10">Term</h3>
                                              <hr class="m-t-0 m-b-20">
                                              <div class="form-group <?php if($errors->has('term')) echo "has-error"; ?>">
                                                  <div class="checkbox checkbox-success">
                                                      <input id="{{ $term->term_id }}" name="term" value="{{ $term->term_id }}" type="checkbox" checked disabled>
                                                      <label for="{{ $term->term_id }}"> {{ $term->term }} </label>
                                                  </div>
                                              </div>
                                              <input type="hidden" name="term" value="{{ $term->term_id }}">
                                              <!--/span-->
                                              <span class="help-block" style="color:#a94442"> @if($errors->has('educational_stage')) {{ $errors->first('educational_stage') }} @endif</span>
                                          </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="box-title m-t-10">Account Info</h3>
                                                <hr class="m-t-0 m-b-20">

                                                <div class="row">
                                                    <div class="col-md-6 form-group <?php if($errors->has('username')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-12">Username</label>
                                                        <div class="col-md-12">
                                                          <input type="text" class="form-control" name="username" placeholder="Username" value="@if(!empty((array)$institution)){{$institution->username}}@else{{old('username')}}@endif">
                                                            <span class="help-block"> @if($errors->has('username')) {{ $errors->first('username') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('password')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-12">Password</label>
                                                        <div class="col-md-12">
                                                          <input type="password" class="form-control" name="password" placeholder="Password">
                                                            <span class="help-block"> @if($errors->has('password')) {{ $errors->first('password') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="box-title m-t-10">General</h3>
                                                <hr class="m-t-0 m-b-20">

                                                <div class="form-group <?php if($errors->has('team_name')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Team Name</label>
                                                    <div class="col-md-9">
                                                      <input type="text" class="form-control" name="team_name" placeholder="Team Name" value="@if(!empty((array)$institution)){{$institution->team_name}}@else{{old('team_name')}}@endif">
                                                        <span class="help-block"> @if($errors->has('team_name')) {{ $errors->first('team_name') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('institution_name')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Institution Name</label>
                                                    <div class="col-md-9">
                                                      <input type="text" class="form-control" name="institution_name" placeholder="Institution Name" value="@if(!empty((array)$institution)){{$institution->institution_name}}@else{{old('institution_name')}}@endif">
                                                        <span class="help-block"> @if($errors->has('institution_name')) {{ $errors->first('institution_name') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('institution_address')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Institution Address</label>
                                                    <div class="col-md-9">
                                                      <textarea rows="5" class="form-control" name="institution_address" placeholder="Institution Address">@if(!empty((array)$institution)){{$institution->institution_address}}@else{{old('institution_address')}}@endif</textarea>
                                                        <span class="help-block"> @if($errors->has('institution_address')) {{ $errors->first('institution_address') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('points')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Points</label>
                                                    <div class="col-md-9">
                                                      <input type="text" class="form-control" name="points" placeholder="Points" value="@if(!empty((array)$institution)){{$institution->points}}@else{{old('points')}}@endif">
                                                        <span class="help-block"> @if($errors->has('points')) {{ $errors->first('points') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="@if(!empty((array)$institution)){{'edit_institution_admin'}}@else{{'add_institution_admin'}}@endif"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::to('admin/participants/institutions/'.$term_id)}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
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
