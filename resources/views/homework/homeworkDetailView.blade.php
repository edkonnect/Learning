<?php // echo '<pre>'; print_r($getsessionData); die; ?>
@if(isset($getsessionData) && !empty($getsessionData))
<div class="row sessionNotesData">
    <div class="col s12 m12 20 indexSessionData">
        <div class="card ">
            <div class="card-title " style="text-align: center; padding: 10px">
                <h4 style="font-weight: bold;
                    color: #8b62b5;">{{isset($getsessionData->topic_name)?strtoupper($getsessionData->topic_name):''}}</h4>
            </div>

           <div class=" row">
                                            <div class=" col s12 m6 20">
                                                <div class=" card-action " style="text-align: left;font-size: 14px;">
                                                    <strong>Session Date : </strong> {{date('l jS \of F Y h:i:s A',strtotime($getsessionData->session_date))}}
                                                </div>
                                            </div>
                                            <div class=" col s12 m6 20">
                                                <div class=" card-action " style="text-align: right;font-size: 14px;">
                                                    <?php
                                                    $dateTime = new DateTime($getsessionData->session_date);
                                                    $dateTime->modify('+7 day');
                                                    ?>
                                                    <strong>Session Due date : </strong> {{($dateTime->format("l jS \of F Y h:i:s A"))?$dateTime->format("l jS \of F Y h:i:s A"):''}}
                                                </div>
                                            </div>
                                        </div>
            <div class="card-content " style="text-align: center;">
                <p style="text-align: justify;">
                    <strong style="font-weight: bold;">Tutor's Notes-</strong> {{isset($getsessionData->session_notes)?$getsessionData->session_notes:''}}
                </p>
            </div>
            @if(count($getsessionData->getHWAttachmentDetail)>0)
            @foreach($getsessionData->getHWAttachmentDetail as $keyAttach=>$valAttch)

            <div class="card-content " style="text-align: center;">
                <p style="text-align: center;">
                    Homework {{$keyAttach+1}} - <a href="{{url("/")}}/{{$valAttch->attachment_link}}" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">Download</a>
                </p>
            </div>

            @endforeach
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

