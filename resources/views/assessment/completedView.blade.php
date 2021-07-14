<?php

use App\Models\Course;
?>
@if(isset($getAssessment) && count($getAssessment) > 0)

<table  class="table invoice-data-table white border-radius-4 pt-1">

<tbody >

<tr>
<thead>
 <th>Topic </th>
<th>Date</th>
<th>Points</th>
<th>Result</th>

</thead>

</tr>

<tbody id ="Assessment">
  @foreach($getAssessment as $key=>$val)
<tr>
<td>{{$val->topic_name}}</td>
<td>{{Carbon\Carbon::parse($val->assessment_taken_date)->format(' jS  F Y ')}}</td>
<td>{{$val->points}}</td>
<td >
  <a href="{{url($val->location.$val->result_pdf)}}"
     >Result</a>

</td>

</tr>@endforeach
</tbody>
@else
    <div class="card-content " style="text-align: center;">
        <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
            <div class=" card-content green-text">
                <p>No Data Found</p>
            </div>
        </div>
    </div>
    @endif
</table>

<script src="{{asset('js/plugins.js')}}"></script>
