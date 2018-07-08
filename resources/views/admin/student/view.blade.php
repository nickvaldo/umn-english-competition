@extends('layout.admin.master')
@section('css')
<!-- Footable CSS -->
<link href="{{URL::to('assets/admin/bower_components/footable/css/footable.core.css')}}" rel="stylesheet">
<link href="{{URL::to('assets/admin/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<!-- Menu CSS -->
<link href="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<!--alerts CSS -->
<link href="{{URL::to('assets/admin/bower_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('dashboard_js')
<!-- Footable -->
<script src="{{URL::to('assets/admin/bower_components/footable/js/footable.all.min.js')}}"></script>
<script src="{{URL::to('assets/admin/bower_components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<!--FooTable init-->
<script src="{{URL::to('assets/admin/js/footable-init.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{URL::to('assets/admin/bower_components/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{URL::to('assets/admin/bower_components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
@endsection
@section('js')
<script type="text/javascript">
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
                        <a href="{{URL::to('admin/term/'.$term->period_id)}}" style="font-size:1.5rem; margin-right:1.0rem"><i data-toggle="tooltip" data-original-title="Back to Terms Page" class="icon-arrow-left ti-menu"></i></a>
                        Students for {{ $term->educational_stage }}
                    </h4>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{URL::to('admin/term/'.$term->period_id)}}">Accounting Week {{ $term->period_year }}</a></li>
                        <li class="active">Students</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <!--<label class="form-inline">Show
                            <select id="demo-show-entries" class="form-control input-sm">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select> entries </label>-->
                        <table id="demo-foo-addrow" class="table table-bordered toggle-circle table-hover" data-paging="true" data-page-size="10">
                            <thead>
                                <tr>
                                    <th data-toggle = "true"> Student Name </th>
                                    <th data-hide = "all"> Full Name </th>
                                    <th data-hide = "all"> Student Identity </th>
                                    <th data-hide = "phone"> Team Name </th>
                                    <th data-hide = "phone"> Institution Name </th>
                                    <th data-hide = "all"> Gender </th>
                                    <th data-hide = "all"> Birth Place & Date </th>
                                    <th data-hide = "all"> Student Address </th>
                                    <th data-hide = "all"> Created Since </th>
                                    <th data-hide = "all"> Updated At </th>
                                    <th data-sort-ignore="true" class="min-width"> Action </th>
                                </tr>
                            </thead>
                            <div class="form-inline padding-bottom-15">
                                <div class="row">
                                    <div class="col-sm-6 m-b-20">
                                        <div class="form-group">
                                            <a href="{{URL::to('/admin/participants/student/'.$term_id.'/add')}}">
                                                <button class="form-control btn btn-outline btn-primary btn-sm" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus" aria-hidden="true" style="margin-right:10px"></i>Add New Data</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right m-b-20">
                                        <div class="form-group">
                                            <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tbody>
                                 @foreach($students as $student)
                                    <tr>
                                        <td> @if(!empty($student->last_name)){{ $student->last_name.", " }}@endif {{ $student->first_name }}</td>
                                        <td>{{ $student->first_name }} @if(!empty($student->middle_name)){{ $student->middle_name }}@endif @if(!empty($student->last_name)){{ $student->last_name }}@endif </td>
                                        <td>{{ $student->identity_type." | No : ".$student->identity_number }}</td>
                                        <td>{{ $student->team_name }}</td>
                                        <td>{{ $student->institution_name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->birth_place.", ".date_format(date_create($student->birth_date),"d F Y") }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ date_format(date_create($student->created_at),"D, d M Y | h:i:s A") }}</td>
                                        <td>{{ date_format(date_create($student->updated_at),"D, d M Y | h:i:s A") }}</td>
                                        <td>
                                            <a href="{{URL::to('/admin/participants/student/'.$term_id.'/edit/'.$student->student_id)}}"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="Edit"><i class="ti-marker-alt" aria-hidden="true"></i></button></a>
                                            <a id="sa-warning-{{$student->student_id}}" style="color:#337ab7"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></a>
                                            <script>
                                                //Warning Message
                                                $('#sa-warning-{{$student->student_id}}').click(function(){
                                                    swal({
                                                        title: "Are you sure?",
                                                        text: "You will not be able to recover this imaginary file!",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#DD6B55",
                                                        confirmButtonText: "Yes, delete it!",
                                                        closeOnConfirm: false
                                                    }, function(){
                                                        /*swal({
                                                            title: "Deleted!",
                                                            text: "Your imaginary file has been deleted.",
                                                            type: "success"
                                                        }, function() {*/
                                                            window.location = "{{URL::to('/admin/participants/student/'.$term_id.'/delete/'.$student->student_id)}}";
                                                        /*});*/
                                                    });
                                                });
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="28">
                                        <div class="text-right">
                                            <ul class="pagination pagination-split m-t-30"> </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
