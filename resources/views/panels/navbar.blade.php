<?php

use App\Models\Student;
use App\Models\StudentSession;
use App\Models\MessagesReply;
use App\Models\Messages;

$userID = Auth::user()->id;

if (isset($userID) && $userID != '') {
    $getsessionData = $homedueArr = $messageReplyArr = $getMessages = array();
    $getStudents = Student::where(['status' => 'Active', 'parent_id' => $userID])->pluck('id');
    if (isset($getStudents)) {
        //HomeWork Due
        $getsessionData = StudentSession::with('getHWAttachmentDetail')->whereIn('student_id', $getStudents)->where(['status' => 'Active'])->get();
        if (isset($getsessionData)) {
            foreach ($getsessionData as $getsessionDataKey => $getsessionDataVal) {
                $dateTime = new DateTime($getsessionDataVal->session_date);
                $dateTime->modify('+7 day');
                $date1 = new DateTime($dateTime->format("Y-m-d H:i:s"));
                $date2 = new DateTime(date('Y-m-d H:i:s'));
                $diff = $date2->diff($date1);
                $hours = $diff->h;
                $hours = $hours + ($diff->days * 24);
                if ((count($getsessionDataVal->getHWAttachmentDetail) > 0) && ($hours <= 24)) {
                    if (isset($getsessionDataVal->getStudHWAttachmentDetail) && count($getsessionDataVal->getStudHWAttachmentDetail) > 0) {
                        
                    } else {
                        $homedueArr[] = $getsessionDataVal;
                    }
                }
            }
        }

        //Admin Reply
        $getMessages = Messages::where(['user_id' => $userID, 'status' => 'Open', 'view_status' => '0'])->get();
        if (isset($getMessages)) {
            foreach ($getMessages as $getMessagesKey => $getMessagesVal) {
                if (isset($getMessagesVal->getReply->message_text)) {
                    $messageReplyArr[] = $getMessagesVal;
                }
            }
        }
    }
    $countVal = count($homedueArr) + count($messageReplyArr);
}
?>
<div class="navbar @if(($configData['isNavbarFixed'])=== true){{'navbar-fixed'}} @endif">
    <nav
        class="{{$configData['navbarMainClass']}} @if($configData['isNavbarDark']=== true) {{'navbar-dark'}} @elseif($configData['isNavbarDark']=== false) {{'navbar-light'}} @elseif(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData['navbarMainColor']}} @endif">
        <div class="nav-wrapper">
            <div class="header-search-wrapper hide-on-med-and-down" style="display:none;">
                <i class="material-icons">search</i>
                <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize"
                       data-search="template-list">
                <ul class="search-list collection display-none"></ul>
            </div>
            <ul class="navbar-list right">
                <!--                <li class="dropdown-language">
                                    <a class="waves-effect waves-block waves-light translation-button" href="#"
                                       data-target="translation-dropdown">
                                        <span class="flag-icon flag-icon-gb"></span>
                                    </a>
                                </li>-->
                <li class="hide-on-med-and-down">
                    <a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);">
                        <i class="material-icons">settings_overscan</i>
                    </a>
                </li>
                <li class="hide-on-large-only search-input-wrapper">
                    <a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);">
                        <i class="material-icons">search</i>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"
                       data-target="notifications-dropdown">
                        <i class="material-icons">notifications_none
                            @if(isset($countVal) && $countVal!='')
                            <small class="notification-badge">{{isset($countVal) && $countVal!=0?$countVal:''}}</small>
                            @endif
                        </i>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
                       data-target="profile-dropdown">
                        <span class="avatar-status avatar-online">
                            <!--<img src="{{asset('images/avatar/avatar-7.png')}}" alt="avatar"><i></i>-->
                            @if(Auth::user()->profile_image!='')
                            <img src="{{isset(Auth::user()->profile_image) && Auth::user()->profile_image!='' ? url('/').'/uploads/'.Auth::user()->username.'/profile_image/'.Auth::user()->profile_image:''}}" alt="avatar">                       
                            @else
                            <img src="{{url('/')}}/assets/images/user/default.jpg" alt="avatar">
                            @endif 

                        </span>
                    </a>
                </li>
                <!--                <li>
                                    <a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right">
                                        <i class="material-icons">format_indent_increase</i>
                                    </a>
                                </li>-->
            </ul>
            <!-- translation-button-->
            <ul class="dropdown-content" id="translation-dropdown">
                <li class="dropdown-item">
                    <a class="grey-text text-darken-1" href="{{url('lang/en')}}" data-language="en">
                        <i class="flag-icon flag-icon-gb"></i>
                        English
                    </a>
                </li>
                <li class="dropdown-item">
                    <a class="grey-text text-darken-1" href="{{url('lang/fr')}}" data-language="fr">
                        <i class="flag-icon flag-icon-fr"></i>
                        French
                    </a>
                </li>
                <li class="dropdown-item">
                    <a class="grey-text text-darken-1" href="{{url('lang/pt')}}" data-language="pt">
                        <i class="flag-icon flag-icon-pt"></i>
                        Portuguese
                    </a>
                </li>
                <li class="dropdown-item">
                    <a class="grey-text text-darken-1" href="{{url('lang/de')}}" data-language="de">
                        <i class="flag-icon flag-icon-de"></i>
                        German
                    </a>
                </li>
            </ul>
            <!-- notifications-dropdown-->
            <ul class="dropdown-content" id="notifications-dropdown">
                <li>
                    <h6>NOTIFICATIONS<span class="new badge">{{isset($countVal) && $countVal!=0?$countVal:''}}</span></h6>
                </li>
                <li class="divider"></li>
                @if(isset($homedueArr))
                @foreach($homedueArr as $homedueArrKey=>$homedueArrVal)
                <?php
                $time = Helper::time_elapsed_string($homedueArrVal->created_at);
                $url = '/uploadHomeworkNotification/' . $homedueArrVal->id . '/' . $homedueArrVal->course_id . '/' . $homedueArrVal->student_id;
                ?>
                <li>
                    <a class="black-text" href="{{url($url)}}">
                        <span class="material-icons icon-bg-circle teal small">today</span>
                        Homework Due - {{isset($homedueArrVal->topic_name)?$homedueArrVal->topic_name:''}}
                    </a>
                    <time class="media-meta grey-text darken-2">Added {{isset($time['diff'])?$time['diff']:''}}</time>
                </li>
                @endforeach
                @endif

                @if(isset($messageReplyArr))
                @foreach($messageReplyArr as $messageReplyArrKey=>$messageReplyArrVal)
                <?php $time = Helper::time_elapsed_string($messageReplyArrVal->getReply->created_at); ?>
                <li>
                    <a class="black-text" href="{{url('/messages/show',['id'=>$messageReplyArrVal->id])}}">
                        <span class="material-icons icon-bg-circle red small">chat_bubble_outline</span>                        
                        You have reply message from Admin
                    </a>
                    <time class="media-meta grey-text darken-2">{{isset($time['diff'])?$time['diff']:''}}</time>
                </li>                
                @endforeach
                @endif
            </ul>
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
                <li>
                    <a class="grey-text text-darken-1" href="{{url('/userProfile')}}">
                        <i class="material-icons">person_outline</i>
                        Profile
                    </a>
                </li>
                <li>
                    <a class="grey-text text-darken-1" href="{{url('/messages')}}">
                        <i class="material-icons">chat_bubble_outline</i>
                        Chat
                    </a>
                </li>
                <li>
                    <a class="grey-text text-darken-1" target="_blank" href="{{url("/")}}/userguide.pdf">
                        <i class="material-icons">help_outline</i>
                        Help
                    </a>
                </li>
                <li class="divider"></li>
                
                
                <li>
                    <!--          <a class="grey-text text-darken-1" href="{{asset('user-login')}}">
                                <i class="material-icons">keyboard_tab</i>
                                Logout
                              </a>-->
                    <a class="grey-text text-darken-1" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        <i class="material-icons">keyboard_tab</i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <nav class="display-none search-sm">
            <div class="nav-wrapper">
                <form id="navbarForm">
                    <div class="input-field search-input-sm">
                        <input class="search-box-sm mb-0" type="search" required="" placeholder='Explore Materialize' id="search"
                               data-search="template-list">
                        <label class="label-icon" for="search">
                            <i class="material-icons search-sm-icon">search</i>
                        </label>
                        <i class="material-icons search-sm-close">close</i>
                        <ul class="search-list collection search-list-sm display-none"></ul>
                    </div>
                </form>
            </div>
        </nav>
    </nav>
</div>
<!-- search ul  -->
<ul class="display-none" id="default-search-main">
    <li class="auto-suggestion-title">
        <a class="collection-item" href="#">
            <h6 class="search-title">FILES</h6>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img src="{{asset('images/icon/pdf-image.png')}}" width="24" height="30" alt="sample image">
                    </div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">
                            Two new item submitted</span>
                        <small class="grey-text">Marketing Manager</small>
                    </div>
                </div>
                <div class="status"><small class="grey-text">17kb</small></div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img src="{{asset('images/icon/doc-image.png')}}" width="24" height="30" alt="sample image">
                    </div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">52 Doc file Generator</span>
                        <small class="grey-text">FontEnd Developer</small>
                    </div>
                </div>
                <div class="status"><small class="grey-text">550kb</small></div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img src="{{asset('images/icon/xls-image.png')}}" width="24" height="30" alt="sample image">
                    </div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">25 Xls File Uploaded</span>
                        <small class="grey-text">Digital Marketing Manager</small>
                    </div>
                </div>
                <div class="status"><small class="grey-text">20kb</small></div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img src="{{asset('images/icon/jpg-image.png')}}" width="24" height="30" alt="sample image">
                    </div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">Anna Strong</span>
                        <small class="grey-text">Web Designer</small>
                    </div>
                </div>
                <div class="status"><small class="grey-text">37kb</small></div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion-title">
        <a class="collection-item" href="#">
            <h6 class="search-title">MEMBERS</h6>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img class="circle" src="{{asset('images/avatar/avatar-7.png')}}" width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">John Doe</span>
                        <small class="grey-text">UI designer</small>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img class="circle" src="{{asset('images/avatar/avatar-8.png')}}" width="30" alt="sample image">
                    </div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">Michal Clark</span>
                        <small class="grey-text">FontEnd Developer</small>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img class="circle" src="{{asset('images/avatar/avatar-10.png')}}" width="30" alt="sample image">
                    </div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">Milena Gibson</span>
                        <small class="grey-text">Digital Marketing</small>
                    </div>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar">
                        <img class="circle" src="{{asset('images/avatar/avatar-12.png')}}" width="30" alt="sample image">
                    </div>
                    <div class="member-info display-flex flex-column">
                        <span class="black-text">Anna Strong</span>
                        <small class="grey-text">Web Designer</small>
                    </div>
                </div>
            </div>
        </a>
    </li>
</ul>
<ul class="display-none" id="page-search-title">
    <li class="auto-suggestion-title">
        <a class="collection-item" href="#">
            <h6 class="search-title">PAGES</h6>
        </a>
    </li>
</ul>
<ul class="display-none" id="search-not-found">
    <li class="auto-suggestion">
        <a class="collection-item display-flex align-items-center" href="#">
            <span class="material-icons">error_outline</span>
            <span class="member-info">No results found.</span>
        </a>
    </li>
</ul>