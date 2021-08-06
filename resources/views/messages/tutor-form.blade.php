{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','Edit Send Message')

@section('vendor-style')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="seaction">

    <!-- Form Advance -->
    <div class="col s12 m12 l12">
        <div id="Form-advance" class="card card card-default scrollspy">
            <div class="row">
                <div class="card-action">
                    <div class="col m6 s12">
                        <div class="card-title ">
                            <h5 style="font-weight: bold;
                                color: #8b62b5;">Reply</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <form method="POST" action="{{url('/').'/changeStatus'}}" accept-charset="UTF-8" enctype="multipart/form-data" id="messagesForm" name="messagesForm">
                  <div class="row">
                      {{ csrf_field() }}
                      <input type="hidden" name="mid" value="{{$mid}}" />

                      <div class="input-field col m10 s10">
                      <h5>Reply</h5>
                      <textarea cols="50" rows="10" name="Reply" ></textarea>
                      </div>
                    </div>
                <div class="row">
                      {{ csrf_field() }}
                      <div class="input-field col m6 s6">
                        <select class="select2 browser-default"  name="view_status" required>
                          <option>Change Status</option>
                          <option value ="1">Close</option>
              </select>
                      </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col m9 s12">
                                <a href="{{url("/").'/tutor-messages'}}" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
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
    </div>
</div>
</div>
@endsection
{{-- vendor script --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/form-select2.js')}}"></script>

<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
@endsection
