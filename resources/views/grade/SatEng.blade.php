
{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Uploaded Files')

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
                                        color: #8b62b5;">UPLOADED FILES</h5></div>
                            </div>
                        </div>
                    </div>
                    @if(isset($files) && !empty($files))
                    <?php
                    //echo '<pre>';
                    //print_r($files); die;
                    ?>
                    @foreach ($files as $fileNames)
                    @if($fileNames!='.' && $fileNames!='..')

                    <div class="row" style="margin-top:60px;">
                        <div class="input-field col m1 s1">

                        </div>
                        <div class="input-field col m6 s6">
                            <label>
                                <a href= "{{url('/').'/SATENG/'.$fileNames}}" >{{$fileNames}}</a>
                            </label>
                        </div>

                    </div>
                    @endif
                    @endforeach
                    @endif
                    <div class="card-content">
                      <div class="row">
                          <div class="col m6 s12">
                              <div class="input-field">

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

            {{-- vendor script --}}
            @section('vendor-script')
            <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
            @endsection

            {{-- page script --}}
            @section('page-script')
            <script src="{{asset('js/scripts/form-select2.js')}}"></script>
            @endsection
