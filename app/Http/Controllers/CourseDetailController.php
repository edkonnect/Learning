<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\StudentLessonTutorAssignment;
use App\Models\StudentCourseTutor;
use App\Models\Student;
use App\Models\LessonPlanDetails;
use App\Models\LessonPlan;
use Illuminate\Http\Request;
use Auth;
use DateTime;

class CourseDetailController extends Controller {

    public function index(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getStudLessonData = array();
        $userID = Auth::user()->id;
        $data = $courseID = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $i = 0;
                foreach ($getStudents as $key => $getStudentsVal) {
                    if ($i == 0) {

                        $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $key)->get();
                        $data = '';
                        $data .= "<option value=''>Select Course</option>";
                        foreach ($getCourseDetail as $keyVal => $val) {
                            if ($keyVal == 0) {
                                $courseID = $val->course_id;
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                        }
                        $getStudLessonData = StudentLessonTutorAssignment::where(['student_id' => $key, 'course_id' => $courseID])->get();
                    }

                    $i++;
                }
            }
        }
        return view('coursedetail.index', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getStudLessonData' => $getStudLessonData, 'data' => $data]);
    }

    public function getLessonList(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];        
        $data = $courseID = '';
        $studentID = $request->studentID;
        $courseID = $request->course;
        $getStudents = $getStudLessonData = array();
        $userID = Auth::user()->id;
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getStudents = Student::where(['parent_id' => $userID, 'status' => 'Active'])->pluck('name', 'id');
            if (isset($getStudents)) {
                $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();
                $data = '';
                $data .= "<option value=''>Select Course</option>";
                foreach ($getCourseDetail as $keyVal => $val) {
                    if ($keyVal == $courseID) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $data .= "<option " . $selected . " value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
                }
                $getStudLessonData = StudentLessonTutorAssignment::where(['student_id' => $studentID, 'course_id' => $courseID])->get();
            }
        }

        $view= view('coursedetail.lessonDetailView', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getStudLessonData' => $getStudLessonData, 'data' => $data])->render();
         return $view;
    }

}
