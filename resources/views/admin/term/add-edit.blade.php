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
<script>
  $( function() {
    var periods = [
      @foreach($periods as $period)
        "{{ $period->year }}",
      @endforeach
    ];
    $( "#period" ).autocomplete({
      source: periods
    });
  } );
  </script>
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
                    <h4 class="page-title">Term</h4> </div>
            </div>
            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"  style="font-size: 1.5em"> Term Form</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="@if(!empty((array)$term)) {{ URL::to('admin/term/edit/'.$term->period_id) }} @else {{ URL::to('admin/term/add') }} @endif" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="box-title m-t-10">Educational Stage</h3>
                                                <hr class="m-t-0 m-b-20">

                                                @foreach ($educational_stages as $index => $educational_stage)
                                                    <div class="form-group <?php if($errors->has('educational_stage')) echo "has-error"; ?>">
                                                        <div class="checkbox checkbox-success">
                                                            <input id="{{ $educational_stage->id }}" name="educational_stage[]" value="{{ $educational_stage->id }}" type="checkbox" checked disabled>
                                                            <label for="{{ $educational_stage->id }}"> {{ $educational_stage->educational_stage }} </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="educational_stage[]" value="{{ $educational_stage->id }}">
                                                    <!--/span-->
                                                @endforeach
                                                <span class="help-block" style="color:#a94442"> @if($errors->has('educational_stage')) {{ $errors->first('educational_stage') }} @endif</span>
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="box-title m-t-10">Period</h3>
                                                <hr class="m-t-0 m-b-30">

                                                <div class="form-group <?php if($errors->has('period')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Period</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="period" class="form-control" name="period" placeholder="Period" value="@if(!empty((array)$term)){{$term->period_year}}@else{{old('period')}}@endif" @if(!empty((array)$term)){{ "disabled" }}@endif>
                                                        <span class="help-block"> @if($errors->has('period')) {{ $errors->first('period') }} @endif</span>
                                                    </div>
                                                    @if(!empty((array)$term))
                                                        <input type="hidden" name="period" value="{{ $term->period_year }}">
                                                    @endif
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="box-title m-t-10">SMA/SMK</h3>
                                                <hr class="m-t-0 m-b-20">

                                                <div class="form-group <?php if($errors->has('sma_number_of_question')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Number of Question</label>
                                                    <div class="col-md-9">
                                                      <input type="number" class="form-control" name="sma_number_of_question" min="0" max="999" placeholder="Number of Question" value="@if(!empty((array)$sma)){{$sma->number_of_question}}@else{{old('sma_number_of_question')}}@endif">
                                                        <span class="help-block"> @if($errors->has('sma_number_of_question')) {{ $errors->first('sma_number_of_question') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('sma_login_time')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Login Time</label>
                                                    <div class="col-md-9">
                                                      <input type="datetime-local" class="form-control" name="sma_login_time" placeholder="Login Time" value="@if(!empty((array)$sma)){{date_format(date_create($sma->login_datetime),'Y-m-d\TH:i:s')}}@else{{old('sma_login_time')}}@endif">
                                                        <span class="help-block"> @if($errors->has('sma_login_time')) {{ $errors->first('sma_login_time') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('sma_test_time')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Test Time</label>
                                                    <div class="col-md-9">
                                                      <input type="datetime-local" class="form-control" name="sma_test_time" placeholder="Test Time" value="@if(!empty((array)$sma)){{date_format(date_create($sma->test_datetime),'Y-m-d\TH:i:s')}}@else{{old('sma_test_time')}}@endif">
                                                        <span class="help-block"> @if($errors->has('sma_test_time')) {{ $errors->first('sma_test_time') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('sma_test_duration')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Test Duration</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" name="sma_test_duration" min="1" max="24" placeholder="Duration" value="@if(!empty((array)$sma))@php($date1 = new DateTime($sma->test_datetime))@php($date2 = new DateTime($sma->tolerance_datetime)){{ $date2->diff($date1)->h }}@else{{old('sma_test_duration')}}@endif">
                                                            <span class="input-group-addon">Hour</span>
                                                        </div>
                                                        <span class="help-block"> @if($errors->has('sma_test_duration')) {{ $errors->first('sma_test_duration') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="box-title m-t-10">Universitas</h3>
                                                <hr class="m-t-0 m-b-20">

                                                <div class="form-group <?php if($errors->has('universitas_number_of_question')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Number of Question</label>
                                                    <div class="col-md-9">
                                                      <input type="number" class="form-control" name="universitas_number_of_question" min="0" max="999" placeholder="Number of Question" value="@if(!empty((array)$universitas)){{$universitas->number_of_question}}@else{{old('universitas_number_of_question')}}@endif">
                                                        <span class="help-block"> @if($errors->has('universitas_number_of_question')) {{ $errors->first('universitas_number_of_question') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('universitas_login_time')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Login Time</label>
                                                    <div class="col-md-9">
                                                      <input type="datetime-local" class="form-control" name="universitas_login_time" placeholder="Login Time" value="@if(!empty((array)$universitas)){{date_format(date_create($universitas->login_datetime),'Y-m-d\TH:i:s')}}@else{{old('universitas_login_time')}}@endif">
                                                        <span class="help-block"> @if($errors->has('universitas_login_time')) {{ $errors->first('universitas_login_time') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('universitas_test_time')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Test Time</label>
                                                    <div class="col-md-9">
                                                      <input type="datetime-local" class="form-control" name="universitas_test_time" placeholder="Test Time" value="@if(!empty((array)$universitas)){{date_format(date_create($universitas->test_datetime),'Y-m-d\TH:i:s')}}@else{{old('universitas_test_time')}}@endif">
                                                        <span class="help-block"> @if($errors->has('universitas_test_time')) {{ $errors->first('universitas_test_time') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('universitas_test_duration')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Test Duration</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" name="universitas_test_duration" min="1" max="24" placeholder="Duration" value="@if(!empty((array)$universitas))@php($date1 = new DateTime($universitas->test_datetime))@php($date2 = new DateTime($universitas->tolerance_datetime)){{ $date2->diff($date1)->h }}@else{{old('universitas_test_duration')}}@endif">
                                                            <span class="input-group-addon">Hour</span>
                                                        </div>
                                                        <span class="help-block"> @if($errors->has('universitas_test_duration')) {{ $errors->first('universitas_test_duration') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="@if(!empty((array)$term)){{'edit_term_admin'}}@else{{'add_term_admin'}}@endif"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::to('admin/index')}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
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
