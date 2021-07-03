<?php

use App\Models\LessonPlanDetails;
?>
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Quizlet')
{{-- page content --}}
@section('content')
<style>
    .text-wrap{
        white-space:normal;
    }
    .width-200{
        width:200px;
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
                            <div class="col m10 s12">
                                <div class="card-title ">
                                    <h5 style="font-weight: bold;
                                        color: #8b62b5;">Quizlet</h5>
                                    <p style="font-size: 16px;
                                       color: #8b62b5;">Interactive Learning Platform - {{isset($getData->description)?$getData->description:''}}</p>
                                </div>
                            </div>
                            <div class="col m2 float-right">
                                <a href="{{url('/quizes')}}" class="waves-effect waves-light btn" style="background-color: #736cb5;">
                                    Go Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="section section-data-tables">
                            <div class="row">
                                <div class="col s12" id="quizData">
                                    <iframe src="https://quizlet.com/{{isset($getData) ? $getData->quizlet_id : ''}}/match/embed?i=2x81fd&x=1jj1" height="500" width="100%" style="border:0"></iframe>";
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection