{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','Post Session Notes')

@section('vendor-style')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
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
    /*    .selection{
            display: none !important;
        }*/
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
                                color: #8b62b5;">Post Session Notes</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">

                  <form method="POST" action="{{ url('/tutor/storeSessionNotes')  }}"  accept-charset="UTF-8" enctype="multipart/form-data" d="tutorSessionNotesForm" name="tutorSessionNotesForm">

            {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col m12 s12">
                            <h10>Course <span style="color: red;">*</span></h10>
                            <select class="select2 browser-default" id="course" name="course" required onchange="return getStudents(this.value);">
                                <option value="">Select Course</option>
                                @if(isset($getCourse))
                                @foreach($getCourse as $key=>$val)
                                <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col m12 s12" >
                                <label style="margin-left: 15px;">
                                    <input type="checkbox" id="checkbox" />
                                    <span>Show All Student</span>
                                </label>
                            </div>
                          </div>
                        </div>
                            <div class="row">
                                <div class="input-field col s12">

                                    </div>
                                  </div>
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="input-field col m12 s12">
                            <h10>Student <span style="color: red;">*</span></h10>
                            <select class="select2 browser-default" multiple="multiple" id="student" name="student[]" onchange="return getCount(this.value);" required>
                            </select>
                        </div>

                                <div class="input-field col m3 s12">
                                    <button type="button" id="cloneButton" class="waves-effect waves-light btn" style="background-color: #736cb5;display: none;" onclick="return setCloneData(this.value);">
                                        Copy Notes
                                    </button>
                                </div>

                        <div class="row">
                            <div class="input-field col m12 s12">
                                <h10>Topic <span style="color: red;">*</span></h10>
                                <select class="select2 browser-default" id="topic" name="topic" required onchange="return getLessonPlanDetails(this.value);">
                                    <option value="">Select Topic</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12 s12">
                                <h10>Sub Topic</h10>
                                <select class="select2 browser-default" id="subTopic" name="subTopic">
                                    <option value="">Select Sub-Topic</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12">
                                <h10>Session Date<span style="color: red;">*</span></h10>
                                <input type="text" name="session_date" class="datepickerCustom" id="session_date"  required="true" autocomplete="off" />
                            </div>

                            <div class="input-field col m6 s12">
                                <h10>Session Time<span style="color: red;">*</span></h10>
                                <input type="text" name="timepicker" class="timepicker" id="timepicker"  required="true" autocomplete="off" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12 s12">
                                <h10>Session Notes<span style="color: red;">*</span></h10>
                                <textarea id="session_notes" name="session_notes" class="materialize-textarea" required="true" style="height: 80px !important;"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <h10 style="margin-left: 15px;">Homework Attachments</h10>
                            <div class="input-field col m12 s12">
                                <input type="text" name="fileSelected" value="" id="fileSelected" style="display:none;" readonly="true">
                                <!--<input type="file" name="attachments[]" id="attachments" multiple="multiple"/>-->
                                <a href="javascript:void(0);" class="waves-effect waves-light btn modal-trigger mb-2 mr-1" onclick="return getFiles();" style="background-color: #736cb5;border-radius: 50px;">Browse Files
                                    <i class="material-icons right">attach_file</i>
                                </a>
                                <!--                                <a href="#browseFilesModal" class="waves-effect waves-light btn modal-trigger" style="background-color: #736cb5;border-radius: 50px;">Browse Files
                                                                    <i class="material-icons right">attach_file</i>
                                                                </a>                                -->
                            </div>
                        </div>

                        <input type="hidden" id="browseFileType" name="browseFileType" />
                        <input type="hidden" id="selectedGrade" name="selectedGrade" />
                        <div class="row">
                            <div class="input-field col m6 s6">
                                <label>
                                    <input type="checkbox" id="isDelay" name="isDelay" />
                                    <span>Delay in Submitting Homework</span>
                                </label>
                            </div>
                            <div class="input-field col m6 s6">
                                <label>
                                    <input type="checkbox" id="isDemo" name="demo" />
                                    <span>Demo</span>
                                </label>
                            </div>
                        </div>
                        <div class="row" style="margin-top:50px;">
                            <div class="input-field col s12">
                                <div class="input-field col m10 s12">
                                    <a href="{{url("/").'/post-session-notes'}}" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
                                </div>
                                <div class="input-field col m2 s12">
                                    <button class="waves-effect waves-light btn right" style="background-color: #736cb5;" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div id="browseFilesModal" class="modal">
        <form method="POST" action="javascript:void(0);" accept-charset="UTF-8" enctype="multipart/form-data" id="browseFilesModalForm" name="browseFilesModalForm">

            {{ csrf_field() }}
            <div class="modal-content">
                <h5 style="font-weight: bold;
                    color: #8b62b5;">Browse Files</h5>
                <div class="row">
                    <div class="input-field col m3 s6">
                        <label>
                            <input type="radio" id="myFiles" name="filesInput" checked="true" value="file1" onclick="myTutorFiles();" />
                            <span>My Files</span>
                        </label>
                    </div>
                    <div class="input-field col m3 s6">
                        <label>
                            <input type="radio" id="systemFiles" name="filesInput" value="file2" onclick="systemfiles();"/>
                            <span>System Files</span>
                        </label>
                    </div>
                </div>
                <div class="row" id="gradeDiv" style="display:none; margin-top: 60px;">
                    <div class="input-field col m12 s12">
                        <h10>Grades <span style="color: red;">*</span></h10>
                        <select class="" id="grade" name="grade" onchange="return getSystemFiles(this.value);">
                            <option value="">Select Grade</option>
                            @if(isset($getGrades))
                            @foreach($getGrades as $key=>$val)
                            <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div id="loadFiles"></div>
                <div id="loadSystemFiles"></div>
                <div class="row" style="margin-top:70px">
                    <div class="input-field col s12">
                        <div class="input-field col m9 s12">
                            <a href="{{url("/").'/post-session-notes'}}" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
                        </div>
                        <div class="input-field col m3 s12">
                            <button class="waves-effect waves-light btn right" style="background-color: #736cb5;" type="submit">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script>
                            $(document).ready(function () {
                                $('.datepickerCustom').datepicker({maxDate: new Date()});
                                $("#attachments").fileinput({
                                    initialPreviewAsData: true,
                                    showCaption: false,
                                    showRemove: true,
                                    showUpload: false,
                                    overwriteInitial: false,
                                });
                            });


                            function getSystemFiles(val) {
                                $.ajax({
                                    type: "post",
                                    url: '{{url("/")}}' + '/tutor/getSystemFiles',
                                    data: {'grade': val, '_token': '{{ csrf_token() }}'},
                                    success: function (data) {
                                        $('#loadFiles').addClass('hide');
                                        $('#loadSystemFiles').html(data);
                                    }
                                });
                            }
                            function myTutorFiles() {
                                $('#loadSystemFiles').html('');
                                $('#loadFiles').removeClass('hide');
                                $('#filesType').val('1');
                                $('#gradeDiv').css('display', 'none');
                            }
                            function systemfiles() {
                                $('#filesType').val('2');
                                $('#loadFiles').addClass('hide');
                                $('#gradeDiv').css('display', 'block');
                            }
                            function getFiles() {
                                $.ajax({
                                    type: "post",
                                    url: '{{url("/")}}' + '/tutor/getFiles',
                                    data: {'_token': '{{ csrf_token() }}'},
                                    success: function (data) {
                                        $('#loadFiles').html(data);
                                        $('#browseFilesModal').modal('open');
                                    }
                                });
                            }
                            function setCloneData() {
                                var studID = $("#student :selected").val();
                                $.ajax({
                                    type: "post",
                                    url: '{{url("/")}}' + '/tutor/setCloneData',
                                    data: {'studID': studID, '_token': '{{ csrf_token() }}'},
                                    success: function (data) {
                                        var resultData = JSON.parse(data);

                                        if (resultData.sessionNotes != '') {
                                            $('#session_notes').html(resultData.sessionNotes);
                                        }
                                        if (resultData.isDemo != '' && resultData.isDemo == 'on') {
                                            $('#isDemo').prop('checked', true);
                                        }
                                        if (resultData.isDelay != '' && resultData.isDelay == 'on') {
                                            $('#isDelay').prop('checked', true);
                                        }
                                    }
                                });
                            }
                            function getCount(val) {
                                var count = $("#student :selected").length;
                                var courseID = $("#course").val()
                                if (count == 1) {
                                    $('#cloneButton').css('display', 'block');
                                    var studentID = $("#student").val();
                                    $.ajax({
                                        type: "post",
                                        url: '{{url("/")}}' + '/tutor/getLessonPlan',
                                        data: {'course_id': courseID, 'student_id': studentID,'_token': '{{ csrf_token() }}'},
                                        success: function (data) {
                                            $('#topic').html(data);
                                        }
                                    });

                                } else {
                                    $('#cloneButton').css('display', 'none');
                                    $('#topic').html("");
                                    $('#subTopic').html("");
                                    $('#session_notes').html("");
                                    $.ajax({
                                        type: "post",
                                        url: '{{url("/")}}' + '/tutor/getLessonPlans',
                                        data: {'course_id': courseID,'_token': '{{ csrf_token() }}'},
                                        success: function (data) {
                                            $('#topic').html(data);
                                        }
                                    });
                                }
                            }
                            ;


                            $("#browseFilesModalForm").on("submit", function (e) {
                              var filesTypeVal = $('#filesType').val();
                              var getGradeVal = $('#grade').val();
                             $("#browseFileType").val(filesTypeVal);
                              $("#selectedGrade").val(getGradeVal);
                                if ($('#filesType').val() == '1') {
                                    if ($('input[name="myFilesNameSelect"]:checked').length == 0) {
                                        swal({
                                            title: 'You must select at least one file!!',
                                            icon: 'error'
                                        });
                                        e.preventDefault();
                                        return false;
                                    } else {
                                        $('#fileSelected').val($('input[name="myFilesNameSelect"]:checked').val());
                                        $('#fileSelected').css('display', 'block');
                                        $('#browseFilesModal').modal('close');
                                    }
                                } else {
                                    if ($('#grade').val() == '') {
                                        swal({
                                            title: 'Please select Grade!!',
                                            icon: 'error'
                                        });
                                        e.preventDefault();
                                        return false;
                                    }

                                    if ($('input[name="myFilesNameSelect"]:checked').length == 0) {
                                        swal({
                                            title: 'You must select at least one file!!',
                                            icon: 'error'
                                        });
                                        e.preventDefault();
                                        return false;
                                    } else {
                                        $('#fileSelected').val($('input[name="myFilesNameSelect"]:checked').val());
                                        $('#fileSelected').css('display', 'block');
                                        $('#browseFilesModal').modal('close');
                                    }


                                }
                            });
                            $("#tutorSessionNotesForm").on("submit", function (e) {
                                e.preventDefault();
                                var filesTypeVal = $('#filesType').val();
                                var getGradeVal = $('#grade').val();
                               $("#browseFileType").val(filesTypeVal);
                                $("#selectedGrade").val(getGradeVal);
                                var formData = new FormData($(this)[0]);

                                $.ajax({
                                    url: $(this).attr('action'),
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (data) {
                                        swal({
                                            title: 'Session Added Successfully',
                                            icon: 'success'
                                        });
                                        setTimeout(function () {
                                            window.location.reload();
                                        }, 1500);
                                    },
                                });
                            });
                            function getLessonPlanDetails(val) {
                                $.ajax({
                                    type: "post",
                                    url: '{{url("/")}}' + '/tutor/getLessonPlanDetails',
                                    data: {'lesson_id': val, '_token': '{{ csrf_token() }}'},
                                    success: function (data) {
                                        $('#subTopic').html(data);
                                    }
                                });
                            }
                            function getStudents(val) {

                                $.ajax({
                                    type: "post",
                                    url: '{{url("/")}}' + '/tutor/getStudents',
                                    data: {'course_id': val, 'userID': '<?php echo Auth::user()->id; ?>', '_token': '{{ csrf_token() }}'},
                                    success: function (data) {
                                        $('#student').html(data);
                                    }
                                });

                                $("#checkbox").click(function () {
                                  $.ajax({
                                      type: "post",
                                      url: '{{url("/")}}' + '/tutor/getAllStudents',
                                      data: {'course_id': val, 'userID': '<?php echo Auth::user()->id; ?>', '_token': '{{ csrf_token() }}'},
                                      success: function (data) {
                                          $('#student').html(data);
                                      }
                                  });
                                });

                            }

</script>

@endsection
{{-- vendor script --}}
@section('vendor-script')
<script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')

<script src="{{asset('js/scripts/form-select2.js')}}"></script>
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
<script src="{{asset('js/scripts/form-file-uploads.js')}}"></script>
<script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection
