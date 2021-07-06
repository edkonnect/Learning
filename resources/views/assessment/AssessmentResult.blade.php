<?php

use App\Models\Course;
?>
<div  class="responsive-table">
  @if(isset($getAssessment) && count($getAssessment) > 0)

<table  class="table invoice-data-table white border-radius-4 pt-1">

<tbody >

<tr>
 <thead>
   <th>Topic </th>
<th>Start Date</th>
<th>End Date</th>
<th>Status</th>
<th>Upload Result</th>
 </thead>

</tr>

<tbody >
    @foreach($getAssessment as $key=>$val)
 <tr>
<td>{{$val->topic_name}}</td>
<td>{{Carbon\Carbon::parse($val->start_date)->format(' jS  F Y ')}}</td>
<td>{{Carbon\Carbon::parse($val->end_date)->format(' jS  F Y ')}}</td>
<?php
$status= '';
if (isset($val->status)) {
    if ($val->status == '1') {
        $status = 'Completed';
    }
    if ($val->status == '0') {
        $status = 'Not Completed';
    }

}
?>
<?php if ($val->status == '0') { ?>  <td style = "color:red;">{{$status}}</td>   <?php  }?>
  <?php if ($val->status == '1') { ?>  <td style = "color:green;">{{$status}}</td>   <?php  }?>
  <?php if ($val->status == '0') { ?>
  <td><a href="{{url('/assessment/upload-result-pdf',['id'=>$val->id])}}"    class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</a></td>
<?php  }?>
<?php if ($val->status == '1') { ?>
<td><a href="{{url('/assessment/upload-result-pdf',['id'=>$val->id])}}"  disabled  class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</a></td>
<?php  }?>
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
