<?php

use App\Models\LessonPlanDetails;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Course Detail')

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
                                        color: #8b62b5;">Course Detail</h5></div>
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
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getLessonList(this.value);">
                                        <option value="">Select Course</option>  

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="sessionData">
                            @if(isset($getStudLessonData) && count($getStudLessonData) > 0)
                            <div class="row sessionNotesData">                            
                                <div class="col s12 m12 20 indexSessionData">
                                    <div class="card ">           
                                        <ul class="collapsible collapsible-accordion">
                                            @foreach($getStudLessonData as $key=>$val)  
                                            <li>
                                                <div class="collapsible-header">
                                                    <div class="row">             
                                                        <div class="col s12 m12 20">
                                                        <h5 style="font-weight: bold; font-size: 16px;">{{isset($val->getLessonPlan->topic_name)?strtoupper($val->getLessonPlan->topic_name):''}}</h5>
                                                        <p style="text-align: justify;font-size: 14px;">
                                                            {{isset($val->getLessonPlan->descr)?$val->getLessonPlan->descr:''}}
                                                        </p>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="collapsible-body">
                                                    @php $getSubtopic = LessonPlanDetails::where('lesson_id',$val->lesson_id)->get(); @endphp
                                                    @if (isset($getSubtopic) && count($getSubtopic) > 0)
                                                    @foreach ($getSubtopic as $getSubtopicKey => $getSubtopicVal)
                                                    <div class="row">                            
                                                        <div class="col s12 m12 20">
                                                            <div class="card ">
                                                                <div class="card-content">
                                                                    <h6 style="font-weight: bold;text-align: left;">Sub Topic-{{$getSubtopicKey+1}}</h6>
                                                                    <p style="text-align: justify;">
                                                                        {{isset($getSubtopicVal->description)?$getSubtopicVal->description:''}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <div class="card-content " style="text-align: center;">
                                                        <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                                            <div class=" card-content green-text">
                                                                <p>No Data Found</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card-content " style="text-align: center;">
                                <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                    <div class=" card-content green-text">
                                        <p>No Data Found</p>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                                        $('#sessionData').css('display', 'none');
                                        $.ajax({
                                        type: "post",
                                                url: '{{url("/")}}' + '/session-notes/getCourse',
                                                data: {'stud_id': val, '_token': '{{ csrf_token() }}'},
                                                success: function (data) {
                                                $('#course').html(data);
                                                }
                                        });
                                        }
                                        function getLessonList() {

                                        $('#sessionData').css('display', 'block');
                                        var studentID = $("#student").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        data:{'studentID':studentID, 'course':course, '_token': '{{ csrf_token() }}'},
                                                type: "post",
                                                url: '{{url("/")}}' + '/course-detail/getLessonList',
                                                success: function (data) {
                                                $('#sessionData').html(data);
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