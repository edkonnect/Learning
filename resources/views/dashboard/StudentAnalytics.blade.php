<?php

use App\Models\Course;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Student Analytics')

@section('vendor-style')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}"><link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
@endsection
<?php
//use App\Models\LessonPlanDetails;
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
                                        color: #8b62b5;">Student Analytics</h5></div>
                            </div>
                        </div>
                    </div>
                    <div id="sessionData">
                               @if (Session::has('success'))

                               <div class="card-alert card green lighten-5">
                                   <div class="card-content green-text">
                                       <p>SUCCESS : {{ Session::get('success') }}</p>
                                   </div>
                                   <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">??</span>
                                   </button>
                               </div>
                               @endif
                               @if (Session::has('error'))

                               <div class="card-alert card red lighten-5">
                                   <div class="card-content red-text">
                                       <p>FAILED : {{ Session::get('error') }}</p>
                                   </div>
                                   <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">??</span>
                                   </button>
                               </div>
                               @endif
                    <div class="card-content">
                      <form method="POST" action="{{ url('student-analytics/upload') }}" accept-charset="UTF-8"  >
                          {{ csrf_field() }}
                        <div class="row">
                            <div class="col m6 s12">
                                <h5>Student</h5>
                                <div class="input-field">
                                  <select class="select2 browser-default" id="student" name="student" required="1" onchange="return getCourse(this.value);">
                                    <option value="">Select Student</option>

                                        @foreach($Students as $key=>$val)
                                        <option value="{{$key}}">{{strtoupper($val)}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                                <div class="col m6 s12">
                                    <h5>Course</h5>
                                    <div class="input-field">
                                        <select class="select2 browser-default" id="course" name="course" required="1" >
                                          <option value="">Select Course</option>

                                        </select>
                                    </div>
                                </div>


                      </div>
                          <div class="row">
                              <div class="col m6 s12">
                                  <h5>Performance</h5>
                                  <div class="input-field">
                                      <select class="select2 browser-default"  name="performance" required="1" >
                                        <option value="">Select Performance Level</option>
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>
                                        <option value="C+">C+</option>


                                      </select>
                                  </div>
                              </div>
                                 


                                      <div class="col m6 s12">
                                          <h5>Participation Rate</h5>
                                          <div class="input-field">
                                              <select class="select2 browser-default"  name="participation_rate" required="1" >
                                                <option value="">Select Participation Rate</option>
                                                <option value="1">Low</option>
                                                <option value="2">Average</option>
                                                <option value="3">Perfect</option>


                                              </select>
                                          </div>
                                      </div>
                                 </div>

                <button type="submit" class="waves-effect waves-light btn" style="background-color: #736cb5;">Save</a>

        </form>
            </div>
        </div>
    </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

function getCourse(val) {
  $(document).ready(function () {
  @if (isset($data))
          var data = "<?php echo $data; ?>";
  $('#course').html(data);
  @endif
  });
$.ajax({
type: "post",
        url: '{{url("/")}}' + '/session-notes/getCourse',
        data: {'stud_id': val, '_token': '{{ csrf_token() }}'},
        success: function (data) {
        $('#course').html(data);
        }
});
}

</script>
              @endsection
              {{-- vendor script --}}
              @section('vendor-script')
              <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
              <script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
              <script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
              <script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>

              <script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
              @endsection

              {{-- page script --}}
              @section('page-script')
              <script src="{{asset('js/scripts/form-select2.js')}}"></script>
              <script src="{{asset('js/scripts/form-file-uploads.js')}}"></script>
              <script src="{{asset('js/scripts/data-tables.js')}}"></script>

              <script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
              <script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
              @endsection
