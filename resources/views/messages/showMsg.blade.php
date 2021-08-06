{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','Chat')

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-chat.css')}}">
@endsection

<?php // echo '<pre>';
//print_r($getData); die;
?>

{{-- main page content --}}
@section('content')
<div class="chat-application">
    <div class="app-chat">
        <div class="content-area content-right">
            <div class="app-wrapper">

                <div class="card">
                    <div class="row">
                        <div class="col m10 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;
                                    color: #8b62b5;text-align: center;">Show Messages</h5></div>
                        </div>
                        <div class="col m2 s12">
                            <div class="card-title ">
                                <h5 style="font-weight: bold;color: #8b62b5;text-align: right;">
                                    <a href="{{url('/')}}/tutor-messages" class="waves-effect waves-light btn modal-trigger mb-2 mr-1" style="background-color: #736cb5;">Back</a></h5></div>
                        </div>
                    </div>
                    <div class="card-content chat-content p-0">

                        <!-- Content Area -->
                        <div class="chat-content-area">
                            <div class="chat-area" style="height: auto;">

                                <div class="card" style="box-shadow: 1px 2px 10px #999;border-radius: 20px;">
                                    <div class="row">
                                        <div class="card-action">
                                            <div class="col m12 s12">
                                                <div class="card-title ">
                                                    <h5 style="font-weight: bold;
                                                        color: #8b62b5;text-align: left;">{{isset($getData->getUserDetail->name)?$getData->getUserDetail->name:''}}</h5></div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($getData))
                                    <div class="row">
                                        <div class="col s12 m4 20">
                                            <div class="card-action " style="text-align: left;">
                                                <h6 style="font-weight: bold;color: #8b62b5;">Reason : {{isset($getData->getReason->reason)?$getData->getReason->reason:''}}</h6>
                                            </div>
                                        </div>
                                        <div class="col s12 m4 20">
                                            <div class="card-action " style="text-align: center;">
                                                <h6 style="font-weight: bold;color: #8b62b5;">Status : {{isset($getData->status)?$getData->status:''}}</h6>
                                            </div>
                                        </div>
                                        <div class="col s12 m4 20">
                                            <div class="card-action " style="text-align: right;">
                                                <h6 style="font-weight: bold;color: #8b62b5;">Date Time : {{Carbon\Carbon::parse($getData->date)->format(' jS  F Y ').''.$getData->time}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chats">
                                        <div class="chats">
                                            <div class="chat">
                                                <div class="chat-body">
                                                    <div class="chat-text">
                                                        <p>{{isset($getData->message_text)?$getData->message_text:''}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if(isset($getData->getReply->message_text))
                                <div class="chats">
                                    <div class="chats">
                                        <!--                                        <hr>-->
                                        <div class="card" style="box-shadow: 1px 2px 10px #999;border-radius: 20px;">

                                            <div class="row">
                                                <div class="card-action">
                                                    <div class="col m12 s12">
                                                        <div class="card-title ">
                                                            <h5 style="font-weight: bold;
                                                                color: #8b62b5;text-align: right;">Admin Reply</h5></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 20">
                                                    <div class="card-action " style="text-align: right;">
                                                        <h6 style="font-weight: bold;color: #8b62b5;">Date Time : {{Carbon\Carbon::parse($getData->date_time)->format(' jS  F Y H:i:s')}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat chat-right">
                                                <div class="chat-body">
                                                    <div class="chat-text">
                                                        <p>{{isset($getData->getReply->message_text)?$getData->getReply->message_text:''}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!--/ Content Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    {{-- page scripts --}}
    @section('page-script')
    <script src="{{asset('js/scripts/app-chat.js')}}"></script>
    @endsection
