<?php
//echo '<pre>';
//print_r($getSessionData); die;
?>
@if(isset($getSessionData) && count($getSessionData) >0)
    <table id="page-length-option" class="display">
        <thead>
            <tr>
                <th style="font-size: 20px;">Course</th>
                <th style="font-size: 20px;">Tutor</th>
                <th style="font-size: 20px;">Month & Year</th>
                <th style="font-size: 20px;">Total Sessions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getSessionData as $keys=>$vals)
            <tr>
                <td>{{isset($vals->getCourseDetail->course_name)?strtoupper($vals->getCourseDetail->course_name):''}}</td>
                <td>{{isset($vals->getTutorDetail->name)?strtoupper($vals->getTutorDetail->name):''}}</td>
                <td>{{isset($vals->sessionDate)?date('F, Y',strtotime($vals->sessionDate)):''}}</td>
                <td>{{isset($vals->total)?$vals->total:''}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
<div class=" card-alert card green lighten-5" id="noSession" style="text-align: center">
    <div class=" card-content green-text">
        <p>No Sessions Found</p>
    </div>
</div>
@endif
