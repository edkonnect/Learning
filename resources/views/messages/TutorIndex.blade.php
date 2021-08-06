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
                            <!--<table id="users-list-datatable" class="table">-->
                            <table id="page-length-option" class="display">
                                <thead>
                                    <tr>
                                        <th style="display:none;">S.No</th>
                                        <th>Date Time</th>
                                        <th>From</th>
                                        <th>Reason</th>
                        <th data-orderable='false'>View Message</th>
                                        <th style="display:none;">View Status</th>
                                        <th>Status</th>
                                        <th data-orderable='false'>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($getData) && count($getData) > 0)
                                    @foreach($getData as $getDataKey=>$getDataVal)
                                    <tr>
                                        <td style="text-align: center; display: none;">{{$getDataKey+1}}</td>
                                        <td>{{Carbon\Carbon::parse($getDataVal->date)->format(' jS  F Y ').''.$getDataVal->time}}</td>

                                        <td>{{isset($getDataVal->username)?$getDataVal->username:''}}</td>
                                        <td>{{isset($getDataVal->reason)?$getDataVal->reason:''}}</td>
                                        <td>
                                            <a href="{{url('tutor-messages/show',['id'=>$getDataVal->id])}}"><i class="material-icons">remove_red_eye</i></a>
                                        </td>
                                    {{--   <td  style="display: none;">
                                            @if(isset($getDataVal->view_status) && $getDataVal->view_status=='1')
                                            <span class="chip green lighten-5">
                                                <i class="material-icons">visibility</i>
                                            </span>
                                            @else
                                            <span class="chip red lighten-5">
                                                <i class="material-icons">visibility_off</i>
                                            </span>
                                            @endif
                                        </td> --}}
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
                                            <a href="{{url('tutor-messages/edit',['id'=>$getDataVal->id])}}"><i class="material-icons">edit</i></a>
                                            @else
                                            <a href="javascript:void(0)" style="pointer-events: none; cursor: default;color: #9fa6ad;"><i class="material-icons">backspace</i></a>
                                            @endif
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

<!-- users list ends -->

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
