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
                                    <h6 style="font-weight: bold;
                                        color: #8b62b5;">Upcoming Sessions</h6></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">

                        <div id="upcomingSessions">
                            @if(isset($content) && !empty($content) && count($content)>0)
                            <div class="row">                            
                                <div class="col s12 m12 20">
                                    <div class="card ">
                                        <!--            <div class="card-title " style="text-align: center; padding: 10px">
                                                        <h6 style="font-weight: bold;">Upcoming Sessions for Student : {{isset($content['0']->firstName) ? $content['0']->firstName.' '.$content['0']->lastName: ''}}</h6>
                                                    </div>-->
                                        <div class=" row">
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: left;">
                                                    <h6>Session Date</h6>
                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: center;">
                                                    <h6>Student Name</h6>
                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: right;">
                                                    <h6> Launch Session</h6>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($content as $keys=>$vals) 
                                        <?php
                                        $explodeURL = array();
                                        $meetingURL = '';
                                        if (isset($vals->location) && $vals->location != '') {
                                            $explodeURL = explode(' ', $vals->location);
                                            $meetingURL = isset($explodeURL) ? $explodeURL[1] : "";
                                        }

                                        //Timezone
                                        $finalTimezoneTime = $userDateTime = '';
                                        if ($vals->timezone != 'America/New_York') {
                                            date_default_timezone_set('America/New_York');
                                            $userDateTime = date('Y-m-d H:i:s', strtotime($vals->datetime));

                                            $datetime = new DateTime($userDateTime);
                                            $la_time = new DateTimeZone($vals->timezone);
                                            $datetime->setTimezone($la_time);
                                            $finalTimezoneTime = $datetime->format("l jS \of F Y h:i:s A");
                                        } else {
                                            $finalTimezoneTime = $vals->date . ',' . ' ' . $vals->time;
                                        }
                                        $userDateTime = date('Y-m-d H:i:s', strtotime($vals->datetime));
                                        ?>            
                                        <div class=" row sessionNotesData" style="display: none;">
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: left;font-size: 14px;">
                                                    {{$finalTimezoneTime}}
                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: center;">
                                                    {{isset($vals->firstName) ? $vals->firstName.' '.$vals->lastName:''}}
                                                </div>
                                            </div>
                                            <div class=" col s12 m4 20">
                                                <div class=" card-action " style="text-align: right;">
                                                    <a href="{{$meetingURL}}" {{isset($userDateTime) && ($userDateTime <= date("Y-m-d H:i:s")) ? 'disabled="disabled"':'' }} target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Launch</a>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                        <div class="card-action">
                                            <p style="text-align: center;"><a href="#!" id="seeMore" class="waves-effect waves-light btn" style="background-color: #736cb5;">View More</a></p>
                                        </div>
                                        <div class=" card-alert card green lighten-5" id="noSession" style="display: none;margin: auto;width: 50%; text-align: center">
                                            <div class=" card-content green-text">
                                                <p>No Sessions Found</p>
                                            </div>
                                        </div>
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
            </div>
        </div>
    </section>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
    var countData = "{{ count($content)}}";
    if (countData == 0) {
        $("#noSession").css("display", 'block');
    }
    if ($(".sessionNotesData:hidden").length == 0) {
        $("#seeMore").css("display", 'none');

    }
    $(".sessionNotesData").slice(0, 2).show();
    $("#seeMore").click(function (e) {
        e.preventDefault();
        $(".sessionNotesData:hidden").slice(0, countData).fadeIn("slow");
        if ($(".sessionNotesData:hidden").length == 0) {
            $("#seeMore").css("display", 'none');
            $("#noSession").css("display", 'none');
        }
    });
})
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