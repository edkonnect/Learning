{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Messages')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
@endsection

{{-- page content --}}
@section('content')
<style>
    .text-wrap{
        white-space:normal;
    }
    .width-200{
        width:300px;
    }

</style>
<!-- users list start -->
<section class="users-list-wrapper section">
    <div class="users-list-table">
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
        <div class="card">
            <div class="row">
                <div class="card-action">
                    <div class="col m6 s12">
                        <div class="card-title ">
                            <h5 style="font-weight: bold;
                                color: #8b62b5;">Messages</h5></div>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="section section-data-tables">
                    <div class="row">
                        <div class="col s12">
                            <a href="#myModal" class="waves-effect waves-light btn modal-trigger mb-2 mr-1" style="background-color: #736cb5;"><i class="material-icons">add</i></a>
                            <!--<table id="users-list-datatable" class="table">-->                    
                            <table id="page-length-option" class="display">
                                <thead>
                                    <tr>
                                        <th style="display:none;">S.No</th>
                                        <th>Date Time</th>
                                        <th>Reason</th>
                                        <th>Message</th>
                                        <th style="display:none;">View Status</th>
                                        <th>Status</th>
                                        <th data-orderable='false'>Edit</th>
                                        <th data-orderable='false'>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($getData) && count($getData) > 0)
                                    @foreach($getData as $getDataKey=>$getDataVal)
                                    <tr>
                                        <td style="text-align: center; display: none;">{{$getDataKey+1}}</td>
                                        <td>{{isset($getDataVal->date)?$getDataVal->date.' '.$getDataVal->time:''}}</td>
                                        <td>{{isset($getDataVal->getReason->reason)?$getDataVal->getReason->reason:''}}</td>
                                        <td style="text-align:justify;">{{isset($getDataVal->message_text)?$getDataVal->message_text:''}}</td>
                                        <td  style="display: none;">
                                            @if(isset($getDataVal->view_status) && $getDataVal->view_status=='1')
                                            <span class="chip green lighten-5">
                                                <i class="material-icons">visibility</i>
                                            </span>
                                            @else
                                            <span class="chip red lighten-5">
                                                <i class="material-icons">visibility_off</i>                                            
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($getDataVal->status) && $getDataVal->status=='Closed')
                                            <span class="chip green lighten-5">
                                                <span class="green-text">Closed</span>
                                            </span>
                                            @else
                                            <span class="chip red lighten-5">
                                                <span class="red-text">Open</span>                                            
                                            </span>
                                            @endif
                                        </td>
                                        <td>@if(isset($getDataVal->status) && $getDataVal->status!='Closed')
                                            <a href="{{url('messages/edit',['id'=>$getDataVal->id])}}"><i class="material-icons">edit</i></a>
                                            @else
                                            <a href="javascript:void(0)" style="pointer-events: none; cursor: default;color: #9fa6ad;"><i class="material-icons">backspace</i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('messages/show',['id'=>$getDataVal->id])}}"><i class="material-icons">remove_red_eye</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- datatable ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col s12">
        <div id="myModal" class="modal">            
            <form method="POST" action="{{url('/').'/messages/store'}}" accept-charset="UTF-8" enctype="multipart/form-data" id="messagesForm" name="messagesForm">
                <div class="modal-content">
                    <h5 style="font-weight: bold;
                        color: #8b62b5;">Send Message</h5>

                    <div class="row">
                        <div class="input-field col m12 s12"> 
                            <h10>Reason <span style="color: red;">*</span></h10>
                            <select class="browser-default" id="reason_id" name="reason_id" required>
                                <option value="">Select Reason</option>
                                @if(isset($getReasons))
                                @foreach($getReasons as $key=>$val)
                                <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="input-field col m12 s12">
                            <textarea id="message_text" name="message_text" class="materialize-textarea" required="true" style="height: 100px !important;"></textarea>
                            <label for="message_text">Message Text<span style="color: red;">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col m9 s12">                        
                                <a href="{{url("/").'/messages'}}" class="waves-effect waves-light btn right" title="Cancel">Cancel<i class="material-icons right">backspace</i></a>
                            </div>
                            <div class="input-field col m3 s12">
                                <button class="waves-effect waves-light btn right" style="background-color: #736cb5;" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Disagree</a>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
                            </div>-->
            </form>
        </div>
    </div>
</div>

<!-- users list ends -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$("#messagesForm").on("submit", function (e) {
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
                title: 'Message Added Successfully',
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
@endsection
{{-- page script --}}
@section('page-script')

<script src="{{asset('js/scripts/data-tables.js')}}"></script>
<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
<script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection
