{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','View Tutor Session Notes')

@section('vendor-style')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">

<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@endsection


{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
@endsection

{{-- page content --}}
@section('content')
<style>
    .fileinput-cancel-button,.kv-file-zoom,.kv-file-download,.file-upload-indicator{
        display: none !important;
    }
    .btn-block{
        background-color: #736cb5 !important;
    }
    .file-preview,.file-drop-zone.clearfix{
        float: left !important;
        width: 98%;
    }
</style>
<div class="section">
    @if (Session::has('success'))

    <div class="card-alert card green lighten-5">
        <div class="card-content green-text">
            <p>SUCCESS : {{ Session::get('success') }}</p>
        </div>
        <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    @if (Session::has('error'))

    <div class="card-alert card red lighten-5">
        <div class="card-content red-text">
            <p>FAILED : {{ Session::get('error') }}</p>
        </div>
        <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    <!-- Form Advance -->
    <div class="col s12 m12 l12">
        <div id="Form-advance" class="card card card-default scrollspy">
            <div class="row">
                <div class="card-action">
                    <div class="col m6 s12">
                        <div class="card-title ">
                            <h5 style="font-weight: bold;
                                color: #8b62b5;">View Tutor Session Notes</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <form method="POST" action="{{url('/').'/tutor/getTutorCourseSessions'}}" accept-charset="UTF-8" enctype="multipart/form-data" id="viewTutorSession" name="viewTutorSession">                    
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col m3 s12">
                            <h5>Course</h5>
                            <div class="input-field">
                                <select class="select2 browser-default" id="course" name="course" onchange="return getTutorList(this.value);">
                                    <option value="">Select Course</option> 
                                    @if(isset($getCourse)) 
                                    @foreach($getCourse as $key=>$val)
                                    <option value="{{$key}}">{{strtoupper($val)}}</option>                                        
                                    @endforeach
                                    @endif

                                </select>
                                <button class="waves-effect waves-light btn" onclick="return getAllData();" style="background-color: #736cb5; border-radius:50px;margin-top: inherit;" type="button">Select All
                                </button>
                            </div>
                        </div>
                        <div class="col m3 s12">
                            <h5>Tutor</h5>
                            <div class="input-field">
                                <select class="select2 browser-default" id="tutor" name="tutor" onchange="return getSession(this.value);">
                                    <option value="">Select Tutor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col m3 s12">
                            <h5>Start Date</h5>
                            <div class="input-field">
                                <input type="text" name="start_date" placeholder="Start Date" class="datepickerCustom" id="start_date" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col m3 s12">
                            <h5>End Date</h5>
                            <div class="input-field">
                                <input type="text" name="end_date" placeholder="End Date" class="datepickerCustom" id="end_date" autocomplete="off" />
                            </div>
                        </div>
                        <?php // $month = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'); ?>
                        <!--                        <div class="col m3 s12">
                                                    <h5>Month</h5>
                                                    <div class="input-field">
                                                        <select class="select2 browser-default" id="month" name="month" onchange="return getSession(this.value);">
                                                            <option value="">Select Month</option>  
                                                            @if(isset($month)) 
                                                            @foreach($month as $key=>$val)
                                                            <option value="{{$key}}">{{strtoupper($val)}}</option>                                        
                                                            @endforeach
                                                            @endif
                        
                                                        </select>
                                                    </div>
                                                </div>-->
                        <!--                        <div class="col m3 s12">
                                                    <h5>Year</h5>
                                                    <div class="input-field">
                                                        <select class="select2 browser-default" id="year" name="year" onchange="return getSession(this.value);">
                                                            <option value="">Select Year</option> 
                        
                        <?php
                        $i = date('Y');
//                                    for ($i = date('Y'); $i > '2018'; $i--) {
                        ?>
                                                                <option value="{{$i}}">{{$i}}</option>                                        
                        <?php // } ?>
                                                        </select>
                                                    </div>
                                                </div>-->
                    </div>
                    <div class="row" id="submitButton" style="display:none">
                        <div class="input-field col s12">
                            <div class="input-field col m10 s12">                        
                                <a href="{{url("/").'/view-tutor-sessions'}}" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
                            </div>
                            <div class="input-field col m2 s12">
                                <button class="waves-effect waves-light btn right" style="background-color: #736cb5;" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row sessionNotesData"></div>
            </div>

        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script>
                                    $(document).ready(function () {
                                        $('.datepickerCustom').datepicker({maxDate: new Date()});
                                    });
                                    function getSession(val) {
                                        $("#submitButton").css('display', 'block');
                                    }
                                    function getTutorList(val) {
                                        $("#submitButton").css('display', 'block');
                                        $.ajax({
                                            type: "post",
                                            url: '{{url("/")}}' + '/tutor/getTutorList',
                                            data: {'course_id': val, '_token': '{{ csrf_token() }}'},
                                            success: function (data) {
                                                $('#tutor').html(data);
                                            }
                                        });
                                    }
                                    function getAllData() {
                                        $.ajax({
                                            type: "post",
                                            url: '{{url("/")}}' + '/tutor/getTutorCourseSessions',
                                            data: {'getAllData': '1', '_token': '{{ csrf_token() }}'},
                                            success: function (data) {
                                                $('.sessionNotesData').html(data);
                                            }
                                        });
                                    }
                                    $("#viewTutorSession").on("submit", function (e) {
                                        e.preventDefault();


                                        var dateStart = new Date($('#start_date').val());
                                        var dateEnd = new Date($('#end_date').val());

                                        if (Date.parse(dateStart) > Date.parse(dateEnd)) {
                                            swal({
                                                title: 'Invalid Date Range!!',
                                                icon: 'error'
                                            });
                                            return false;
                                        }
                                        var formData = new FormData($(this)[0]);
                                        $.ajax({
                                            url: $(this).attr('action'),
                                            type: "POST",
                                            data: formData,
                                            processData: false,
                                            contentType: false,
                                            success: function (data) {
                                                $('.sessionNotesData').html(data);
                                            },
                                        });
                                    });</script>
@endsection  
{{-- vendor script --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.0/js/fileinput.min.js"></script>

<script src="{{asset('js/scripts/form-select2.js')}}"></script>

<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
<script src="{{asset('js/scripts/form-file-uploads.js')}}"></script>
<script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection