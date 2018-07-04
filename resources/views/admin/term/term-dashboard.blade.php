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
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Universitas Questions</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fa fa-file-text-o text-info"></i></li>
                            <li class="text-right"><span class="counter text-info">{{ $universitas_questions_count }}<span style="font-size:2.0rem; margin-left:1.0rem">Question(s)</span></span> </li>
                        </ul>
                        <a href="{{URL::to('/admin/questions/'.session('selected_term')['universitas_term_id'])}}">View All Questions</a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">SMA/SMK Questions</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fa fa-file-text-o text-danger"></i></li>
                              <li class="text-right"><span class="counter text-danger">{{ $sma_questions_count }}<span style="font-size:2.0rem; margin-left:1.0rem">Question(s)</span></span> </li>
                        </ul>
                        <a href="{{URL::to('/admin/questions/'.session('selected_term')['sma_term_id'])}}">View All Questions</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Universitas -->
                <div class="col-md-12 col-lg-6 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title"> Universitas </h3>
                        <div class="row sales-report">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h2>Participants</h2>
                                <p>Accounting Week 2017</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 ">
                                <h1 class="text-right text-success m-t-20">{{ $universitas_participants_count }}<span style="font-size:2.0rem; margin-left:1.0rem">Participant(s)</span></h1></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Registration Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($counter = 0)
                                    @foreach($universitas_participants as $index => $universitas_participant)
                                        <tr>
                                            <td>{{ ++$counter }}</td>
                                            <td class="txt-oflo">{{ $universitas_participant->institution_name }}</td>
                                            <td class="txt-oflo">{{ $universitas_participant->team_name }}</td>
                                            <!--<td><span class="label label-success label-rouded">{{ $universitas_participant->team_name }}</span> </td>-->
                                            <td class="txt-oflo">{{ date_format(date_create($universitas_participant->created_at),"D, d M Y") }}</td>
                                            <!--<td><span class="text-success">$24</span></td>-->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <a href="{{URL::to('/admin/participants/institutions/'.session('selected_term')['universitas_term_id'])}}">View All Institutions</a>
                        </div>
                    </div>
                </div>
                <!-- SMA/SMK -->
                <div class="col-md-12 col-lg-6 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title"> SMA/SMK </h3>
                        <div class="row sales-report">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h2>Participants</h2>
                                <p>Accounting Week 2017</p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 ">
                                <h1 class="text-right text-purple m-t-20">{{ $sma_participants_count }}<span style="font-size:2.0rem; margin-left:1.0rem">Participant(s)</span></h1></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Registration Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($counter = 0)
                                    @foreach($sma_participants as $index => $sma_participant)
                                        <tr>
                                            <td>{{ ++$counter }}</td>
                                            <td class="txt-oflo">{{ $sma_participant->institution_name }}</td>
                                            <td class="txt-oflo">{{ $sma_participant->team_name }}</td>
                                            <!--<td><span class="label label-success label-rouded">{{ $sma_participant->team_name }}</span> </td>-->
                                            <td class="txt-oflo">{{ date_format(date_create($sma_participant->created_at),"D, d M Y") }}</td>
                                            <!--<td><span class="text-success">$24</span></td>-->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <a href="{{URL::to('/admin/participants/institutions/'.session('selected_term')['sma_term_id'])}}">View All Institutions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
