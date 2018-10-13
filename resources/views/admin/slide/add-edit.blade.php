@extends('layout.admin.master')
@section('css')
<!-- animation CSS -->
<link href="{{URL::to('assets/admin/css/animate.css')}}" rel="stylesheet">
<!-- Menu CSS -->
<link href="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{URL::to('assets/admin/bower_components/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('js')
<script src="{{URL::to('assets/admin/js/jasny-bootstrap.js')}}"></script>

<script src="{{URL::to('assets/admin/bower_components/jquery/dist/jquery-ui.js')}}"></script>
<!-- jQuery file upload -->
<script src="{{URL::to('assets/admin/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
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
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Sponsor</h4> </div>
            </div>
            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"  style="font-size: 1.5em"> Sponsor Form</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="@if(!empty((array)$slide)) {{ URL::to('admin/slide/edit/'.$slide->id) }} @else {{ URL::to('admin/slide/add') }} @endif" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="box-title m-t-10">General</h3>
                                                <hr class="m-t-0 m-b-20">
                                                <div class="row">
                                                    <div class="col-md-12 form-group <?php if($errors->has('image')) echo "has-error"; ?>">
                                                        <h3 class="box-title">Sponsor Image</h3>
                                                        <label for="input-file-disable-remove">You can drag and drop a file here or click it</label>
                                                        <input type="file" name="image" id="input-file-disable-remove" class="dropify" data-show-remove="false" data-default-file="@if(!empty((array)$slide)){{URL::to($slide->image)}}@else{{old('image')}}@endif"/>
                                                          <span class="help-block">@if($errors->has('image')) {{ $errors->first('image') }} @endif</span>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-12 form-group <?php if($errors->has('title')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Title</label>
                                                        <div class="col-md-9">
                                                          <input type="text" class="form-control" name="title" placeholder="Title" value="@if(!empty((array)$slide)){{$slide->title}}@else{{old('title')}}@endif">
                                                            <span class="help-block"> @if($errors->has('title')) {{ $errors->first('title') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-12 form-group <?php if($errors->has('description')) echo "has-error"; ?>">
                                                        <label class="control-label col-md-3">Description</label>
                                                        <div class="col-md-9">
                                                          <textarea rows="3" class="form-control" name="description" placeholder="Description">@if(!empty((array)$slide)){{$slide->description}}@else{{old('description')}}@endif</textarea>
                                                            <span class="help-block"> @if($errors->has('description')) {{ $errors->first('description') }} @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="@if(!empty((array)$slide)){{'edit_slide_admin'}}@else{{'add_slide_admin'}}@endif"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::to('admin/slides')}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
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
