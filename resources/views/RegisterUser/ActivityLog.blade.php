<?php

use App\Models\Course;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','User Activity Log')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
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
                                        color: #8b62b5;">User Activity Log</h5></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                      <div class="row">
                          <div class="col m6 s12">
                              <div class="input-field">

                              </div>
                          </div>
                        </div>



                        <div  class="responsive-table">
                          @if(isset($activity_log) && count($activity_log) > 0)

                     <table  class="table invoice-data-table white border-radius-4 pt-1">

                       <tbody >

                       <tr>
                         <thead>
        <th>User Name</th>
        <th>Login Time</th>
        <th>Logout Time</th>
                         </thead>

                       </tr>

                       <tbody >
                            @foreach($activity_log as $key)
                         <tr>
      <td>{{$key->user_name}}</td>
    <?php  if ($key->login_time== '') {?>
      <td>-</td>
    <?php } ?>

      <td>{{Carbon\Carbon::parse($key->login_time)->format('h:i:s A jS  F Y ')}}</td>
      <?php  if ($key->logout_time== '') {?>
        <td>-</td>
      <?php } ?>
      <td>{{Carbon\Carbon::parse($key->logout_time)->format('h:i:s A jS  F Y ')}}</td>

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


                </div>

            </div>
        </div>
    </div>
    </section>
</div>



            @endsection

            {{-- vendor script --}}
            @section('vendor-script')
            <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
            @endsection

            {{-- page script --}}
            @section('page-script')
            <script src="{{asset('js/scripts/form-select2.js')}}"></script>
            @endsection
