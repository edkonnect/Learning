<?php

use App\Models\LessonPlanDetails;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Quizlet')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
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
<style>
    .text-wrap{
        white-space:normal;
    }
    .width-200{
        width:200px;
    }

</style>
<div class="section">
    <!-- Snow Editor start -->
    <section class="snow-editor">
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
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="row">
                        <div class="card-action">
                            <div class="col m6 s12">
                                <div class="card-title ">
                                    <h5 style="font-weight: bold;
                                        color: #8b62b5;">Quizlet</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">

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
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getQuizesList(this.value);">
                                        <option value="">Select Course</option>  

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="section section-data-tables">
                            <div class="row">
                                <div class="col s12" id="quizData">
                                    <table id="page-length-option" class="display">
                                        <thead>
                                            <tr>
                                                <th>Grade</th>
                                                <!--<th>Lesson Plan</th>-->
                                                <!--<th>Course</th>-->
                                                <th>Description</th>
                                                <th data-orderable='false'>Quizlet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($getData) && count($getData) > 0)
                                            @foreach($getData as $getDataKey=>$getDataVal)
                                            <tr>
                                                <td>{{isset($getDataVal->grade)?$getDataVal->grade:''}}</td>
                                                <!--<td>{{isset($getDataVal->getLessonPlan->topic_name)?$getDataVal->getLessonPlan->topic_name:''}}</td>-->
                                                <!--<td>{{isset($getDataVal->getCourseDetail->course_name)?$getDataVal->getCourseDetail->course_name:''}}</td>-->
                                                <td style="text-align:justify;">{{isset($getDataVal->description)?$getDataVal->description:''}}</td>
                                                <td>
                                                    <!--<a href="javascript:void(0)" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">-->
                                                    <a href="{{url('/quizes/startQuiz',['id'=>$getDataVal->id])}}" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">
                                                        Start
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
                                        function getQuizesList() {
                                        var studentID = $("#student").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        data:{'studentID':studentID, 'course':course, '_token': '{{ csrf_token() }}'},
                                                type: "post",
                                                url: '{{url("/")}}' + '/quizes/getQuizesList',
                                                success: function (data) {                                                 
                                        $('#quizData').css('display', 'block');
                                                $('#quizData').html(data);
                                                }
                                        });
                                        }
            </script>
            @endsection

            {{-- vendor scripts --}}
            @section('vendor-script')
            <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
            <script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>
            @endsection


            {{-- page script --}}
            @section('page-script')
            <script src="{{asset('js/scripts/form-select2.js')}}"></script>
            <script src="{{asset('js/scripts/data-tables.js')}}"></script>
            @endsection