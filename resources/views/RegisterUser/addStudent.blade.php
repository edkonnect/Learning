<?php

use App\Models\Course;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Add Student')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">

@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
@endsection
<?php
//use App\Models\LessonPlanDetails;
//echo '<pre>';
//print_r($val->getHWAttachmentDetail);
//die;
?>
{{-- page content --}}
@section('content')
<style>
  ::placeholder{
    color:black;
    opacity: 0.75;
  }
</style>
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
                                        color: #8b62b5;">Add Student</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
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
                      <form method="post" action="{{ url('/save-student') }}">
                       {{ csrf_field() }}

                <table class="table table-borderless" sytle="border:0px !important;" id="dynamicAddRemove">
                     <tbody>
                     <tr >
                       <td>
                      <select   class="select2 browser-default" name="addMoreInputFields[0][username]"  id="username"  required="1" >
                   <option value="">Select Parent</option>
                       @foreach($user as $key=>$val)
                          <option value="{{$val}}">{{strtoupper($val)}}
                                 </option>
                                @endforeach

                     </select></td>
                         <td><input type="text" name="addMoreInputFields[0][firstName]" placeholder="Enter First Name" class="form-control" />
                         </td>
                         <td><input type="text" name="addMoreInputFields[0][lastName]" placeholder="Enter Second Name" class="form-control" />
                         </td>
                      </tr>
                <tr>
             <td>              <div class="input-field">
               <select  class="select2 browser-default" name="addMoreInputFields[0][grade]" >

                                          <option value="">Select Grade</option>

                                        <option value="GR1"> Grade1</option>
                                          <option value="GR2"> Grade2 </option>
                                          <option value="GR3"> Grade3 </option>
                                          <option value="GR4"> Grade4 </option>
                                          <option value="GR5"> Grade5 </option>
                                          <option value="GR6"> Grade6 </option>
                                          <option value="GR7"> Grade7 </option>
                                          <option value="GR8"> Grade8 </option>
                                          <option value="GR9"> Grade9 </option>
                                          <option value="GR10"> Grade10</option>
                                            <option value="GR11"> Grade11 </option>
                                            <option value="GR12"> Grade12 </option>
                                          </select></td>

             <td>
            <select   class="select2 browser-default" name="addMoreInputFields[0][course_id]"  id="course"  required="1" >
         <option value="">Select Course</option>
             @foreach($course as $key=>$val)
                <option value="{{$key}}">{{strtoupper($val)}}
                       </option>
                      @endforeach

           </select></td>
               <td>
            <select class="select2 browser-default" name="addMoreInputFields[0][tutor_id]"  id="tutor"  required="1" >
          <option value="">Select Tutor</option>
             @foreach($tutor as $key=>$val)
                <option value="{{$key}}">{{strtoupper($val)}}
                       </option>
                      @endforeach

           </select></td>
</tr><tr><td><b> Effictive Date</b><input type ="Date" class="form-control" name="addMoreInputFields[0][eff_date]"/></td>
  <td><b>End Date</b><input type ="Date" class="form-control" name="addMoreInputFields[0][end_date]"</td>


             <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary" style="background-color: #736cb5;">+</button></td>

           </tr>

           </tbody>

       </table>
       <div class="row">
           <div class="col m6 s12">

               <div class="input-field">


                 <button type="submit" class="waves-effect waves-light btn" style="background-color: #736cb5;">Save</button>

               </div>
           </div>
         </div>

         <div class="row">
           <div class="col m6 s12">
               <div class="input-field" name="addMoreInputFields[0][hidden]">
           </div>
         </div>


</form>

                </div>

            </div>
        </div>
    </div>
    </section>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
          ++i;
          $("#dynamicAddRemove").append('<tbody><tr><td><select name ="addMoreInputFields[' + i +'][username]" class="select2 browser-default"><option value="">{{"Select Parent"}}@foreach($user as $key=>$val)<option value="{{$key}}">{{$val}}</option>@endforeach</select></td><td><input type="text" name="addMoreInputFields[' + i +
              '][firstName]" placeholder="Enter First Name" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
                  '][lastName]" placeholder="Enter Last Name" class="form-control" /></td></tr><tr><td><select name ="addMoreInputFields[' + i +'][grade]" class="select2 browser-default"><option value="">{{"Select Grade"}}<option value="GR1">Grade1</option><option value="GR2">Grade2</option><option value="GR3">Grade3</option><option value="GR4">Grade4</option><option value="GR5">Grade5</option><option value="GR6">Grade6</option><option value="GR7">Grade7</option><option value="GR8">Grade8</option><option value="GR9">Grade9</option><option value="GR10">Grade10</option><option value="GR11">Grade11</option><option value="GR12">Grade12</option></select></td><td><select name ="addMoreInputFields[' + i +'][course_id]" class="select2 browser-default"><option value="">{{"Select Course"}}@foreach($course as $key=>$val)<option value="{{$key}}">{{$val}}</option>@endforeach</select></td><td><select name ="addMoreInputFields[' + i +'][tutor_id]" class="select2 browser-default"><option value="">{{"Select Tutor"}}@foreach($tutor as $key=>$val)<option value="{{$key}}">{{$val}}</option>@endforeach</select></td></tr><tr><td><b>Effictive Date</b><input type="date" class="form-control" name="addMoreInputFields['+ i +'][eff_date]"/></td><td><b>End Date</b><input type ="Date" class="form-control" name="addMoreInputFields['+ i +'][end_date]"/></td></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr></tbody>'
              );
      });
      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('tbody').remove();
        });

    </script>
            @endsection

            {{-- vendor script --}}
            @section('vendor-script')
            <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
            @endsection

            {{-- page script --}}
            @section('page-script')
            <script src="{{asset('js/scripts/form-select2.js')}}"></script>
            <script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
            <script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>

            @endsection
