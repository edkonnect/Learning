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
    <div class="row user-profile mt-1 ml-0 mr-0">
        <img class="responsive-img" alt="" src="{{asset('images/gallery/wave')}}.png">
    </div>
    <div class="section" id="user-profile">


        <div class="row">
            <div class="col s12 m4 l3 user-section-negative-margin">
                <div class="row">
                    <div class="col s12 center-align">
                        @if($getUserData->profile_image!='')
                        <img class="responsive-img circle z-depth-5" style="border-radius: inherit;" width="120" src="{{isset($getUserData->profile_image) && $getUserData->profile_image!='' ? url('/').'/uploads/'.$getUserData->username.'/profile_image/'.$getUserData->profile_image:''}}" alt="">
                        @else
                        <img class="responsive-img circle z-depth-5" style="border-radius: inherit;" width="120" src="{{url('/')}}/assets/images/user/default.jpg" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <!-- User Post Feed -->
            <div class="col s12 m12 20" style="margin-top: 20px;">
                <div class="row">
                    <div class="card user-card-negative-margin z-depth-0" id="feed">
                        <div class="card-content card-border-gray">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class=" col s12 m6">
                                            <div class="card-action " style="text-align: left;">
                                                <h5>Name : {{isset($getUserData->name)?$getUserData->name:''}}</h5>
                                                <p>Phone : {{isset($getUserData->phone)?$getUserData->phone:''}}</p>
                                                <p>Email : {{isset($getUserData->email)?$getUserData->email:''}}</p>
                                                <!--</div>-->
                                                <a href="#changePasswordModal" class="waves-effect waves-light btn modal-trigger mb-2 mr-1" style="background-color: #736cb5;margin-top: 20px;border-radius: 50px;">Change Password</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class=" col s12 m6">
                                            <div class="card-action " style="text-align: right;">
                                                <a class="waves-effect waves-cyan modal-trigger mb-2 mr-1 " href="#myModal">
                                                    <i class="material-icons" style="border-radius: 50%;height: 50px;width: 50px;display: flex !important;align-items: center;justify-content: center;background-color: #705ec8;color: #e5e8ec;">edit</i>
                                                </a>
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
                                                    <?php // echo '<pre>'; print_r($getCourseDetailVal); die;
                                                    if (isset($getCourseDetailVal->getStudentDetail->grade)) {
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR1') {
                                                          $grade = 'Grade 1';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR2') {
                                                          $grade = 'Grade 2';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR3') {
                                                          $grade = 'Grade 3';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR4') {
                                                          $grade = 'Grade 4';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR5') {
                                                          $grade = 'Grade 5';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR6') {
                                                          $grade = 'Grade 6';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR7') {
                                                          $grade = 'Grade 7';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR8') {
                                                          $grade = 'Grade 8';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR9') {
                                                          $grade = 'Grade 9';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR10') {
                                                          $grade = 'Grade 10';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR11') {
                                                          $grade = 'Grade 11';
                                                      }
                                                      if ($getCourseDetailVal->getStudentDetail->grade == 'GR12') {
                                                          $grade = 'Grade 12';
                                                      }
                                                  }

                                                     ?>
                                                    <tr>
                                                        <td>{{isset($getCourseDetailVal->getStudentDetail->name)?strtoupper($getCourseDetailVal->getStudentDetail->name):''}}</td>
                                                        <td>{{$grade}}</td>
                                                        <td>{{isset($getCourseDetailVal->getCourseDetail->course_name)?$getCourseDetailVal->getCourseDetail->course_name:''}}</td>
                                                        <td>{{isset($getCourseDetailVal->subscription)?$getCourseDetailVal->subscription:''}}</td>
                                                        <td>{{isset($getCourseDetailVal->end_date)?date('l jS \of F Y h:i:s A',strtotime($getCourseDetailVal->end_date)):''}}</td>
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
        @if(isset($getInvoicesDetail) && count($getInvoicesDetail) > 0)
        <div class="row">
            <div class="card">
                <div class="row mt-5">
                    <div class="row">
                        <div class="card-action">
                            <div class="col m6 s12">
                                <div class="card-title ">
                                    <h5 style="font-weight: bold;
                                        color: #8b62b5;">Invoice Details</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="responsive-table">
                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                    <tr>
                                        <th>Invoice Date</th>
                                        <th>Invoice Link</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($getInvoicesDetail as $getInvoicesDetailKey=>$getInvoicesDetailVal)
                                    <tr><td>{{isset($getInvoicesDetailVal->date)?$getInvoicesDetailVal->date:''}}</td>
                                        <td><a href="{{url('/')}}/internal/uploads/danny/dummy.pdf" target="_blank">{{isset($getInvoicesDetailVal->invoice_link)?$getInvoicesDetailVal->invoice_link:''}}</a></td>
                                        <td>
                                            @if(isset($getInvoicesDetailVal->status) && $getInvoicesDetailVal->status=='Unpaid')
                                            <span class="chip lighten-5 red red-text">UNPAID</span>
                                            @else
                                            <span class="chip lighten-5 green green-text">PAID</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div id="myModal" class="modal" style="overflow-y: hidden !important;">
            <form method="POST" action="{{url('/').'/userprofile/storeUserData'}}" accept-charset="UTF-8" enctype="multipart/form-data" id="profileForm" name="profileForm">

                {{ csrf_field() }}
                <div class="modal-content">
                    <h5 style="font-weight: bold;
                        color: #8b62b5;">Profile Edit</h5>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input class="form-control" required="true" value="{{isset($getUserData->name)?$getUserData->name:''}}"  id="name" name="name" type="text"  maxlength="30">
                        <label for="icon_prefix">Name<span style="color: red;">*</span></label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input class="form-control validate" required="true" value="{{isset($getUserData->phone)?$getUserData->phone:''}}"  id="phone" name="phone" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10">
                        <small>Format: 1234536768</small>
                        <label for="icon_telephone">Telephone</label>
                    </div>
                    <div class="row">
                        <input type="hidden" name="removeImg" id="removeImg" />
                        <div class="input-field col s3">
                            <i class="material-icons prefix">add_a_photo</i>
                            <label for="profile_image">Profile Image</label>
                        </div>
                        <div class="input-field col s9">
                            <input type="file" id="input-file-now" name="profile_image" class="dropify" data-default-file="{{isset($getUserData->profile_image) && $getUserData->profile_image!=''?url('/').'/uploads/'.$getUserData->username.'/profile_image/'.$getUserData->profile_image:''}}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col m9 s12">
                                <a href="{{url("/").'/userProfile'}}" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
                            </div>
                            <div class="input-field col m3 s12">
                                <button class="waves-effect waves-light btn right" style="background-color: #736cb5;" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
