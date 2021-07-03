<?php
//echo '<pre>';
//        print_r($getsessionData);
//        die;
?>
@if(isset($getsessionData) && !empty($getsessionData) && count($getsessionData)>0)
<div class="row sessionNotesData">
    @foreach($getsessionData as $keys=>$vals)                               
    <div class="col s12 m12 20 indexSessionData">
        <div class="card ">
            <div class="card-title " style="text-align: center; padding: 10px">
                <h5 style="font-weight: bold;">{{isset($vals->topic_name)?strtoupper($vals->topic_name):''}}</h5>
            </div>

            <div class=" row">
                <div class=" col s12 m6 20">
                    <div class=" card-action " style="text-align: left;font-size: 14px;">
                        <strong>Session Date : </strong> {{date('l jS \of F Y h:i:s A',strtotime($vals->session_date))}}
                    </div>
                </div>
                <div class=" col s12 m6 20">
                    <div class=" card-action " style="text-align: right;font-size: 14px;">
                        <?php
                        $dateTime = new DateTime($vals->session_date);
                        $dateTime->modify('+7 day');
                        ?>
                        <strong>Session Due date : </strong> {{($dateTime->format("l jS \of F Y h:i:s A"))?$dateTime->format("l jS \of F Y h:i:s A"):''}}
                    </div>
                </div>
            </div>
            @if(count($vals->getStudHWAttachmentDetail)>0)
            <div class="card-content">
                <div class=" row">
                    @foreach($vals->getStudHWAttachmentDetail as $keyAttach=>$valAttch)

                    <div class=" col s12 m3">
                        <div class=" card-action" style="text-align: center">
                            Homework - {{$keyAttach+1}}
                            <a href="{{url("/")}}/uploads/{{$vals->getStudentDetail->username.'/'.$vals->getTutorDetail->username.'/'.$valAttch->attachment_link}}" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Download</a>
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
