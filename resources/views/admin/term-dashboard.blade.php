@extends('layout.admin.master')
@section('css')
<!-- Menu CSS -->
<link href="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
@endsection
@section('dashboard_js')
<!--Counter js -->
<script src="{{URL::to('assets/admin/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
<script src="{{URL::to('assets/admin/bower_components/counterup/jquery.counterup.min.js')}}"></script>
@endsection
@section('js')
<script type="text/javascript">
  // This is for Counter
  $(".counter").counterUp({
          delay: 100,
          time: 1200
      });
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h4 class="page-title">
                        <a href="{{URL::to('admin/index')}}" style="font-size:1.5rem; margin-right:1.0rem"><i data-toggle="tooltip" data-original-title="Back to Terms Page" class="icon-arrow-left ti-menu"></i></a>
                        Accounting Week {{ $term->period_year }}
                    </h4>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{URL::to('admin/index')}}">Terms</a></li>
                        <li class="active">Accounting Week {{ $term->period_year }}</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
