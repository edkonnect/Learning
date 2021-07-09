<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grades;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourseTutor;
use App\Models\StudentSession;
use App\Models\LessonPlan;
use App\Models\LessonPlanDetails;
use App\Models\TutorCourse;
use App\Models\StudentLessonTutorAssignment;
use App\Models\TutorHWAttachment;
use Illuminate\Http\Request;
use Auth;
use DB;

class SessionController extends Controller {

    public function getFiles(Request $request) {
        $userID = Auth::user()->id;
        $path = "internal/uploads/" . Auth::user()->username . "/";
        $files = scandir($path);
        $view = view('session.fileslist', ['files' => $files])->render();
        return $view;
    }

    public function getSystemFiles(Request $request) {
        $userID = Auth::user()->id;
        $grade = $request->grade;
        $getGrade = Grades::find($grade);
        $gradeName = isset($getGrade->name) ? $getGrade->name : '';
        $path = "internal/uploads/system/" . $gradeName . "/";
//        $path = "internal/uploads/" . Auth::user()->username . "/";
        $files = scandir($path);
        $view = view('session.syatemfileslist', ['files' => $files])->render();
        return $view;
    }

    public function getTutorCourseSessions(Request $request) {
        if (isset($request->getAllData) && $request->getAllData == 1) {
            $getSessionData = StudentSession::with('getCourseDetail')->where(['status' => 'Active'])->groupBy('tutor_id')->select('*', 'session_date as sessionDate', DB::raw('count(*) as total'))->get()->sortBy('getCourseDetail.course_name');
        } else {
            $query = StudentSession::where(['status' => 'Active']);
            if ($request->course != '') {
                $query->where(['course_id' => $request->course]);
            }
            if ($request->tutor != '') {
                $query->where(['tutor_id' => $request->tutor]);
            }
            if ($request->start_date != '' && $request->end_date != '') {
                $searchDate = date('Y-m-d 00:00:00', strtotime($request->start_date));
                $searchEndDate = date('Y-m-d 23:59:59', strtotime($request->end_date));
                $query->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate);
            } elseif ($request->start_date != '' && $request->end_date == '') {
                $searchDate = date('Y-m-d 00:00:00', strtotime($request->start_date));
                $searchEndDate = date('Y-m-d 23:59:59', strtotime($request->start_date));
                $query->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate);
            } elseif ($request->end_date != '' && $request->start_date == '') {
                $searchDate = date('Y-m-d 00:00:00', strtotime($request->end_date));
                $searchEndDate = date('Y-m-d 23:59:59', strtotime($request->end_date));
                $query->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate);
            }
            $getSessionData = $query->orderBy('session_date', 'Desc')->groupBy('tutor_id')->select('*', 'session_date as sessionDate', DB::raw('count(*) as total'))->get();
//        echo '<pre>';
//        print_r($getSessionData); die;
        }
        $view = view('session.getTutorCourseSessions', ['getSessionData' => $getSessionData])->render();
        return $view;
    }

    public function viewTutorSessions(Request $request) {
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $courseID = $searchEndDate = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->is_admin == '1' && $getUserData->status == 'Active') {
            $getTutor = array();
//            $getTutor = User::where(['roles' => '2'])->orderBy('name', 'ASC')->pluck('name', 'id');
            $getCourse = Course::where(['status' => 'Active'])->orderBy('course_name', 'ASC')->pluck('course_name', 'id');
        } else {
            return view('/pages/page-404');
        }
        return view('session.viewtutorsessions', ['getTutor' => $getTutor, 'getCourse' => $getCourse]);
    }

    public function tutorIndex() {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $courseID = $searchEndDate = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {
            $getTutorsStudents = StudentCourseTutor::where(['tutor_id' => $userID])->pluck('student_id');
            $getStudents = Student::where(['status' => 'Active'])->whereIn('id', $getTutorsStudents)->orderBy('name', 'ASC')->pluck('name', 'id');
            $getTutorCourse = TutorCourse::where(['tutor_id' => $userID])->pluck('course_id');
            $getGrades = Grades::where(['status' => 'Active'])->pluck('name', 'id');
            $getCourse = Course::where(['status' => 'Active'])->whereIn('id', $getTutorCourse)->orderBy('course_name', 'ASC')->pluck('course_name', 'id');
        } else {
            return view('/pages/page-404');
        }
        return view('session.form', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getCourse' => $getCourse, 'getGrades' => $getGrades]);
    }

    public function index() {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $timePeriod = $courseID = $searchEndDate = '';
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
                        $timePeriod .= "<option value=''>Select Course</option>";
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
                        $getsessionData = StudentSession::where(['student_id' => $studKey, 'course_id' => $courseID, 'status' => 'Active'])
                                ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                                ->orderBy('session_date', 'Desc')
                                ->get();
                    }
                    $i++;
                }
            }
        }
        return view('session.index', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data, 'timePeriod' => $timePeriod]);
    }

    public function tutorView() {
        // custom body class
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = $searchDate = $timePeriod = $courseID = $searchEndDate = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->status == 'Active') {
            $getTutorsStudents = StudentCourseTutor::where(['tutor_id' => $userID])->pluck('student_id');
            $getStudents = Student::where(['status' => 'Active'])->whereIn('id', $getTutorsStudents)->orderBy('name', 'ASC')->pluck('name', 'id');
            if (isset($getStudents)) {
                $i = 0;
                foreach ($getStudents as $studKey => $getStudentsVal) {
                    if ($i == 0) {

                        $getCourseDetail = StudentCourseTutor::where(['student_id' => $studKey, 'tutor_id' => $userID])->get();
                        $getTimePeriod = array("2" => "This Month", "3" => "This Week", "4" => "Last Week", "5" => "Last Month", "6" => "View All");
                        $timePeriod = '';
                        $timePeriod .= "<option value=''>Select Timeperiod</option>";
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
                        $getsessionData = StudentSession::where(['student_id' => $studKey, 'tutor_id' => $userID, 'course_id' => $courseID, 'status' => 'Active'])
                                ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                                ->orderBy('session_date', 'Desc')
                                ->get();
                    }
                    $i++;
                }
            }
        }
        return view('session.tutorview', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getsessionData' => $getsessionData, 'data' => $data, 'timePeriod' => $timePeriod]);
    }

    public function getStudents(Request $request) {
        $courseID = $request->course_id;
        $userID = $request->userID;
        $data = '';
        $getCourseDetail = StudentCourseTutor::where(['course_id' => $courseID, 'tutor_id' => $userID])->get();
        if (isset($getCourseDetail) && count($getCourseDetail) > 0) {
            foreach ($getCourseDetail as $key => $val) {
                if (isset($val->getStudentDetail)) {
                    $data .= "<option value=" . $val->student_id . ">" . strtoupper($val->getStudentDetail->name) . "</option>";
                }
            }
        }
        return $data;
    }

    public function getTutorList(Request $request) {
        $courseID = $request->course_id;
        $userID = Auth::user()->id;
        $data = '';
        $getTutorCourse = TutorCourse::where(['course_id' => $courseID])->with('getTutorDetail')->get()->sortBy('getTutorDetail.name');
        $data .= "<option value=''>Select Tutor</option>";
        if (isset($getTutorCourse) && count($getTutorCourse) > 0) {
            foreach ($getTutorCourse as $key => $val) {
                if (isset($val->getTutorDetail)) {
                    $data .= "<option value=" . $val->tutor_id . ">" . strtoupper($val->getTutorDetail->name) . "</option>";
                }
            }
        }
        return $data;
    }

    public function getLessonPlan(Request $request) {
        $courseID = $request->course_id;
        $studentID = $request->student_id;

        $data = '';
        // $getLessonDetail =  DB::table('lesson_plan')
        //       ->leftjoin('student_lesson_tutor_assignment AS B', 'B.lesson_id', '=','lesson_plan.id')
        //       ->select('lesson_plan.id','lesson_plan.topic_name')
        //       ->where('B.student_id',$studentID)
        //       ->where('B.course_id',$courseID)
        //       ->get();
        $getLessonDetail = LessonPlan::where(['course_id' => $courseID, 'status' => 'Active'])->groupBy('topic_name')->get();
        $data .= "<option value=''>Select Topic</option>";
        foreach ($getLessonDetail as $key => $val) {
            $data .= "<option value=" . $val->id . ">" . strtoupper($val->topic_name) . "</option>";
        }
        return $data;
    }

    public function setCloneData(Request $request) {
        $studID = $request->studID;
        $courseID = $request->course_id;
        $data = array();
        $getsessionData = StudentSession::where(['student_id' => $studID, 'status' => 'Active'])
                ->orderBy('id', 'Desc')
                ->first();
        $data['topic'] = isset($getsessionData->getLessonDetail->topic_name) ? "<option selected value=" . $getsessionData->lesson_id . ">" . strtoupper($getsessionData->getLessonDetail->topic_name) . "</option>" : '';
        $data['subTopic'] = isset($getsessionData->getLessonPlanDetail->description) ? "<option selected value=" . $getsessionData->lesson_detail_id . ">" . strtoupper($getsessionData->getLessonPlanDetail->description) . "</option>" : '';
        $data['sessionNotes'] = isset($getsessionData->session_notes) ? $getsessionData->session_notes : '';
        $data['isDemo'] = isset($getsessionData->demo) && $getsessionData->demo == 'Yes' ? 'on' : 'off';
        $data['isDelay'] = isset($getsessionData->isDelay) && $getsessionData->isDelay == 'Yes' ? 'on' : 'off';
        return json_encode($data);
    }

    public function getLessonPlanDetails(Request $request) {
        $lesson_id = $request->lesson_id;
        $data = '';
        $getLessonPlanDetail = LessonPlanDetails::where(['lesson_id' => $lesson_id, 'status' => 'Active'])->orderBy('description', 'ASC')->get();
        $data .= "<option value=''>Select Sub-Topic</option>";
        foreach ($getLessonPlanDetail as $key => $val) {
            $data .= "<option value=" . $val->id . ">" . strtoupper($val->description) . "</option>";
        }
        return $data;
    }

    public function getCourse(Request $request) {
        $studentID = $request->stud_id;
        $data = '';
        $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();
        $data .= "<option value=''>Select Course</option>";
        foreach ($getCourseDetail as $key => $val) {
            $data .= "<option value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
        }
        return $data;
    }

    public function getTutorCourse(Request $request) {
        $studentID = $request->stud_id;
        $userID = $request->userID;
        $data = '';
        $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where(['student_id' => $studentID, 'tutor_id' => $userID])->get();
        $data .= "<option value=''>Select Course</option>";

        foreach ($getCourseDetail as $key => $val) {
            if (isset($val->getCourseDetail)) {
                if ($key == 0) {
                    $courseID = $val->course_id;
                    $selected = "selected";
                } else {
                    $selected = '';
                }
                $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
            }
        }
        return $data;
    }

    public function storeSessionNotes(Request $request) {
        $filesListArr = array();
        if (isset($request->student)) {
            foreach ($request->student as $keyStud => $value) {
//                  echo '<pre>';
//        print_r($request->all());
//        die;
                $time = isset($request->timepicker) ? date("H:i:s", strtotime($request->timepicker)) : '';
                $addSessionData = new StudentSession();
                $findLessonTopic = LessonPlan::find($request->topic);
                $addData['course_id'] = $request->course;
                $addData['lesson_id'] = $request->topic;
                $addData['isDelay'] = isset($request->isDelay) && $request->isDelay == 'on' ? 'Yes' : 'No';
                $addData['topic_name'] = isset($findLessonTopic->topic_name) ? $findLessonTopic->topic_name : '';
                $addData['tutor_id'] = Auth::user()->id;
                $addData['lesson_detail_id'] = $request->subTopic;
//                $addData['session_date'] = date('Y-m-d', strtotime($request->session_date));
                $addData['session_date'] = isset($time) ? date('Y-m-d', strtotime(str_replace("/", "-", $request->session_date))) . ' ' . $time : date('Y-m-d', strtotime(str_replace("/", "-", $request->session_date)));
                $addData['session_notes'] = $request->session_notes;
                $addData['status'] = 'Active';
                $addData['demo'] = isset($request->demo) && $request->demo == 'on' ? 'Yes' : 'No';
                $addData['student_id'] = $value;
                $addSessionData->create($addData);
                $lastInsertedID = DB::getPdo()->lastInsertId();
                $updateSessionData = StudentSession::find($lastInsertedID)->update(['attachment_id' => $lastInsertedID]);
                if (isset($request->browseFileType) && $request->browseFileType != '') {
                    $fileName = '';
                    if ($request->browseFileType == 1) {
                        $fileName = "internal/uploads/" . Auth::user()->username . "/" . $request->fileSelected;
                    } else {
                        $grade = $request->selectedGrade;
                        $getGrade = Grades::find($grade);
                        $gradeName = isset($getGrade->name) ? $getGrade->name : '';
                        $fileName = "internal/uploads/system/" . $gradeName . "/" . $request->fileSelected;
                    }
//print_r($fileName); die;
                    $addAttachment = new TutorHWAttachment();
                    $addAttachment->attachment_id = $lastInsertedID;
                    $addAttachment->session_id = $lastInsertedID;
                    $addAttachment->sl_no = 1;
                    $addAttachment->attachment_link = $fileName;
                    $addAttachment->save();
                }
            }

            return redirect('post-session-notes')->with('success', 'Session added successfully');
        }
    }

    public function getSession(Request $request) {
        $courseID = $request->course_id;
        $studentID = $request->studentID;
        $input = $request->timePeriod;
        $getsessionData = array();
        $query = StudentSession::where(['student_id' => $studentID, 'status' => 'Active']);

        if ($courseID != '') {
            $query->where('course_id', $courseID);
        }

        $searchDate = $searchEndDate = '';
        if ($input != '') {
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
                        ->orderBy('session_date', 'Desc')
                        ->get();
            }
        } else {
            $getsessionData = $query->orderBy('session_date', 'Desc')->get();
        }
        $view = view('session.sessionDetailView', ['getsessionData' => $getsessionData, 'input' => $input])->render();
        return $view;
    }

    public function getTutorSession(Request $request) {
        $courseID = $request->course_id;
        $studentID = $request->studentID;
        $input = $request->timePeriod;
        $userID = $request->userID;
        $getsessionData = array();
        $query = StudentSession::where(['student_id' => $studentID, 'status' => 'Active']);

        if ($courseID != '') {
            $query->where('course_id', $courseID);
        }if ($courseID != '') {
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
        if ($input != '') {
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
                        ->orderBy('session_date', 'Desc')
                        ->get();
            }
        } else {
            $getsessionData = $query->orderBy('session_date', 'Desc')->get();
        }
        $view = view('session.sessionTutorDetailView', ['getsessionData' => $getsessionData, 'input' => $input])->render();
        return $view;
    }

    public function getTimePeriodData(Request $request) {
        $input = $request->timePeriod;
        $courseID = $request->course;
        $studentID = $request->studentID;
        $searchDate = $searchEndDate = '';
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
        $getsessionData = array();
        if ($input == 6) {
            if ($courseID != '') {
                $getsessionData = StudentSession::where(['student_id' => $studentID, 'course_id' => $courseID, 'status' => 'Active'])->orderBy('session_date', 'Desc')->get();
            } else {
                $getsessionData = StudentSession::where(['student_id' => $studentID, 'status' => 'Active'])->orderBy('session_date', 'Desc')->get();
            }
        } else {
            if ($courseID != '') {
                $getsessionData = StudentSession::where(['student_id' => $studentID, 'course_id' => $courseID, 'status' => 'Active'])
                        ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                        ->orderBy('session_date', 'Desc')
                        ->get();
            } else {
                $getsessionData = StudentSession::where(['student_id' => $studentID, 'status' => 'Active'])
                        ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                        ->orderBy('session_date', 'Desc')
                        ->get();
            }
        }

//echo '<pre>';
//print_r($getsessionData); die;
        $view = view('session.sessionDetailView', ['getsessionData' => $getsessionData])->render();
        return $view;
    }

    public function upcomingSessionIndex(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        $getStudents = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
        }
        return view('session.upcomingsessionindex', ['getStudents' => $getStudents]);
    }

    public function upcomingSession(Request $request) {
        $studID = $request->stud_id;
        $getStudData = Student::find($studID);
        if (is_object($getStudData)) {
            $endpoint = "https://acuityscheduling.com/api/v1/appointments";
            $client = new \GuzzleHttp\Client();
            $firstName = $getStudData->firstName;
            $lastName = $getStudData->lastName;
            $max = '';
            $headers = [
                'Authorization' => 'Basic MTg4NTI4MjM6YmM1OWFlMDgyMzYwMWU1YTFjZTE3MmRhYjE1MjIxYzc=',
            ];
            $response = $client->request('GET', $endpoint, [
                'headers' => $headers,
                'query' => [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'max' => $max,
            ]]);

            $statusCode = $response->getStatusCode();
            $content = json_decode($response->getBody());
            $view = view('session.upcomingSession', ['content' => $content])->render();
            return $view;
        }
    }

    public function upcomingSessionTutor(Request $request) {
        $userID = Auth::user()->id;
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {
            $endpoint = "https://acuityscheduling.com/api/v1/appointments";
            $client = new \GuzzleHttp\Client();
            $calenderID = Auth::user()->calender_id;
            if ($calenderID == '') {
                return view('/pages/page-404');
            }
            $max = '';
            $headers = [
                'Authorization' => 'Basic MTg4NTI4MjM6YmM1OWFlMDgyMzYwMWU1YTFjZTE3MmRhYjE1MjIxYzc=',
            ];
            $response = $client->request('GET', $endpoint, [
                'headers' => $headers,
                'query' => [
                    'calendarID' => $calenderID,
                    'max' => $max,
            ]]);

            $statusCode = $response->getStatusCode();
            $content = json_decode($response->getBody());
//            echo "<pre>";
//            print_r($content); die;
            $view = view('session.upcomingSessionTutor', ['content' => $content])->render();
            return $view;
        } else {
            return view('/pages/page-404');
        }
    }

}
