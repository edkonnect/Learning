{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Review Homework')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
@endsection
<?php
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
                                        color: #8b62b5;">Review Homework</h5></div>
                            </div>
                            <div class="col m3 float-right">
                                <?php $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All"); ?>
                                <select class="select2 browser-default" id="timePeriod" name="timePeriod" onchange="return getHomeworkList(this.value);">
                                    @if(isset($getStudents))
                                    <option value="">Select Time Period</option>  
                                    @foreach($getTimePeriod as $key=>$val)
                                    <option value="{{$key}}">{{strtoupper($val)}}</option>                                        
                                    @endforeach
                                    @endif
                                </select>
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
                                    <select class="select2 browser-default" id="course" required="1" onchange="return getHomeworkList(this.value);">
                                        <option value="">Select Course</option>  

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="sessionData">
                            @if(isset($getsessionData) && count($getsessionData) > 0)
                            <div class="row sessionNotesData">
                                @foreach($getsessionData as $key=>$val)                              
                                <div class="col s12 m12 20 indexSessionData">
                                    <div class="card ">
                                        <div class="card-title" style="text-align: center; padding: 10px">
                                            <h5 style="font-weight: bold;">{{isset($val->topic_name)?strtoupper($val->topic_name):''}}</h5>
                                        </div>



                                        <div class=" row">
                                            <div class=" col s12 m6 20">
                                                <div class=" card-action " style="text-align: left;font-size: 14px;">
                                                    <strong>Session Date : </strong> {{date('l jS \of F Y h:i:s A',strtotime($val->session_date))}}
                                                </div>
                                            </div>
                                            <div class=" col s12 m6 20">
                                                <div class=" card-action " style="text-align: right;font-size: 14px;">
                                                    <?php
                                                    $dateTime = new DateTime($val->session_date);
                                                    $dateTime->modify('+7 day');
                                                    ?>
                                                    <strong>Session Due date : </strong> {{($dateTime->format("l jS \of F Y h:i:s A"))?$dateTime->format("l jS \of F Y h:i:s A"):''}}
                                                </div>
                                            </div>
                                        </div>

                                        @if(count($val->getStudHWAttachmentDetail)>0)
                                        <div class="card-content">
                                            <div class=" row">
                                                @foreach($val->getStudHWAttachmentDetail as $keyAttach=>$valAttch)
                                                <div class=" col s12 m3">
                                                    <div class=" card-action" style="text-align: center">
                                                        Homework - {{$keyAttach+1}}<a href="{{url("/")}}/uploads/{{$val->getStudentDetail->username.'/'.$val->getTutorDetail->username.'/'.$valAttch->attachment_link}}" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Download</a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @else
                                        <div class="card-content " style="text-align: center;">
                                            <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
                                                <div class=" card-content green-text">
                                                    <p>No Homework Found</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>                                                           
                                @if($key % 2 != 0 )
                            </div>
                            <div class="row sessionNotesData">
                                @endif                              
                                @endforeach
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

                                                @if (isset($timePeriod))
                                                var timePeriodDrop = "<?php echo $timePeriod; ?>";
                                        $('#timePeriod').html(timePeriodDrop);
                                        @endif
                                        });
                                        function getCourse(val) {
                                        $.ajax({
                                        type: "post",
                                                url: '{{url("/")}}' + '/session-notes/tutor/getCourse',
                                                data: {'stud_id': val,'userID':'<?php echo Auth::user()->id; ?>', '_token': '{{ csrf_token() }}'},
                                                success: function (data) {
                                                $('#course').html(data);
                                                }
                                        });
                                        var studentID = $("#student").val();
                                        var timePeriod = $("#timePeriod").val();
                                        var course = 'pageLoad';
                                        if (timePeriod == ''){
                                        timePeriod = 'pageLoad';
                                        }
                                        $.ajax({
                                        type: "get",
                                                url: '{{url("/")}}' + '/tutor/getHomeworkAjaxView/' + studentID + '/' + course + '/' + timePeriod,
                                                success: function (data) {
                                                $('#sessionData').html(data);
                                                }
                                        });
                                        }
                                        function getHomeworkList() {
                                        var studentID = $("#student").val();
                                        var timePeriod = $("#timePeriod").val();
                                        var course = $("#course").val();
                                        if (course == ''){
                                        course = 'pageLoad';
                                        }
                                        if (timePeriod == ''){
                                        timePeriod = 'pageLoad';
                                        }
                                        $.ajax({
                                        type: "get",
                                                url: '{{url("/")}}' + '/tutor/getHomeworkAjaxView/' + studentID + '/' + course + '/' + timePeriod,
                                                success: function (data) {
                                                $('.indexSessionData').hide();
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