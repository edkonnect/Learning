{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','Upload Assessment Result')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
@endsection
{{-- page content --}}
@section('content')
<div class="seaction">
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
                                color: #8b62b5;">Upload Homework File</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">
              <form method="POST" action="{{ url('tutor-homework-list/uploadFile') }}" accept-charset="UTF-8" enctype="multipart/form-data" id="uploadFileForm" name="uploadFileForm">

                    <div class="row">
                        {{ csrf_field() }}
                        <div class="input-field col m8 s12">

                          <input type="file" id="input-file-now" name="uploadedFile[]" multiple="true" required="true" class="dropify" data-default-file="" />
                          <input type="hidden" id="tutor_id" name="tutor_id" value="{{Auth::user()->id}}" />
                        </div>

                            <div class="input-field col m4 s12">
                              <p><button type="submit" id="uploadButton"  class="waves-effect waves-light btn" style="background-color: #736cb5;">Upload</button></p>

                                </button>
                            </div>
                        </div>

                </form>

            </div>
            <div  >
              <div class="row">
                  <div class="card-action">
                      <div class="col m6 s12">
                          <div class="card-title ">
                              <h5 style="font-weight: bold;
                                  color: #8b62b5;">Uploaded Files</h5></div>
                      </div>
                  </div>
              </div>


                      <table  class="display">
                        @if(isset($getListing) && count($getListing) > 0)

                          <thead>
                              <tr>
                                  <th style="text-align: center">S.No</th>
                                  <th style="text-align: center">File Name</th>
                                  <th style="text-align: center">Date</th>
                                  <th style="text-align: center">View Document</th>
                                  <th style="text-align: center">Action</th>
                              </tr>

                          </thead>

                          <tbody>
                              @foreach($getListing as $key=>$val)

                              <tr>
                                  <td style="text-align: center">{{$key+1}}</td>
                                  <td style="text-align: center">{{$val->filename}}</td>
                                  <td>{{Carbon\Carbon::parse($val->created_at)->format(' jS  F Y ')}}</td>

                                  <td style="text-align: center">
                                    <a href="{{url($val->location.$val->filename)}}"target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">View
                                       </a>
                                  </td>
                                  <td style="text-align: center">
                                    <a href="javascript:void(0);" data-id="{{$val->id}}" onclick="return deleteListing({{$val->id}});" id="deleteAttachment" class="waves-effect waves-light btn" style="background-color: #736cb5;">Delete</a>
                                  </td>
                              </tr>
                              @endforeach

                          </div>
                          @else
                              <div class="card-content " style="text-align: center;">
                                  <div class=" card card green lighten-5"  style="margin: auto;width: 50%; text-align: center">
                                      <div class=" card-content green-text">
                                          <p>No Data Found</p>
                                      </div>
                                  </div>
                              </div>
                              @endif

                          </tbody>

                      </table>

                  </div>
              </div>

            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function deleteListing(val){

swal({
title: "Are you sure?",
        text: "You will not be able to recover this file!",
        icon: 'warning',
        dangerMode: true,
        buttons: {
        cancel: 'No, Please!',
                delete: 'Yes, Delete It'
        }
}).then(function (willDelete) {
if (willDelete) {
swal("Your file has been deleted!", {
icon: "success",


});
var deleteID = val;
$.ajax({
url: '{{url("/")}}' + '/tutor-homework-list/destroy',
        type: "POST",
        data: {"deleteID":deleteID, '_token': '{{ csrf_token() }}'},
        success: function (data) {
          var valueInput = $('#tutor_id').val();
          loadListing(valueInput);
        },
});
window.location.reload();} else {
swal("Your file is safe", {
title: 'Cancelled',
        icon: "error",
});
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
