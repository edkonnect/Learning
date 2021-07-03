<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\StudentCourseTutor;
use App\Models\StudentSession;
use App\Models\LessonPlan;
use App\Models\StudentHWAttachment;
use App\Models\TutorHWAttachment;
use Illuminate\Http\Request;
use Auth;
use DateTime;

class TestController extends Controller {

    public function index(Request $request) {
//        $getSession = StudentSession::get();
//        foreach ($getSession as $key => $value) {
//            $checkData = StudentCourseTutor::where(['student_id' => $value->student_id, 'course_id' => $value->course_id])->first();
//            if (!is_object($checkData)) {
//                $addUser = new StudentCourseTutor();
//                $addUser->student_id = $value->student_id;
//                $addUser->course_id = $value->course_id;
//                $addUser->tutor_id = $value->tutor_id;
//                $addUser->subscription = 'Yes';
//                $addUser->eff_date = date('Y-m-d');
//                $addUser->end_date = date('Y-m-d');
//                $addUser->save();
//            }
//        }
//        $getData=Tutor::get();
//        foreach ($getData as $key => $value) {
//            $deleteUser=User::where(['username'=>$value->username,'roles'=>3])->delete();
//            
//            $addUser=new User();
//            $addUser->name=$value->Name;
//            $addUser->username=$value->username;
//            $addUser->roles='2';
//            $addUser->phone='';
//            $addUser->profile_image='';
//            $addUser->parent_id='0';
//            $addUser->email='';
//            $addUser->password='$2y$10$Be//KzkB2UuK.X1g9XitQ.jn/mJu0QQP37EbC.c9LqtUOX3144uhe';
//            $addUser->password_old=$value->password;
//            $addUser->status="Active";
//            $addUser->save();
//            
//        }
        //TutorHWAttachment Entry
//        $getSession = StudentSession::get();
//        $noUserName = $userName = array();
//        foreach ($getSession as $key => $value) {
//            $getTutorUserName = isset($value->getTutorDetail->username) ? $value->getTutorDetail->username : '';
//            $addAttachment = new TutorHWAttachment();
//            if ($value->homework != '') {
//                $addAttachment->attachment_link = 'internal/uploads/' . $getTutorUserName . '/' . $value->homework;
//                if (strpos($value->homework, 'internal') !== false) {
//                    $addAttachment->attachment_link = $value->homework;
//                }
//            }
//            $addAttachment->attachment_id = $value->id;
//            $addAttachment->session_id = $value->id;
//            $addAttachment->sl_no = 1;
//            $addAttachment->attachment_link_old = $value->homework;
//            $addAttachment->save();
//        }
    }

}
