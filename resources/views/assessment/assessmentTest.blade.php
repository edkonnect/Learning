{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Assessment Test')

@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
@endsection
<?php
//echo '<pre>';
//print_r($getStudents);
//die;
?>
{{-- page content --}}
@section('content')

<div class="col s12">
        <div class="container">

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
                color: #8b62b5;">ASSESSMENT TEST</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                      <a href="{{url('/assessment')}}" class="waves-effect waves-light btn" style="background-color: #736cb5;">
                          Go Back
                      </a>
                    </div>
                    <div class="card-content">
                        <div class="section section-data-tables">
                            <div class="row">
                                <div class="col s12" id="quizData">
                                    @foreach($getAssessment as $key=>$val)
                                    <iframe src="{{$val->assmt_url}}" height="500" width="100%" style="border:0"></iframe>";
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

        <div class="content-overlay"></div>
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
