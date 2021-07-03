<?php

use App\Models\LessonPlanDetails;
?>
@if(isset($getStudLessonData) && count($getStudLessonData)>0)
<div class="row">                            
    <div class="col s12 m12 20">
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
<script src="{{asset('js/plugins.js')}}"></script>