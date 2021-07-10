<?php

use App\Models\Course;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','ASSIGN COURSE CURRICULUM')

@section('vendor-style')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}"><link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
@endsection
<?php
//use App\Models\LessonPlanDetails;
//echo '<pre>';
//print_r($val->getHWAttachmentDetail);
//die;
?>
{{-- page content --}}
@section('content')
<div class="section">
    <!-- Snow Editor start -->
    <section class="snow-editor">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="row">
                        <div class="card-action">
                            <div class="col m6 s12">
                                <div class="card-title ">
                                    <h5 style="font-weight: bold;
                                        color: #8b62b5;">ASSIGN CURRICULUM</h5></div>
                            </div>
                        </div>
                    </div>
                    <div id="sessionData">
                               @if (Session::has('success'))

                               <div class="card-alert card green lighten-5">
                                   <div class="card-content green-text">
                                       <p>SUCCESS : {{ Session::get('success') }}</p>
                                   </div>
                                   <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                   </button>
                               </div>
                               @endif
                               @if (Session::has('error'))

                               <div class="card-alert card red lighten-5">
                                   <div class="card-content red-text">
                                       <p>FAILED : {{ Session::get('error') }}</p>
                                   </div>
                                   <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                   </button>
                               </div>
                               @endif
                    <div class="card-content">
                      <form method="POST" action="{{ url('assign-curriculum/upload') }}" accept-charset="UTF-8"  >
                          {{ csrf_field() }}
                        <div class="row">
                            <div class="col m6 s12">
                                <h5>Student</h5>
                                <div class="input-field">
                                  <select class="select2 browser-default" id="student" name="student" required="1" onchange="return getCourse(this.value);">
                                                        <option value="">Select Student</option>

                                        @foreach($Students as $key=>$val)
                                        <option value="{{$key}}">{{strtoupper($val)}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m6 s12">
                                    <h5>Course</h5>
                                    <div class="input-field">
                                        <select class="select2 browser-default" id="course" name="course" required="1" onchange="return getCurriculum(this.value);">
                  <option value="">Select Course</option>


                                        </select>
                                    </div>
                                </div>


                      </div>
                        <div id = "assign">
                          <div class="row">
                              <div class="col m12 s12">
                                  <h5>Assign  Curriculum</h5>
                                  <div class="input-field">
                                      <select class="select2 browser-default" id='myselect' multiple name="lesson[]" required="1" >
                                        <option value="">------ SELECT LESSON ------</option>

                                        @foreach($lesson as $key=>$val)
                                        <option value="{{$key}}">{{strtoupper($val)}}</option>
                                        @endforeach


                                      </select>
                                  </div>
                              </div>
                           </div>
                                     <div class="row">
                                  <div class="col m6 s12">
                                      <h5>Start Date</h5>
                                      <div class="input-field">
                                          <input type="date" id="start_date" name ="start_date"></input>

                                      </div>
                                  </div>

                                      <div class="col m6 s12">
                                          <h5>End Date</h5>
                                          <div class="input-field">
                                              <input type="date"id="end_date" name ="end_date"></input>

                                          </div>
                                      </div>
                                    </div>


                          </div>
                <button type="submit" class="waves-effect waves-light btn" style="background-color: #736cb5;">Save</a>

        </form>
            </div>
        </div>
    </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            <script>
            function getCourse(val) {
              $(document).ready(function () {
              @if (isset($data))
                      var data = "<?php echo $data; ?>";
              $('#course').html(data);
              @endif
              });
            $.ajax({
            type: "post",
                    url: '{{url("/")}}' + '/session-notes/getCourse',
                    data: {'stud_id': val, '_token': '{{ csrf_token() }}'},
                    success: function (data) {
                    $('#course').html(data);
                    }
            });
            }
                                        $(document).ready(function () {
                                        @if (isset($data))
                                                var data = "<?php echo $data; ?>";
                                        $('#lesson').html(data);
                                        @endif
                                        });



                                   function getStudent(){
                                      var student = $("#student").val();

                                   }
                                   function getCurriculum() {

                                   var student = $("#student").val();
                                   var course = $("#course").val();
                                   $.ajax({
                                   data:{'student':student, 'course':course, '_token': '{{ csrf_token() }}'},
                                           type: "post",
                                           url: '{{url("/")}}' + '/assign-curriculum/get-curriculum',
                                           success: function (data) {
                                           $('#assign').html(data);
                                           }
                                   });
                                   }

                                   $('#myselect').select2({
                                      width: '100%',

    //placeholder: "Choose Lesson",
                                       theme: "classic",
                             allowClear: true

                            });

            </script>







              @endsection
              {{-- vendor script --}}
              @section('vendor-script')
              <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
              <script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
              <script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
              <script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>

              <script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
              @endsection

              {{-- page script --}}
              @section('page-script')
              <script src="{{asset('js/scripts/form-select2.js')}}"></script>
              <script src="{{asset('js/scripts/form-file-uploads.js')}}"></script>
              <script src="{{asset('js/scripts/data-tables.js')}}"></script>

              <script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
              <script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
              @endsection
