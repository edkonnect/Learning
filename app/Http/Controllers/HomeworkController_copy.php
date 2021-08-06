<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourseTutor;
use App\Models\StudentSession;
use App\Models\StudentHWAttachment;
use App\Models\TutorFileUpload;

use Illuminate\Http\Request;
use Auth;
use DateTime;
use Carbon\Carbon;

class HomeworkController extends Controller {

    public function index(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $courseID = $searchEndDate = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $i = 0;
                foreach ($getStudents as $studKey => $getStudentsVal) {
                    if ($i == 0) {

                        $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studKey)->get();

                        $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All");
                        $timePeriod = '';
                        $timePeriod .= "<option value=''>Select Time</option>";
                        foreach ($getTimePeriod as $getTimePeriodKey => $getTimePeriodVal) {
                            if ($getTimePeriodKey == 2) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            $timePeriod .= "<option " . $selected . " value=" . $getTimePeriodKey . ">" . $getTimePeriodVal . "</option>";
                        }


                        $data = '';
                        $data .= "<option value=''>Select Course</option>";
                        foreach ($getCourseDetail as $key => $val) {
                            if ($key == 0) {
                                $courseID = $val->course_id;
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                        }

                        $searchDate = date('Y-m-01 00:00:00');
                        $searchEndDate = date('Y-m-t 23:59:59');
                        $getsessionData = StudentSession::with('getHWAttachmentDetail')->where(['student_id' => $studKey, 'course_id' => $courseID, 'status' => 'Active'])
                                ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                                ->orderBy('session_date', 'Desc')
                                ->get();
                    }

                    $i++;
                }
            }
        }
        return view('homework.index', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data, 'timePeriod' => $timePeriod]);
    }

     public function tutorIndex(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getCourse = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $courseID = $searchEndDate = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {
            $getTutorCourse = StudentCourseTutor::where(['tutor_id' => $userID])->pluck('course_id');
            $getCourse = Course::where(['status' => 'Active'])->whereIn('id', $getTutorCourse)->orderBy('course_name', 'ASC')->pluck('course_name', 'id');
            if (isset($getCourse)) {
                $i = 0;
                foreach ($getCourse as $courseKey => $getCourseVal) {
                    if ($i == 0) {

                        $getStudents = StudentCourseTutor::with('getStudentDetail')->where(['course_id' => $courseKey, 'tutor_id' => $userID])->get();

                        $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All");
                        $timePeriod = '';
                        $timePeriod .= "<option value=''>Select Time</option>";
                        foreach ($getTimePeriod as $getTimePeriodKey => $getTimePeriodVal) {
                            if ($getTimePeriodKey == 2) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            $timePeriod .= "<option " . $selected . " value=" . $getTimePeriodKey . ">" . $getTimePeriodVal . "</option>";
                        }


                        $data = '';
                        $data .= "<option value=''>Select Student</option>";
                        foreach ($getStudents as $key => $val) {
                            if ($key == 0) {
                                $studentID = $val->id;
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                          //  $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                        }

                        $searchDate = date('Y-m-01 00:00:00');
                        $searchEndDate = date('Y-m-t 23:59:59');
                        $getsessionData = StudentSession::with('getStudHWAttachmentDetail')->where(['student_id' => $studentID, 'course_id' => $courseKey, 'status' => 'Active'])
                                ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                                ->orderBy('session_date', 'Desc')
                                ->get();
                    }

                    $i++;
                }
            }
        }
        return view('homework.tutorindex', ['pageConfigs' => $pageConfigs, 'getCourse' => $getCourse, 'getsessionData' => $getsessionData, 'data' => $data, 'timePeriod' => $timePeriod]);
    }

    public function getHomework($session_id, $studentID, $courseID) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $searchEndDate = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();

                $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All");
                $timePeriod = '';
                $timePeriod .= "<option value=''>Select Time</option>";
                foreach ($getTimePeriod as $getTimePeriodKey => $getTimePeriodVal) {
                    if ($getTimePeriodKey == 2) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $timePeriod .= "<option " . $selected . " value=" . $getTimePeriodKey . ">" . $getTimePeriodVal . "</option>";
                }


                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $key => $val) {
                    if ($val->course_id == $courseID) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }


                $searchDate = date('Y-m-01 00:00:00');
                $searchEndDate = date('Y-m-t 23:59:59');
                $getsessionData = StudentSession::where(['id' => $session_id, 'student_id' => $studentID, 'course_id' => $courseID, 'status' => 'Active'])
                        ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                        ->first();
            }

//            echo '<pre>';
//            print_r($getsessionData); die;
            return view('homework.homework', ['pageConfigs' => $pageConfigs, 'studentID' => $studentID, 'getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data, 'timePeriod' => $timePeriod]);
        }
    }

    public function getTutorHomework($session_id, $studentID, $courseID) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $studentsDynamicData=$searchEndDate = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->status == 'Active') {
            $getTutorsStudents = StudentCourseTutor::where(['tutor_id' => $userID])->pluck('student_id');
            $getStudents = Student::where(['status' => 'Active'])->whereIn('id', $getTutorsStudents)->orderBy('name', 'ASC')->pluck('name', 'id');
            if (isset($getStudents)) {
                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->where('tutor_id', $userID)->get();

                $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All");
                $timePeriod = '';
                $timePeriod .= "<option value=''>Select Time</option>";
                foreach ($getTimePeriod as $getTimePeriodKey => $getTimePeriodVal) {
                    if ($getTimePeriodKey == 2) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $timePeriod .= "<option " . $selected . " value=" . $getTimePeriodKey . ">" . $getTimePeriodVal . "</option>";
                }
                $studentsDynamicData = '';
                $studentsDynamicData .= "<option value=''>Select Students</option>";
                foreach ($getStudents as $getStudentsKey => $getStudentsVal) {
                    if ($getStudentsKey == $studentID) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $studentsDynamicData .= "<option " . $selected . " value=" . $getStudentsKey . ">" . $getStudentsVal . "</option>";
                }


                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $key => $val) {
                    if ($val->course_id == $courseID) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }


                $searchDate = date('Y-m-01 00:00:00');
                $searchEndDate = date('Y-m-t 23:59:59');
                $getsessionData = StudentSession::with('getStudHWAttachmentDetail')->where(['id' => $session_id, 'student_id' => $studentID, 'course_id' => $courseID, 'status' => 'Active'])
                        ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                        ->get();
            }

//            echo '<pre>';
//            print_r($getsessionData); die;
            return view('homework.tutorhomework', ['pageConfigs' => $pageConfigs, 'studentID' => $studentID, 'getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data,'studentsDynamicData'=>$studentsDynamicData, 'timePeriod' => $timePeriod]);
        }
    }

    public function getHomeworkDetailView($session_id, $studentID, $courseID) {

        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $getsessionData = StudentSession::where(['id' => $session_id, 'student_id' => $studentID, 'course_id' => $courseID, 'status' => 'Active'])->first();

                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();
                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $key => $val) {
                    if ($val->id == $courseID) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }
            }

//            echo '<br>';
//        print_r($getsessionData);
//        echo '<br>';
//        print_r($studentID);
//        echo '<br>';
//        print_r($courseID);
//        die;
            $view = view('homework.homeworkDetailView', ['getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data])->render();
            return $view;
        }
    }

    public function getHomeworkAjaxView($studentID, $courseID, $input) {

        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $query = StudentSession::where(['student_id' => $studentID, 'status' => 'Active']);

                if ($courseID != 'pageLoad') {
                    $query->where('course_id', $courseID);
                }

                $searchDate = $searchEndDate = '';
                if ($input != 'pageLoad') {
                    if ($input == '1') {
                        $searchDate = date('Y-m-d 00:00:00');
                        $searchEndDate = date('Y-m-d 23:59:59');
                    } elseif ($input == '2') {
                        $searchDate = date('Y-m-01 00:00:00');
                        $searchEndDate = date('Y-m-t 23:59:59');
                    } elseif ($input == '3') {
                        $ts = strtotime(date('Y-m-d 00:00:00'));
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                        $searchDate = date('Y-m-d 00:00:00', $start);
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('next saturday', $start));
                    } elseif ($input == '4') {
                        $ts = strtotime(date("Y-m-d 00:00:00", strtotime("-7 days")));
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                        $searchDate = date('Y-m-d 00:00:00', $start);
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('next saturday', $start));
                    } elseif ($input == '5') {
                        $searchDate = date('Y-m-d 00:00:00', strtotime('first day of last month'));
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('last day of last month'));
                    }
                    if ($input == 6) {
                        $getsessionData = $query->orderBy('session_date', 'Desc')->get();
                    } else {
                        $getsessionData = $query->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                                        ->orderBy('session_date', 'Desc')->get();
                    }
                } else {
                    $getsessionData = $query->orderBy('session_date', 'Desc')->get();
                }

                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();
                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $key => $val) {
                    if ($val->course_id == $courseID) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }

                $view = view('homework.homeworkListDetailView', ['getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data])->render();
                return $view;
            } else {
                return '';
            }
        }
    }

    public function getTutorHomeworkAjaxView($studentID, $courseID, $input) {

        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $query = StudentSession::where(['student_id' => $studentID, 'status' => 'Active']);

                if ($courseID != 'pageLoad') {
                    $query->where('course_id', $courseID);
                } else {
                    $getCourseDetail = StudentCourseTutor::where(['student_id' => $studentID, 'tutor_id' => $userID])->get();
                    foreach ($getCourseDetail as $key => $val) {
                        if ($key == 0) {
                            $courseID = $val->course_id;
                        }
                    }
                    $query->where('course_id', $courseID);
                }

                $searchDate = $searchEndDate = '';
                if ($input != 'pageLoad') {
                    if ($input == '1') {
                        $searchDate = date('Y-m-d 00:00:00');
                        $searchEndDate = date('Y-m-d 23:59:59');
                    } elseif ($input == '2') {
                        $searchDate = date('Y-m-01 00:00:00');
                        $searchEndDate = date('Y-m-t 23:59:59');
                    } elseif ($input == '3') {
                        $ts = strtotime(date('Y-m-d 00:00:00'));
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                        $searchDate = date('Y-m-d 00:00:00', $start);
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('next saturday', $start));
                    } elseif ($input == '4') {
                        $ts = strtotime(date("Y-m-d 00:00:00", strtotime("-7 days")));
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                        $searchDate = date('Y-m-d 00:00:00', $start);
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('next saturday', $start));
                    } elseif ($input == '5') {
                        $searchDate = date('Y-m-d 00:00:00', strtotime('first day of last month'));
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('last day of last month'));
                    }
                    if ($input == 6) {
                        $getsessionData = $query->orderBy('session_date', 'Desc')->get();
                    } else {
                        $getsessionData = $query->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                                        ->orderBy('session_date', 'Desc')->get();
                    }
                } else {
                    $getsessionData = $query->orderBy('session_date', 'Desc')->get();
                }
                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where(['student_id' => $studentID, 'tutor_id' => $userID])->get();
                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $key => $val) {
                    if ($val->course_id == $courseID) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }

                $view = view('homework.homeworkTutorListDetailView', ['getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data])->render();
                return $view;
            } else {
                return '';
            }
        }
    }
    public function getAllTutorHomeworkAjaxView($studentID, $courseID, $input) {

        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $query = StudentSession::where([ 'status' => 'Active']);

                if ($courseID != 'pageLoad') {
                    $query->where('course_id', $courseID);
                } else {
                    $getCourseDetail = StudentCourseTutor::where(['student_id' => $studentID, 'tutor_id' => $userID])->get();
                    foreach ($getCourseDetail as $key => $val) {
                        if ($key == 0) {
                            $courseID = $val->course_id;
                        }
                    }
                    $query->where('course_id', $courseID);
                }

                $searchDate = $searchEndDate = '';
                if ($input != 'pageLoad') {
                    if ($input == '1') {
                        $searchDate = date('Y-m-d 00:00:00');
                        $searchEndDate = date('Y-m-d 23:59:59');
                    } elseif ($input == '2') {
                        $searchDate = date('Y-m-01 00:00:00');
                        $searchEndDate = date('Y-m-t 23:59:59');
                    } elseif ($input == '3') {
                        $ts = strtotime(date('Y-m-d 00:00:00'));
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                        $searchDate = date('Y-m-d 00:00:00', $start);
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('next saturday', $start));
                    } elseif ($input == '4') {
                        $ts = strtotime(date("Y-m-d 00:00:00", strtotime("-7 days")));
                        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
                        $searchDate = date('Y-m-d 00:00:00', $start);
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('next saturday', $start));
                    } elseif ($input == '5') {
                        $searchDate = date('Y-m-d 00:00:00', strtotime('first day of last month'));
                        $searchEndDate = date('Y-m-d 23:59:59', strtotime('last day of last month'));
                    }
                    if ($input == 6) {
                        $getsessionData = $query->orderBy('session_date', 'Desc')->get();
                    } else {
                        $getsessionData = $query->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                                        ->orderBy('session_date', 'Desc')->get();
                    }
                } else {
                    $getsessionData = $query->orderBy('session_date', 'Desc')->get();
                }
                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where(['student_id' => $studentID, 'tutor_id' => $userID])->get();
                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $key => $val) {
                    if ($val->course_id == $courseID) {
                        $selected = "selected";
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }

                $view = view('homework.homeworkTutorListDetailView', ['getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data])->render();
                return $view;
            } else {
                return '';
            }
        }
    }

    public function uploadHomework(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getsessionData = $getsessionDataValArr = array();
        $sessionDate = $data = '';
        $userID = Auth::user()->id;
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $i = 0;
                foreach ($getStudents as $key => $getStudentsVal) {
                    if ($i == 0) {
                        $getsessionData = StudentSession::where(['student_id' => $key, 'status' => 'Active'])->get();
                        $getsessionData = StudentSession::with('getStudHWAttachmentDetail')->where(['student_id' => $key, 'status' => 'Active'])->orderBy('session_date', 'Desc')->get();

                        $sessionDate = '';
                        $sessionDate .= "<option value=''>Select Session Date</option>";
//                        foreach ($getsessionData as $getsessionDataKey => $getsessionDataVal) {
//                            $dateTime = date('m-d-Y m:s:i', strtotime($getsessionDataVal->session_date));
//
//                            $sessionDate .= "<option value=" . $getsessionDataVal->session_date . ">" . $dateTime . "</option>";
//                        }

//                        echo '<pre>';
//                        print_r($sessionDate); die;





                        $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $key)->get();
                        $data = '';
                        $data .= "<option value=''>Select Course</option>";
                        foreach ($getCourseDetail as $key => $val) {
                            $data .= "<option value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                            $i++;
                        }
                    }

                    $i++;
                }
            }
        }
        return view('homework.upload', ['pageConfigs' => $pageConfigs, 'sessionDate' => $sessionDate, 'getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data]);
    }

    public function uploadHomeworkNotification($session_id, $course_id, $student_id) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getsessionData = $getsessionDataValArr = array();
        $sessionDate = $studentsDrop = $data = $selected = '';
        $userID = Auth::user()->id;
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $getsessionData = StudentSession::with('getStudHWAttachmentDetail')->where(['student_id' => $student_id, 'status' => 'Active'])->orderBy('session_date', 'Desc')->get();

                $sessionDate = '';
                $sessionDate .= "<option value=''>Select Session Date</option>";
                foreach ($getsessionData as $getsessionDataKey => $getsessionDataVal) {
                    $dateTime = date('m-d-Y m:s:i', strtotime($getsessionDataVal->session_date));
                    if ($getsessionDataVal->id == $session_id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $sessionDate .= "<option " . $selected . " value=" . $getsessionDataVal->id . ">" . $dateTime . "</option>";
                }

                $studentsDrop = '';
                $studentsDrop .= "<option value=''>Select Student</option>";
                foreach ($getStudents as $getStudentsKey => $getStudentsVal) {
                    if ($getStudentsKey == $student_id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $studentsDrop .= "<option " . $selected . " value=" . $getStudentsKey . ">" . strtoupper($getStudentsVal) . "</option>";
                }





                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $student_id)->get();
                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $key => $val) {
                    if ($val->getCourseDetail->id == $course_id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }
            }
        }
        return view('homework.upload', ['pageConfigs' => $pageConfigs, 'sessionDate' => $sessionDate, 'studentsDrop' => $studentsDrop, 'getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data]);
    }

    public function getSessionDate($studentID, $courseID) {

        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {

                $getsessionData = StudentSession::with('getStudHWAttachmentDetail')
                        ->where(['student_id' => $studentID, 'course_id' => $courseID, 'status' => 'Active'])
                        ->orderBy('session_date', 'Desc')
                        ->limit(10)
                        ->get();

                $sessionDate = '';
                $sessionDate .= "<option value=''>Select Session Date</option>";
                foreach ($getsessionData as $getsessionDataKey => $getsessionDataVal) {
                    $dateTime = date('m-d-Y m:s:i', strtotime($getsessionDataVal->session_date));

                    $sessionDate .= "<option value=" . $getsessionDataVal->id . ">" . $dateTime . "</option>";
                }

                return $sessionDate;
            } else {
                return '';
            }
        }
    }

    public function uploadFile(Request $request) {
//        echo '<pre>';
//        print_r($request->all()); die;
        $sessionDateVal = $request->sessionDateVal;
        $uploadedFile = $request->uploadedFile;
        $studentID = $request->studentID;
        $sessionID = $request->sessionID;
        $getstudData = Student::find($studentID);
        $getUserData = User::where(['id' => $getstudData->parent_id])->first();

        if (isset($_FILES['uploadedFile']['name']) && !empty($_FILES['uploadedFile']['name'])) {
            $imageArr = array();
            if (!empty($request->file('uploadedFile'))) {
                $checkData = StudentHWAttachment::where(['session_id' => $sessionID])->get();
                $filesCount = count($checkData);
                if ($filesCount < 5) {
                    foreach ($request->file('uploadedFile') as $key => $valImage) {
                        $checkData = StudentHWAttachment::where(['session_id' => $sessionID])->get();
                        $filesCount = count($checkData);
                        if ($filesCount < 5) {
                            $path = $getUserData->username ;
                            $files_single = $valImage;
                            $filename = $files_single->getClientOriginalName();
                            $extension = $files_single->getClientOriginalExtension();
                            $picture_single = $filename. "." . $extension;
                            $destinationPath = base_path() .'/public/uploads/'.$path.'/';
                            $files_single->move($destinationPath, $picture_single);
                            if ($key < 5) {
                                $addData = new StudentHWAttachment();
                                $addData->attachment_id = $sessionID;
                                $addData->session_id = $sessionID;
                                $addData->sl_no = $filesCount + 1;
                                $addData->attachment_link = $picture_single;
                                $addData->save();
                            }
                        }
                    }
                    return redirect('homework-upload')->with('success', 'Attachment added successfully');
                } else {
                    return redirect('homework-upload')->with('error', 'Your maximum upload limit is 5');
                }
            }
        }
    }

    public function destroy(Request $request) {
        $id = $request->deleteID;
        $path=Auth::User()->username;
        $getListing = StudentHWAttachment::find($id);
        //  $getListing->delete();
        $attachment_link=$getListing->attachment_link;

        $destinationPath = base_path().'/public/uploads/'.$path.'/';
        $attachment_link=$getListing->attachment_link;
        $final=$destinationPath.$attachment_link;
        unlink($final);

      StudentHWAttachment::find($id)->delete();
        return redirect('homework-upload')->with('success', 'Attachment deleted successfully');
    }

    public function getListing(Request $request) {

        $sessionDateVal = $request->sessionDateVal;
        $studentID = $request->studentID;
        $sessionID = $request->sessionID;

        $getListing = StudentHWAttachment::where(['session_id' => $sessionID])->get();
//        echo '<pre>';
//        print_r($getListing); die;

        $view = view('homework.uploadList', ['getListing' => $getListing])->render();
        return $view;
    }
public function uploadTutorHomeworkFiles(){
  $tutor_id=Auth::user()->id;
  $getListing = TutorFileUpload::where(['tutor_id' => $tutor_id])->get();

  return view('homework.TutorFiles',compact('getListing'));
}
public function uploadTutorFile(Request $request){

  $tutor_id = $request->tutor_id;
  $getUserData = User::where(['id' => $tutor_id])->first();


      if (!empty($request->file('uploadedFile'))) {


              $uploadedFile =  $request->file('uploadedFile');
              foreach($uploadedFile as $file){
                $name = $file->getClientOriginalName();

//return $name_gen;

                //$name_gen = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                //$name = $name_gen.'.'.$ext;
                $up_location = 'internal/uploads/'.$getUserData->username.'/';

                $file->move($up_location,$name);

                TutorFileUpload ::insert([
                   'tutor_id'=>$tutor_id,
                      'filename' => $name,
                      'location'=>$up_location,
                      'created_at' => Carbon::now()
                  ]);
              }

}
             return Redirect()->back()->with('success','File Uploaded Successfully');

  }

public function FileDestroy(Request $request){
  $id=$request->deleteID;
  $file  = TutorFileUpload::find($id);
  $file_location =$file->location;
  $filename=$file->filename;
  $final=$file_location.$filename;
  unlink($final);

   TutorFileUpload::find($id)->delete();

  return redirect()->back()->with('success', 'Attachment deleted successfully');
}
}
