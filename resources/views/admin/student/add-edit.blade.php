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
                    <h4 class="page-title">Student</h4> </div>
            </div>
            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"  style="font-size: 1.5em"> Student Form</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="@if(!empty((array)$student)) {{ URL::to('admin/participants/student/'.$term_id.'/edit/'.$student->id) }} @else {{ URL::to('admin/participants/student/'.$term_id.'/add') }} @endif" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                          <div class="col-md-6">
                                              <h3 class="box-title m-t-10">Team</h3>
                                              <hr class="m-t-0 m-b-20">
                                              <div class="form-group <?php if($errors->has('institution_id')) echo "has-error"; ?>">
                                                  <label class="control-label col-md-3">Team Name</label>
                                                  <div class="col-md-9">
                                                      <select class="form-control" name="institution_id" data-placeholder="Choose a Institution" tabindex="1">
                                                          @foreach($institutions as $institution)
                                                              @if(!empty((array)$student))
                                                                  @php($compare = $student->institution_id) @else @php($compare = old('institution_id')) @endif
                                                              <option value="{{$institution->institution_id}}" @if(strcmp($institution->institution_id,$compare) == 0) {{ "selected" }} @endif>{{$institution->team_name}}</option>
                                                          @endforeach
                                                      </select>
                                                      <span class="help-block"> @if($errors->has('institution_id')) {{ $errors->first('institution_id') }} @endif</span>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                              <span class="help-block" style="color:#a94442"> @if($errors->has('educational_stage')) {{ $errors->first('educational_stage') }} @endif</span>
                                          </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="box-title m-t-10">General</h3>
                                                <hr class="m-t-0 m-b-20">
                                                <div class="row">
                                                    <div class="col-md-6 form-group <?php if($errors->has('identity_type')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Identity Type</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="identity_type" data-placeholder="Choose a Identity Type" tabindex="1">
                                                                @foreach($identity_type_enum as $value)
                                                                    @if(!empty((array)$student)) @php($compare = $value) @else @php($compare = old('identity_type')) @endif
                                                                    <option value="{{$value}}" @if(!empty((array)$student)) @if(strcmp($student->identity_type,$compare) == 0) {{ "selected" }} @endif @endif>{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="help-block"> @if($errors->has('institution_id')) {{ $errors->first('identity_type') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('identity_number')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Identity Number</label>
                                                        <div class="col-md-9">
                                                          <input type="text" class="form-control" name="identity_number" placeholder="Identity Number" value="@if(!empty((array)$student)){{$student->identity_number}}@else{{old('identity_number')}}@endif">
                                                            <span class="help-block"> @if($errors->has('identity_number')) {{ $errors->first('identity_number') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('first_name')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">First Name</label>
                                                        <div class="col-md-9">
                                                          <input type="text" class="form-control" name="first_name" placeholder="First Name" value="@if(!empty((array)$student)){{$student->first_name}}@else{{old('first_name')}}@endif">
                                                            <span class="help-block"> @if($errors->has('first_name')) {{ $errors->first('first_name') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('middle_name')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Middle Name</label>
                                                        <div class="col-md-9">
                                                          <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="@if(!empty((array)$student)){{$student->middle_name}}@else{{old('middle_name')}}@endif">
                                                            <span class="help-block"> @if($errors->has('middle_name')) {{ $errors->first('middle_name') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('last_name')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Last Name</label>
                                                        <div class="col-md-9">
                                                          <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="@if(!empty((array)$student)){{$student->last_name}}@else{{old('last_name')}}@endif">
                                                            <span class="help-block"> @if($errors->has('last_name')) {{ $errors->first('last_name') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('gender')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Gender</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="gender" data-placeholder="Choose a Gender" tabindex="1">
                                                                @foreach($gender_enum as $value)
                                                                    @if(!empty((array)$student)) @php($compare = $value) @else @php($compare = old('gender')) @endif
                                                                    <option value="{{$value}}" @if(!empty((array)$student)) @if(strcmp($student->gender,$compare) == 0) {{ "selected" }} @endif @endif>{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="help-block"> @if($errors->has('gender')) {{ $errors->first('gender') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('birth_place')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Birth Place</label>
                                                        <div class="col-md-9">
                                                          <input type="text" class="form-control" name="birth_place" placeholder="Birth Place" value="@if(!empty((array)$student)){{$student->birth_place}}@else{{old('birth_place')}}@endif">
                                                            <span class="help-block"> @if($errors->has('birth_place')) {{ $errors->first('birth_place') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6 form-group <?php if($errors->has('birth_place')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Birth Date</label>
                                                        <div class="col-md-9">
                                                          <input type="date" class="form-control" name="birth_date" value="@if(!empty((array)$student)){{$student->birth_date}}@else{{old('birth_date')}}@endif">
                                                            <span class="help-block"> @if($errors->has('birth_place')) {{ $errors->first('birth_place') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="form-group <?php if($errors->has('address')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-12">Address</label>
                                                    <div class="col-md-12">
                                                      <textarea rows="5" class="form-control" name="address" placeholder="Address">@if(!empty((array)$student)){{$student->address}}@else{{old('address')}}@endif</textarea>
                                                        <span class="help-block"> @if($errors->has('address')) {{ $errors->first('address') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="@if(!empty((array)$student)){{'edit_student_admin'}}@else{{'add_student_admin'}}@endif"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::to('admin/participants/students/'.$term_id)}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
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
