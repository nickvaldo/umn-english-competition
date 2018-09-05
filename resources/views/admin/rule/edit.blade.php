@extends('layout.admin.master')
@section('css')
<!-- animation CSS -->
<link href="{{URL::to('assets/admin/css/animate.css')}}" rel="stylesheet">
<!-- Menu CSS -->
<link href="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{URL::to('assets/admin/bower_components/html5-editor/bootstrap-wysihtml5.css')}}" />
@endsection
@section('js')
<script src="{{URL::to('assets/admin/js/jasny-bootstrap.js')}}"></script>

<script src="{{URL::to('assets/admin/bower_components/jquery/dist/jquery-ui.js')}}"></script>
<!-- wysuhtml5 Plugin JavaScript -->
<script src="{{URL::to('assets/admin/bower_components/tinymce/tinymce.min.js')}}"></script>
<script>
    $(document).ready(function() {
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
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
            <div class="row bg-rule">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-rule">Rule</h4> </div>
            </div>
            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"  style="font-size: 1.5em"> Rule Form</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="@if(!empty((array)$rule)) {{ URL::to('admin/rule/edit/'.$rule->id) }}@endif" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="box-rule m-t-10">General</h3>
                                                <hr class="m-t-0 m-b-20">
                                                <div class="row">
                                                    <div class="col-md-12 form-group <?php if($errors->has('title')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Title</label>
                                                        <div class="col-md-9">
                                                          <input type="text" class="form-control" name="title" placeholder="Title" value="@if(!empty((array)$rule)){{$rule->title}}@else{{old('title')}}@endif">
                                                            <span class="help-block"> @if($errors->has('title')) {{ $errors->first('title') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-12 form-group <?php if($errors->has('description')) echo "has-error"; ?>">
                                                        <textarea id="mymce" name="description" placeholder="Enter your Rule here...">@if(!empty((array)$rule)){{$rule->description}}@else{{old('description')}}@endif</textarea>
                                                          <span class="help-block"> @if($errors->has('description')) {{ $errors->first('description') }} @endif</span>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-rule m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="@if(!empty((array)$rule)){{'edit_rule_admin'}}@endif"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::to('admin/rule')}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
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
