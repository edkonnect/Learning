<?php

use App\Models\LessonPlanDetails;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/animate-css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist-plugin-tooltip.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-modern.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/intro.css')}}">
@endsection
<?php
//use App\Models\LessonPlanDetails;
//echo '<pre>';
//print_r($val->getHWAttachmentDetail);
//die;
?>
@section('content')
<div class="section">
    @if(Auth::user()->roles==3)
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="row">
                    <div class="card-action">
                        <div class="col m6 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">Articles</h5></div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div id="dashboardData">
                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card recent-buyers-card animate fadeUp">
                                        <div class="row">
                                            <div class="card-action">
                                                <div class="col m12 12">
                                                    <div class="card-title ">
                                                        <h5 style="font-weight: bold;
                                                            color: #8b62b5; text-align: center">MONTHLY MATH CHALLENGE</h5></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content">

                                            @if(isset($customDashboardData['typeOne']))
                                            @foreach($customDashboardData['typeOne'] as $customDashboardDataKey=>$customDashboardDataVal)

                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card ">
                                                        <div class="card-content">
                                                            <h4 class="card-title mb-0" style="font-weight: bold;">{{isset($customDashboardDataVal->title) ?$customDashboardDataVal->title :''}}</h4>
                                                           <!--<p class="medium-small pt-2">Today</p>-->
                                                            <p class="card-text" style="text-align: justify;">
                                                                {{isset($customDashboardDataVal->description) ?strip_tags($customDashboardDataVal->description) :''}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12">
                                    <div class="card recent-buyers-card animate fadeUp">
                                        <div class="row">
                                            <div class="card-action">
                                                <div class="col m12 12">
                                                    <div class="card-title ">
                                                        <h5 style="font-weight: bold;
                                                            color: #8b62b5; text-align: center">NEWSLETTER</h5></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content">

                                            @if(isset($customDashboardData['typeTwo']))
                                            @foreach($customDashboardData['typeTwo'] as $customDashboardDataKey=>$customDashboardDataVal)
                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card ">
                                                        <div class="card-content">
                                                            <h4 class="card-title mb-0" style="font-weight: bold;">{{isset($customDashboardDataVal->title) ?$customDashboardDataVal->title :''}}</h4>
                                                           <!--<p class="medium-small pt-2">Today</p>-->
                                                            <p class="card-text" style="text-align: justify;">
                                                                {{isset($customDashboardDataVal->description) ?strip_tags($customDashboardDataVal->description) :''}}
                                                                <a href="{{isset($customDashboardDataVal->link)?$customDashboardDataVal->link:''}}" target="_blank" class="waves-effect waves-light" style="font-weight: bold;">Read More</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m12">
                                    <div class="card recent-buyers-card animate fadeUp">
                                        <div class="row">
                                            <div class="card-action">
                                                <div class="col m12 12">
                                                    <div class="card-title ">
                                                        <h5 style="font-weight: bold;
                                                            color: #8b62b5; text-align: center">FACTS AND TRIVIA</h5></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            @if(isset($customDashboardData['typeThree']))
                                            @foreach($customDashboardData['typeThree'] as $customDashboardDataKey=>$customDashboardDataVal)
                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card ">
                                                        <div class="card-content">
                                                            <h4 class="card-title mb-0" style="font-weight: bold;">{{isset($customDashboardDataVal->title) ?$customDashboardDataVal->title :''}}</h4>
                                                           <!--<p class="medium-small pt-2">Today</p>-->
                                                            <p class="card-text" style="text-align: justify;">
                                                                {{isset($customDashboardDataVal->description) ?strip_tags($customDashboardDataVal->description) :''}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

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
    </div>
    @else
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="row">
                    <div class="card-action">
                        <div class="col m6 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;">DASHBOARD</h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('pages.intro')
</div>

@include('pages.intro')
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
@endsection


{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/form-select2.js')}}"></script>
<script src="{{asset('js/scripts/dashboard-modern.js')}}"></script>
<script src="{{asset('js/scripts/intro.js')}}"></script>
<script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection
