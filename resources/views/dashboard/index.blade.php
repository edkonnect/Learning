<?php

use App\Models\LessonPlanDetails;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/animate-css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist-plugin-tooltip.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-modern.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/intro.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard.css')}}">
@endsection
<?php
//use App\Models\LessonPlanDetails;
//echo '<pre>';
//print_r($val->getHWAttachmentDetail);
//die;
?>
@section('content')
<div class="section">
    @if(Auth::user()->roles==3)
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="row">
                    <div class="card-action">
                        <div class="col m6 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">Dashboard</h5></div>
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
                                <select class="select2 browser-default" id="course" required="1" onchange="return getDashboardData(this.value);">
                                    <option value="">Select Course</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboardData">
            <!-- Current balance & total transactions cards-->
            <div id="card-stats" class="pt-0">
                <div class="row">
                    <div class="col s12 m6 l4">
                        <div id="weekly-earning" class="card animate fadeUp" style="height: 310px;">
                            <div class="card-content">
                                <p class="mb-0 mt-0 display-flex justify-content-between" style="font-weight: bold; font-size: 16px;">Proficiency Level</p>
                                <div class="current-balance-container">
                                    <div id="proficiency-donut-chart" class="current-balance-shadow"></div>
                                </div>
                                <p class="medium-small center-align" id="proficiencyLevel" data-id='{{isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:''}}'>Proficiency Level - {{isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content cyan white-text" >
                                <p class="card-stats-title"> Assessment Test Taken</p>
                                <h4 class="card-stats-number white-text">{{isset($studentAnalytics->assessmentTaken)?$studentAnalytics->assessmentTaken:''}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content red accent-2 white-text" >
                                <p class="card-stats-title">No.of hours remaining in the course </p>
                                <h4 class="card-stats-number white-text">{{isset($studentAnalytics->no_of_hours_remaining)?$studentAnalytics->no_of_hours_remaining:''}}</h4>
                            </div>

                        </div>
                    </div>

                    <?php
                    $participantCateg = '';
                    if (isset($studentAnalytics->participation_rate)) {
                        if ($studentAnalytics->participation_rate == '1') {
                            $participantCateg = 'Low';
                        }
                        if ($studentAnalytics->participation_rate == '2') {
                            $participantCateg = 'Average';
                        }
                        if ($studentAnalytics->participation_rate == '3') {
                            $participantCateg = 'Perfect';
                        }
                    }
                    ?>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeRight">
                            <div class="card-content green lighten-1 white-text" >
                                <p class="card-stats-title"> Participation Rate</p>
                                <h4 class="card-stats-number white-text">{{$participantCateg}}</h4>
                            </div>

                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeRight">
                            <div class="card-content orange lighten-1 white-text" >
                                <p class="card-stats-title"> New Skills Acquired</p>
                                <h4 class="card-stats-number white-text">{{isset($studentAnalytics->newSkills)?$studentAnalytics->newSkills:''}}</h4>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--/ Current balance & appointment cards-->
            @if(isset($studentSessionPerformance) && count($studentSessionPerformance) > 0)
            <div class="row">
                <div class="col s12 m12 20">
                    <div class="card subscriber-list-card animate fadeRight">
                        <div class="card-content pb-1">
                            <h4 class="header mt-0" style="font-weight: bold;color: black;font-size: 22px;">Session Performance Details</h4>
                        </div>
                        <table class="subscription-table responsive-table highlight">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Course</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Session</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Session Attendance</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;">Performance Level</th>
                                    <th style="font-weight: bold;color: black;font-size: larger;text-align: center;">Tutor Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentSessionPerformance as $studentSessionPerformanceKey =>$studentSessionPerformanceVal)
                                <tr>
                                    <td>{{isset($studentSessionPerformanceVal->getCourseDetail->course_name)?$studentSessionPerformanceVal->getCourseDetail->course_name:''}}</td>
                                    <td>{{isset($studentSessionPerformanceVal->getSessionDetail->topic_name)?strtoupper($studentSessionPerformanceVal->getSessionDetail->topic_name):''}}</td>
                                    <td>{{isset($studentSessionPerformanceVal->session_attendance)?$studentSessionPerformanceVal->session_attendance:''}}</td>
                                    <td>{{isset($studentSessionPerformanceVal->performance_level)?$studentSessionPerformanceVal->performance_level:''}}</td>
                                    <!--<td>{{isset($studentSessionPerformanceVal->tutor_comments)?$studentSessionPerformanceVal->tutor_comments:''}}</td>-->
                                    <td style="text-align: center;">
                                        <a href="javascript:void(0)" class="showTutorNotes" at="{{$studentSessionPerformanceVal->id}}"><i class="material-icons">remove_red_eye</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
    @else
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="row">
                    <div class="card-action">
                        <div class="col m6 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">DASHBOARD</h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('pages.intro')
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
                                    $('#dashboardData').css('display', 'none');
                                    $.ajax({
                                    type: "post",
                                            url: '{{url("/")}}' + '/session-notes/getCourse',
                                            data: {'stud_id': val, '_token': '{{ csrf_token() }}'},
                                            success: function (data) {
                                            $('#course').html(data);
                                            }
                                    });
                                    }
                                    $('.showTutorNotes').click(function () {
                                    var inputVal = $(this).attr("at");
                                    $.ajax({
                                    data:{'inputVal':inputVal, '_token': '{{ csrf_token() }}'},
                                            type: "post",
                                            url: '{{url("/")}}' + '/dashboard/getTutorNotes',
                                            success: function (data) {
//                                                swal({
//                                                title: data,
//                                                });

                                            swal("Tutor Comments", data);
                                            }
                                    });
                                    });
                                    function getDashboardData() {
                                    var studentID = $("#student").val();
                                    var course = $("#course").val();
                                    $.ajax({
                                    data:{'studentID':studentID, 'course':course, '_token': '{{ csrf_token() }}'},
                                            type: "post",
                                            url: '{{url("/")}}' + '/dashboard/getDashboardData',
                                            success: function (data) {
                                            $('#dashboardData').css('display', 'block');
                                            $('#dashboardData').html(data);
                                            }
                                    });
                                    }
</script>

@include('pages.intro')
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
<script src="{{asset('vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
@endsection


{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/form-select2.js')}}"></script>
<script src="{{asset('js/scripts/dashboard-modern.js')}}"></script>
<script src="{{asset('js/scripts/intro.js')}}"></script>
<script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/scripts/dashboard-analytics.js')}}"></script>
@endsection
