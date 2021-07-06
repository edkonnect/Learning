<?php

use App\Models\Course;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Register User')


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
                                        color: #8b62b5;">Register User</h5></div>
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
                    <div class="card-content">

                          <form name="myform" method="post" action="{{ url('/register-user/store') }}">
	 	                           {{ csrf_field() }}
                               <div class="row">
                                 <div class="col m6 s12">
                                     <h5>Parent/Guardian Name</h5>
                                     <div class="input-field">
                                       <input type="text"  required name="name"></input>
                                 </div>
                               </div>
                               <div class="col m6 s12">
                                   <h5>Parent's Email Address</h5>
                                   <div class="input-field">
                                     <input type="text" required name="email"></input>
                                       </select>
                                   </div>
                               </div>
                             </div>
                             <div class="row">

                               <div class="col m6 s12">
                                 <h5>Password</h5>

                                   <div class="input-field">
                          <input type="text" name="password" required></input>

                               </div>
                             </div>
                             </div>
                                <div class="row">
                              <div class="col m6 s12">
                                  <div class="input-field">
                            <input type="button" class="btn btn-primary" style="background-color: #736cb5;" value="Generate Password" onClick="randomPassword(10);" tabindex="2">

                              </div>
                            </div>

                              <div class="col m6 s12">
                                  <div class="input-field">
                                    <button type="submit" class="waves-effect waves-light btn" style="background-color: #736cb5;">Save</button>
                                      </select>
                                  </div>
                              </div>
                            </div>



                         </form>
                </div>

            </div>
        </div>
    </div>
    </section>
</div>

@endsection
<script type="text/javascript">

function randomPassword(length) {

    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    myform.password.value = pass;
}
</script>


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
