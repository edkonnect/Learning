<?php
//echo '<pre>';
//print_r($getsessionData); die;
?>
@if(isset($getsessionData) && !empty($getsessionData))
<div class=" row sessionNotesData" style="display: none;">
    @foreach($getsessionData as $keys=>$vals)
    <div class=" col s12 m12 20 indexSessionData">
        <div class=" card ">
            <div class=" card-alert card " style="background-color: #8862b5;">
                <div class=" row ">
                    <div class=" col s12 m4 20">
                        <div class=" card-action " style="text-align: left;color: white;font-size: 14px;">
                            {{'Session Date : '.date('l jS \of F Y h:i:s A',strtotime($vals->session_date))}}
                        </div>
                    </div>
                    <div class="col s12 m4 20">
                        <div class="card-action " style="text-align: center; color: white;">
                            {{isset($vals->demo) && $vals->demo == 'Yes'?'Demo':''}}
                        </div>
                    </div>
                    <div class="col s12 m4 20">
                        <div class="card-action " style="text-align: right; color: white;">
                            <a style="color: white;" href="{{url("/")}}/Tutorprofile/Edkonnect/E/{{$vals->getTutorDetail->name}}.pdf" target="_blank">{{isset($vals->getTutorDetail->name)?ucfirst('Tutor : '.$vals->getTutorDetail->name):''}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" card-title " style="text-align: center;">
                <h5 style="font-weight: bold;">{{isset($vals->topic_name)?strtoupper($vals->topic_name):''}}</h5>
            </div>

            <div class="row">
                                            <div class="card-action " style="text-align: center; display: none;">
                                                <h6 style="font-weight: bold;">Session Date - {{date('l jS \of F Y h:i:s A',strtotime($vals->session_date))}}</h6>
                                            </div>
                                        </div>
            <div class=" card-content " style="text-align: center;">
                <p style="text-align: justify;">
                    <strong>Notes-</strong> {{isset($vals->session_notes)?$vals->session_notes:''}}
                </p>
                <p style="text-align: center;"><a target="_blank" href="{{url('/tutor/getHomework',['session_id' => $vals->id,'student_id'=>$vals->student_id,'course_id'=>$vals->course_id])}}" class="waves-effect waves-light btn" style="background-color: #736cb5;    margin-top: 20px;">Click here for Homework</a></p>
            </div>
            <!--            <div class=" card-alert card " style="background-color: #8862b5;">
                            <div class=" row">
                                <div class=" col s12 m6 20">
                                    <div class=" card-action " style="text-align: left;color: white;">
                                        {{isset($vals->demo) && $vals->demo == 'Yes'?'Demo':''}}
                                    </div>
                                </div>
                                <div class=" col s12 m6 20">
                                    <div class=" card-action " style="text-align: right;color: white;">
            <?php
//                            $diffTime = Helper::time_elapsed_string($vals->session_date);
////                                                print_r($diffTime); die;
//                            $diff = $diffTime['diff'];
//                            $time = $diffTime['time'];
            ?>
                                        {{isset($diff)?$diff.' ':''}}
                                    </div>
                                </div>
                            </div>
                        </div>-->
        </div>
    </div>
    @if($keys % 2 != 0 )
</div>
<div class=" row sessionNotesData" style="display: none;">
    @endif
    @endforeach
</div>
<div class=" row">
    <p style="text-align: center;"><a href="#!" id="seeMore" class=" waves-effect waves-light btn " style="background-color: #736cb5;">View More</a></p>
</div>
<div class=" card-alert card green lighten-5" id="noSession" style="display: none;margin: auto;width: 50%; text-align: center">
    <div class=" card-content green-text">
        <p>No Sessions Found</p>
    </div>
</div>
@endif

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
    var countData = "{{ count($getsessionData)}}";

    var timePeriod = $("#timePeriod").val();
    if (timePeriod == 6) {
        $(".sessionNotesData").slice(0, countData).show();
    } else {
        $(".sessionNotesData").slice(0, 1).show();
    }
    if (countData == 0) {
        $("#noSession").css("display", 'block');
    }
    if (countData <= 2 ) {
        $("#seeMore").css("display", 'none');
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
})
</script>