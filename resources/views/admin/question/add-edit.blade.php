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
                    <h4 class="page-title">Question</h4> </div>
            </div>
            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"  style="font-size: 1.5em"> Question Form</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <form action="@if(!empty((array)$question)) {{ URL::to('admin/question/'.$term_id.'/edit/'.$question->id) }} @else {{ URL::to('admin/question/'.$term_id.'/add') }} @endif" method="POST">
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
                                                <h3 class="box-title m-t-10">General</h3>
                                                <hr class="m-t-0 m-b-20">

                                                <div class="form-group <?php if($errors->has('question')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Question</label>
                                                    <div class="col-md-9">
                                                      <textarea rows="5" class="form-control" name="question" placeholder="Question">@if(!empty((array)$question)){{$question->question}}@else{{old('question')}}@endif</textarea>
                                                        <span class="help-block"> @if($errors->has('question')) {{ $errors->first('question') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('first_option')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">First Option</label>
                                                    <div class="col-md-9">
                                                      <textarea rows="5" class="form-control" name="first_option" placeholder="First Option">@if(!empty((array)$question)){{$question->first_option}}@else{{old('first_option')}}@endif</textarea>
                                                        <span class="help-block"> @if($errors->has('first_option')) {{ $errors->first('first_option') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('second_option')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Second Option</label>
                                                    <div class="col-md-9">
                                                      <textarea rows="5" class="form-control" name="second_option" placeholder="Second Option">@if(!empty((array)$question)){{$question->second_option}}@else{{old('second_option')}}@endif</textarea>
                                                        <span class="help-block"> @if($errors->has('second_option')) {{ $errors->first('second_option') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('third_option')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Third Option</label>
                                                    <div class="col-md-9">
                                                      <textarea rows="5" class="form-control" name="third_option" placeholder="Third Option">@if(!empty((array)$question)){{$question->third_option}}@else{{old('third_option')}}@endif</textarea>
                                                        <span class="help-block"> @if($errors->has('third_option')) {{ $errors->first('third_option') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('fourth_option')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Fourth Option</label>
                                                    <div class="col-md-9">
                                                      <textarea rows="5" class="form-control" name="fourth_option" placeholder="Forth Option">@if(!empty((array)$question)){{$question->fourth_option}}@else{{old('fourth_option')}}@endif</textarea>
                                                        <span class="help-block"> @if($errors->has('fourth_option')) {{ $errors->first('fourth_option') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="form-group <?php if($errors->has('answer')) echo "has-error"; ?>">
                                                    <label class="control-label col-md-3">Answer</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="answer" data-placeholder="Choose a Category" tabindex="1">
                                                            @foreach($answer_enum as $value)
                                                                @if(!empty((array)$question)) @php($compare = $question->answer) @else @php($compare = old('answer')) @endif
                                                                <option value="{{$value}}" @if(strcmp($value,$compare) == 0) {{ "selected" }} @endif>{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="help-block"> @if($errors->has('answer')) {{ $errors->first('answer') }} @endif</span>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title m-t-40"></h3>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="@if(!empty((array)$question)){{'edit_question_admin'}}@else{{'add_question_admin'}}@endif"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{URL::to('admin/questions/'.$term_id)}}" style="color:#686868"><button type="button" class="btn btn-default">Cancel</button></a>
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
