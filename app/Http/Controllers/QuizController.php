<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\StudentLessonTutorAssignment;
use App\Models\StudentCourseTutor;
use App\Models\Student;
use App\Models\Quizes;
use App\Models\LessonPlanDetails;
use App\Models\LessonPlan;
use Illuminate\Http\Request;
use Auth;
use DateTime;

class QuizController extends Controller {

    public function index(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getQuizesData = array();
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
                        $getData = Quizes::where(['course_id' => $courseID, 'status' => 'Active'])->orderBy('id', 'Desc')->get();
                    }

                    $i++;
                }
            }
        }
        return view('quizes.index', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getData' => $getData, 'data' => $data]);
    }

    public function getQuizesList(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        $data = $courseID = '';
        $studentID = $request->studentID;
        $courseID = $request->course;
        $getStudents = $getData = array();
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
                $getData = Quizes::where(['course_id' => $courseID, 'status' => 'Active'])->orderBy('id', 'Desc')->get();
            }
        }

        $view = view('quizes.quizDetailView', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getData' => $getData, 'data' => $data])->render();
        return $view;
    }

    public function startQuiz($id) {
        $getData = Quizes::find($id);
        if (isset($getData)) {
            return view('quizes.startQuiz',['getData'=>$getData]);
        } else {
            return redirect('quizes')->with('error', 'Quizlet not found');
        }
    }

}
