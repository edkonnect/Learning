{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Session Notes')

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
//print_r($getStudents);
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
                                        color: #8b62b5;">View Session Notes</h5></div>
                            </div>
                            <div class="col m3 float-right">
                                <?php $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All"); ?>
                                <select class="select2 browser-default" id="timePeriod" name="timePeriod" onchange="return getSession(this.value);">
                                    @if(isset($getCourse))
                                    <option value="">Select Time </option>
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
                                <h5>Course</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" id="course" name="course" required="1" onchange="return getStudents(this.value);">
                                      <option value="">Select Course</option>

                                        @if(isset($getCourse))
                                        @foreach($getCourse as $key=>$val)
                                        <option value="{{$key}}">{{strtoupper($val)}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <h5>Student</h5>
                                <div class="input-field">
                                    <select class="select2 browser-default" name="student" id="student" required="1" onchange="return getSession(this.value);">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="input-field col m12 s12" >
                                    <label style="margin-left: 15px;">
                                        <input type="checkbox" id="checkbox"  />
                                        <span>Show All Student</span>
                                    </label>
                                </div>
                              </div>
                            </div>
                        <div id="sessionData">
                            @if(isset($getsessionData) && !empty($getsessionData))
                            <div class="row sessionNotesData" style="display: none;">
                                @foreach($getsessionData as $key=>$val)
                                <div class="col s12 m12 20 indexSessionData">
                                    <div class="card ">
                                        <div class="card-alert card " style="background-color: #8862b5;">
                                            <div class="row">
                                                <div class="col s12 m4 20">
                                                    <div class="card-action " style="text-align: left; color: white;font-size: 14px;">
                                                        {{'Session Date : '.date('l jS \of F Y h:i:s A',strtotime($val->session_date))}}
                                                    </div>
                                                </div>
                                                <div class="col s12 m4 20">
                                                    <div class="card-action " style="text-align: center; color: white;">
                                                        {{isset($val->demo) && $val->demo == 'Yes'?'Demo':''}}
                                                    </div>
                                                </div>

                                                <div class="col s12 m4 20">
                                                    <div class="card-action " style="text-align: right; color: white;">
                                                        <a style="color: white;" href="{{url("/")}}/Tutorprofile/Edkonnect/E/{{$val->getTutorDetail->name}}.pdf" target="_blank">{{isset($val->getTutorDetail->name)?ucfirst('Tutor : '.$val->getTutorDetail->name):''}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-title " style="text-align: center;">
                                            <h5 style="font-weight: bold;">{{isset($val->topic_name)?strtoupper($val->topic_name):''}}</h5>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <div class="card-action " style="text-align: center;">
                                                <h6 style="font-weight: bold;">Session Date - {{date('l jS \of F Y h:i:s A',strtotime($val->session_date))}}</h6>
                                            </div>
                                        </div>
                                        <div class="card-content " style="text-align: center;">
                                            <p style="text-align: justify;">
                                                <strong>Notes-</strong> {{isset($val->session_notes)?$val->session_notes:''}}
                                            </p>
                                             <?php
                $hw= '';
                if (isset($vals->homework)) {
                    if ($vals->homework != '') {
                        $hw = $vals->homework;
                    }

                }
                ?>
                <p style="text-align: center;"><a target="_blank" href="{{url($vals->homework)}}" class="waves-effect waves-light btn" style="background-color: #736cb5;    margin-top: 20px;">{{basename($hw)}}</a></p>
            </div>


                                        <!--                                        <div class="card-alert card " style="background-color: #8862b5;">
                                                                                    <div class="row">
                                                                                        <div class="col s12 m6 20">
                                                                                            <div class="card-action " style="text-align: left; color: white;">
                                                                                                {{isset($val->demo) && $val->demo == 'Yes'?'Demo':''}}
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col s12 m6 20">
                                                                                            <div class="card-action " style="text-align: right; color: white;">
                                        <?php
//                                                        $diffTime = Helper::time_elapsed_string($val->session_date);
////                                                print_r($diffTime); die;
//                                                        $diff = $diffTime['diff'];
//                                                        $time = $diffTime['time'];
                                        ?>
                                                                                                {{isset($diff)?$diff.' ':''}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>-->
                                    </div>
                                </div>
                                @if($key % 2 != 0 )
                            </div>
                            <div class="row sessionNotesData" style="display: none;">
                                @endif
                                @endforeach
                            </div>
                            <div class="row">
                                <p style="text-align: center;"><a href="#!" id="seeMore" class="waves-effect waves-light btn" style="background-color: #736cb5;">View More</a></p>
                            </div>
                            <div class=" card-alert card green lighten-5" id="noSession" style="display: none;margin: auto;width: 50%; text-align: center">
                                <div class=" card-content green-text">
                                    <p>No Sessions Found</p>
                                </div>
                            </div>
                            @endif
                        </div>


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
                                        $('#student').html(data);
                                        @endif
                                        @if (isset($timePeriod))
                                                var timePeriodDrop = "<?php echo $timePeriod; ?>";
                                        $('#timePeriod').html(timePeriodDrop);
                                        @endif

                                                var countData = "{{ count($getsessionData)}}";
                                        var timePeriod = $("#timePeriod").val();
                                        if (timePeriod == 6) {
                                        $(".sessionNotesData").slice(0, countData).show();
                                        } else {
                                        $(".sessionNotesData").slice(0, 1).show();
                                        }

                                        if (countData == 0){
                                        $("#noSession").css("display", 'block');
                                        }
                                        if ($(".sessionNotesData:hidden").length == 0) {
                                        $("#seeMore").css("display", 'none');
                                        }
                                        $("#seeMore").click(function (e) {
                                        e.preventDefault();
                                        $(".sessionNotesData:hidden").slice(0, countData).fadeIn("slow");
                                        if ($(".sessionNotesData:hidden").length == 0) {
                                        $("#seeMore").css("display", 'none');
                                        $("#noSession").css("display", 'none');
                                        }
                                        });
                                        });
                                        function getStudents(val) {

                                            $.ajax({
                                                type: "post",
                                                url: '{{url("/")}}' + '/tutor/getStudents',
                                                data: {'course_id': val, 'userID': '<?php echo Auth::user()->id; ?>', '_token': '{{ csrf_token() }}'},
                                                success: function (data) {
                                                    $('#student').html(data);
                                                }
                                            });

                                            $("#checkbox").click(function () {
                                              $.ajax({
                                                  type: "post",
                                                  url: '{{url("/")}}' + '/tutor/getAllStudents',
                                                  data: {'course_id': val, 'userID': '<?php echo Auth::user()->id; ?>', '_token': '{{ csrf_token() }}'},
                                                  success: function (data) {
                                                      $('#student').html(data);
                                                  }
                                              });
                                            });

                                        }
                                        function getSession() {
                                        var studentID = $("#student").val();
                                        var timePeriod = $("#timePeriod").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        type: "post",
                                                url: '{{url("/")}}' + '/session-notes/tutor/getSession',
                                                data: {'course_id': course,'userID':'<?php echo Auth::user()->id; ?>', 'studentID': studentID, 'timePeriod': timePeriod, '_token': '{{ csrf_token() }}'},
                                                success: function (data) {
                                                $('.indexSessionData').hide();
                                                $('#sessionData').html(data);
                                                }
                                        });
                                      


                                        }
                                        function getTimePeriodData(val) {
                                        var studentID = $("#student").val();
                                        var course = $("#course").val();
                                        $.ajax({
                                        type: "post",
                                                url: '{{url("/")}}' + '/session-notes/tutor/getTimePeriodData',
                                                data: {'timePeriod': val,'userID':'<?php echo Auth::user()->id; ?>', 'studentID': studentID, 'course': course, '_token': '{{ csrf_token() }}'},
                                                success: function (data) {
                                                console.log(data);
                                                $('#sessionNotesData').html(data);
                                                }
                                        });

                                        $("#checkbox").click(function () {
                                          $.ajax({
                                              type: "post",
                                              url: '{{url("/")}}' + '/tutor/getAllStudents',
                                              data: {'course_id': val, 'userID': '<?php echo Auth::user()->id; ?>', '_token': '{{ csrf_token() }}'},
                                              success: function (data) {
                                                  $('#student').html(data);
                                              }
                                          });
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
