<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/animate-css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist-plugin-tooltip.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-modern.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/intro.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard.css')}}">


<div id="dashboardData">
    <div id="card-stats" class="pt-0">
                <div class="row">
                    <div class="col s12 m6 l4">
                        <div id="weekly-earning" class="card animate fadeUp" style="height: 310px;">
                            <div class="card-content">
                                <p class="mb-0 mt-0 display-flex justify-content-between" style="font-weight: bold; font-size: 16px;">Proficiency </p>
                                <div class="current-balance-container">
                                    <div id="proficiency-donut-chart" class="current-balance-shadow"></div>
                                </div>
                                <p class="medium-small center-align" id="proficiencyLevel" data-id='{{isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:''}}'>Proficiency  - {{isset($studentAnalytics->proficiency_level)?$studentAnalytics->proficiency_level:''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content cyan white-text" >
                                <p class="card-stats-title"> Assessment Taken</p>
                                <h4 class="card-stats-number white-text">{{isset($studentAnalytics->assessmentTaken)?$studentAnalytics->assessmentTaken:''}}</h4>
                            </div>

                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeLeft">
                            <div class="card-content red accent-2 white-text" >
                                <p class="card-stats-title">Hours Spent </p>
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
                                <p class="card-stats-title"> Participation</p>
                                <h4 class="card-stats-number white-text">{{$participantCateg}}</h4>
                            </div>

                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card animate fadeRight">
                            <div class="card-content orange lighten-1 white-text" >
                                <p class="card-stats-title"> New Skills </p>
                                <h4 class="card-stats-number white-text">{{isset($studentAnalytics->newSkills)?$studentAnalytics->newSkills:''}}</h4>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
    <!-- Current balance & total transactions cards-->

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
<script>
$('.showTutorNotes').click(function () {
    var inputVal = $(this).attr("at");
    $.ajax({
        data: {'inputVal': inputVal, '_token': '{{ csrf_token() }}'},
        type: "post",
        url: '{{url("/")}}' + '/dashboard/getTutorNotes',
        success: function (data) {
            swal("Tutor Comments", data);
        }
    });
});
</script>
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
<script src="{{asset('js/scripts/form-select2.js')}}"></script>
<script src="{{asset('js/scripts/dashboard-modern.js')}}"></script>
<script src="{{asset('js/scripts/intro.js')}}"></script>
<script src="{{asset('js/scripts/dashboard-analytics.js')}}"></script>
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
