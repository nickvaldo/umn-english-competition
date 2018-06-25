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
                <div class="panel-heading" style="font-size: 1.5em"> Term</div>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="{{URL::to('/admin/term/add')}}" data-toggle="tooltip" data-original-title="Create New Term"><div class="white-box blue-box"><i class="fa fa-plus-circle"></i></div></a>
                    <div class="white-box">
                        <h3 class="m-t-20 m-b-20">Want to create new term ?</h3>
                        <!--<p>Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>-->
                        <a href="{{URL::to('/admin/term/add')}}"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20" data-toggle="tooltip" data-original-title="Create New Term">Click Here to Create New</button></a>
                    </div>
                </div>
                @foreach ($terms as $index => $term)
                    @php($educational_stages = explode(', ', $term->educational_stage))
                    <div class="col-lg-3 col-md-6">
                        <a href="{{URL::to('/admin/term/'.$term->period_id)}}" data-toggle="tooltip" data-original-title="Show This Term"><div class="white-box blue-box">{{ $term->period_year }}</div></a>
                        <div class="white-box">
                            <h3 class="m-t-20 m-b-20">Accounting Week {{ $term->period_year }}</h3>
                            <p>
                                @php($last  = array_slice($educational_stages, -1))
                                @php($first = join(', ', array_slice($educational_stages, 0, -1)))
                                @php($both  = array_filter(array_merge(array($first), $last), 'strlen'))
                                {{ join(' & ', $both) }}
                                English Competition
                            </p>
                            <div class="row">
                                <div class="col-sm-6"><a href="{{URL::to('/admin/term/'.$term->period_id)}}"><button type="button" class="btn btn-info waves-effect waves-light m-t-20" data-toggle="tooltip" data-original-title="Show This Term" style="font-size: 1.5em; border-radius: 0.5em;"><i class="ti-eye" aria-hidden="true"></i></button></a></div>
                                <div class="col-sm-6"><a href="{{URL::to('/admin/term/edit/'.$term->period_id)}}"><button type="button" class="btn btn-success waves-effect waves-light m-t-20" data-toggle="tooltip" data-original-title="Edit This Term" style="font-size: 1.5em; border-radius: 0.5em;"><i class="ti-marker-alt" aria-hidden="true"></i></button></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
