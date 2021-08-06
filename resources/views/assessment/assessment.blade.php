<?php

use App\Models\Course;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Assessment')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
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
                                        color: #8b62b5;">ASSESSMENT TEST</h5></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                      <div class="row">
                          <div class="col m6 s12">
                              <div class="input-field">
                                
                              </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col m6 s12">
                                <h5>Student</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="student" name="student" required="1" onchange="return getCourse(this.value);">
                                        @if(isset($getStudents))
                                        @foreach($getStudents as $key=>$val)
                                        <option value="{{$key}}">{{strtoupper($val)}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <h5>Course</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getAssessment(this.value);">
                                        <option value="">Select Course</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div  class="responsive-table" id ="Assessment">
                          @if(isset($getAssessment) && count($getAssessment) > 0)

                     <table  class="table invoice-data-table white border-radius-4 pt-1">

                       <tbody >

                       <tr>
                         <thead>
                           <th>Topic </th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Assessment</th>
                         </thead>

                       </tr>

                       <tbody id ="Assessment">
                            @foreach($getAssessment as $key=>$val)
                         <tr>
      <td>{{$val->topic_name}}</td>
      <td>{{Carbon\Carbon::parse($val->start_date)->format(' jS  F Y ')}}</td>
      <td>{{Carbon\Carbon::parse($val->end_date)->format(' jS  F Y ')}}</td>

      <td><a href="{{url('/assessment/test',['id'=>$val->id])}}"   target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Launch</a></td>
    </tr>@endforeach
                       </tbody>
                       @else
                              <div class="card-content " style="text-align: center;">
                                  <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                      <div class=" card-content green-text">
                                          <p>No Data Found</p>
                                      </div>
                                  </div>
                              </div>
                              @endif
                     </table>


                </div>

            </div>
        </div>
    </div>
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
            $(document).ready(function () {
            @if (isset($data))
                    var data = "<?php echo $data; ?>";
            $('#course').html(data);
            @endif
            });
            function getCourse(val) {
            $('#quizData').css('display', 'none');
            $.ajax({
            type: "post",
                    url: '{{url("/")}}' + '/session-notes/getCourse',
                    data: {'stud_id': val, '_token': '{{ csrf_token() }}'},
                    success: function (data) {
                    $('#course').html(data);
                    }
            });
            }
                                        function getAssessment() {

                                        var studentID = $("#student").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        data:{'studentID':studentID, 'course':course, '_token': '{{ csrf_token() }}'},
                                                type: "post",
                                                url: '{{url("/")}}' + '/assessment/assessments',
                                                success: function (data) {
                                                $('#Assessment').html(data);
                                                }
                                        });
                                        }
            </script>
            @endsection

            {{-- vendor script --}}
            @section('vendor-script')
            <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
            @endsection

            {{-- page script --}}
            @section('page-script')
            <script src="{{asset('js/scripts/form-select2.js')}}"></script>
            @endsection
