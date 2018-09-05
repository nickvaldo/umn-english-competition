@extends('layout.admin.master')
@section('css')
<!-- Menu CSS -->
<link href="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<style>
  .white-box.blue-box{
    margin: 0 !important;
    padding: 0.0em !important;
    background-color: rgba(3, 169, 243, 0.5) !important;
    color: #fff;
    text-align: center;
    font-size: 7.0em;
    transition: font-size .5s ease-in-out;
    -webkit-transition: font-size .5s ease-in-out;
  }
  .blue-box:hover{
    font-size: 8.0em;
  }
  .white-box{
    padding: 1.0em !important;
    padding-bottom: 2.0em !important;
    text-align: center;
  }
  h3.m-t-20{
    margin: 0.1em !important;
    font-size: 1.2em;
  }
</style>
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
        <div class="container-fluid" style="padding-top: 2.0em">
            <div class="panel panel-info">
                <div class="panel-heading" style="font-size: 1.5em"> Rule</div>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="white-box">
                        <h3 class="m-t-20 m-b-20"><b>Your Current Rule is :</b></h3>
                        <h3 class="m-t-40 m-b-20"><b>{{ $rule->title }}</b></h3>
                        <h3 class="m-t-10 m-b-20" style="font-size: 1.6rem"><?php echo "$rule->description"; ?></h3>
                        <!--<p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>-->
                        <a href="{{URL::to('/admin/rule/edit/'.$rule->id)}}"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20" data-toggle="tooltip" data-original-title="Edit Rule">Click Here to Edit Current Rule</button></a>
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
