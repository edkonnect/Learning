{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','User Profile Page')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/user-profile-page.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection
{{-- page content --}}

@section('content')
<style>
    .input-field .prefix{
        position: relative !important;
    }
    .dropify-wrapper{
        height: 130px !important;
    }
    #profile-dropdown{
        height: auto !important;
    }
</style>
<div class="section" style="overflow-x: hidden;">
    <div class="section" id="user-profile">
        <div class="row">
            <!-- User Post Feed -->
            <div class="col s12 m12 20">
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="card card-border z-depth-2">
                                <div class="card-content">
                                    <div class="row">
                                        <div class=" col s12 m12">
                                            <div class="row">
                                                <div class=" col s12 m10">
                                                    <div class="col s2 pr-0 circle">
                                                        @if($getUserData->profile_image!='')
                                                        <img class="responsive-img circle" style="border-radius: inherit;" width="120" src="{{isset($getUserData->profile_image) && $getUserData->profile_image!='' ? url('/').'/uploads/'.$getUserData->username.'/profile_image/'.$getUserData->profile_image:''}}" alt="">                       
                                                        @else
                                                        <img class="responsive-img circle" style="border-radius: inherit;" width="120" src="{{url('/')}}/assets/images/user/default.jpg" alt="">
                                                        @endif 
                                                    </div>
                                                    <div class="col s10">
                                                        <h6>{{isset($getUserData->name)?strtoupper($getUserData->name):''}}</h6>
                                                        <p class="m-0">{{isset($getUserData->getRoles->name)?strtoupper($getUserData->getRoles->name):''}}</p>
                                                        <p class="m-0">{{isset($getUserData->phone)?$getUserData->phone:''}}</p>
                                                        <p class="m-0">{{isset($getUserData->email)?$getUserData->email:''}}</p>
                                                        <a href="#changePasswordModal" class="waves-effect waves-light btn modal-trigger mb-2 mr-1" style="background-color: #736cb5;margin-top: 20px;border-radius: 50px;">Change Password
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class=" col s12 m2">
                                                    <a class="waves-effect waves-cyan mb-2 mr-1 " title="Edit Profile" href="{{url('tutor/tutorProfileEdit',['id'=>Auth::user()->id])}}">
                                                        <i class="material-icons" style="border-radius: 50%;height: 50px;width: 50px;display: flex !important;align-items: center;justify-content: center;background-color: #705ec8;color: #e5e8ec;">edit</i>
                                                    </a>
                                                </div>

                                            </div>
                                            <hr>
                                            <h6 class="font-weight-900 text-uppercase"><a href="javascript:void(0)" style="pointer-events: none;">Education</a></h6>
                                            <p>{{isset($getUserData->education_qualification)?$getUserData->education_qualification:''}}</p>
                                            <hr>
                                            <h6 class="font-weight-900 text-uppercase"><a href="javascript:void(0)" style="pointer-events: none;">No. of years taught this subject</a></h6>
                                            <p>{{isset($getUserData->no_of_years_taught)?$getUserData->no_of_years_taught.' Yrs':''}}</p>
                                            <hr>
                                            <h6 class="font-weight-900 text-uppercase"><a href="javascript:void(0)" style="pointer-events: none;">Experience Summary</a></h6>
                                            <p>{{isset($getUserData->experience_summary)?$getUserData->experience_summary:''}}</p>
                                            <hr>
                                            @if(isset($getUserData->resume) && $getUserData->resume!='')
                                            <h6 class="font-weight-900 text-uppercase"><a target="_blank" title="Click to view" href="{{url('/').'/uploads/'.Auth::user()->username.'/resume/'.$getUserData->resume}}">Resume</a></h6>
                                            <p><embed src="{{url('/').'/uploads/'.Auth::user()->username.'/resume/'.$getUserData->resume}}" width= "500" height= "200"></p>
                                            @else
                                            <h6 class="font-weight-900 text-uppercase"><a href="javascript:void(0)" style="pointer-events: none;">Resume</a></h6>
                                            <p>No file found</p>
                                            @endif                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--                            <div class="row">
                                            <div class="col s12">
                                                <h5>{{isset($getUserData->name)?$getUserData->name:''}}</h5>
                                                <p>{{isset($getUserData->getRoles->name)?$getUserData->getRoles->name:''}}</p>
                                            </div>
                                        </div>-->
            @if(isset($getCourseDetail) && count($getCourseDetail) > 0)
            <div class="card">
                <div class="row mt-5">
                    <div class="row">
                        <div class="card-action">
                            <div class="col m6 s12">
                                <div class="card-title ">
                                    <h5 style="font-weight: bold;
                                        color: #8b62b5;">Student Course Details</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="section section-data-tables">
                            <div class="row">
                                <div class="col s12">                   
                                    <table id="" class="display">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Grade</th>
                                                <th>Course</th>
                                                <th>Subscription/On Demand</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getCourseDetail as $getCourseDetailKey=>$getCourseDetailVal)
                                            <?php // echo '<pre>'; print_r($getCourseDetailVal); die; ?>
                                            <tr>
                                                <td>{{isset($getCourseDetailVal->getStudentDetail->name)?strtoupper($getCourseDetailVal->getStudentDetail->name):''}}</td>
                                                <td>{{isset($getCourseDetailVal->getStudentDetail->grade)?$getCourseDetailVal->getStudentDetail->grade:''}}</td>
                                                <td>{{isset($getCourseDetailVal->getCourseDetail->course_name)?$getCourseDetailVal->getCourseDetail->course_name:''}}</td>
                                                <td>{{isset($getCourseDetailVal->subscription)?$getCourseDetailVal->subscription:''}}</td>
                                                <td>{{isset($getCourseDetailVal->end_date)?$getCourseDetailVal->end_date:''}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- datatable ends -->
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div id="changePasswordModal" class="modal" style="overflow-y: hidden !important;">            
            <form method="POST" action="{{url('/').'/userProfile/changePassword'}}" accept-charset="UTF-8" enctype="multipart/form-data" id="userManagementPsswordForm" name="userManagementPsswordForm">

                {{ csrf_field() }}
                <div class="modal-content">
                    <h5 style="font-weight: bold;
                        color: #8b62b5;">Change Password</h5>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input class="form-control" required="true"  id="newPwd" name="newPwd" type="password"  maxlength="12">
                        <label for="icon_prefix">New Password<span style="color: red;">*</span></label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input class="form-control" required="true"  id="confirmPwd" name="confirmPwd" type="password"  maxlength="12">
                        <label for="icon_prefix">Confirm Password<span style="color: red;">*</span></label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col m9 s12">                        
                                <a href="{{url("/").'/userProfile'}}" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
                            </div>
                            <div class="input-field col m3 s12">
                                <button class="waves-effect waves-light btn right" style="background-color: #736cb5;" type="submit">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).on("click", ".dropify-clear", function (event) {
    $('#removeImg').val('1');
});


$("#userManagementPsswordForm").submit(function (event) {
    var newPassword = $('#newPwd').val();
    var confirmPassword = $('#confirmPwd').val();
    if (confirmPassword.length < 8) {
        event.stopImmediatePropagation();
        swal({
            title: 'Password must be of minimum length 8 characters',
            icon: 'error'
        });
        return false;
    }
    if (newPassword != confirmPassword) {
        event.stopImmediatePropagation();
        swal({
            title: 'Password Mismatch',
            icon: 'error'
        });
        return false;
    }
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            swal({
                title: 'Password Updated Successfully',
                icon: 'success'
            });
            setTimeout(function () {
                window.location.reload();
            }, 1500);
        },
    });
});
$("#profileForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            swal({
                title: 'Profile Updated Successfully',
                icon: 'success'
            });
            setTimeout(function () {
                window.location.reload();
            }, 1500);
        },
    });
});
</script>

@endsection
{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
@endsection
{{-- page script --}}
@section('page-script')

<script src="{{asset('js/scripts/data-tables.js')}}"></script>
<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
<script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/scripts/app-invoice.js')}}"></script>
<script src="{{asset('js/scripts/form-file-uploads.js')}}"></script>
<script src="{{asset('js/scripts/form-elements.js')}}"></script>
@endsection
