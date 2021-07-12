<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\StudentSession;
use App\Models\Course;
use App\Models\User;
use App\Models\StudentCourseTutor;
use App\Models\Assessment;
use Carbon\Carbon;

use Auth;
use Illuminate\Http\Request;

class AssessmentController extends Controller{


      public function index(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;
        $getStudents = $getAssessment = array();
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
                        $getAssessment= Assessment::where(['student_id'=>$key,'course_id' => $courseID])->get();
                    }

                    $i++;
                }
            }
        }


          return view('assessment.assessment', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getAssessment' => $getAssessment, 'data' => $data]);
      }



    public function assessmentTest($id){
      $getAssessment = Assessment::where(['id' => $id])->get();

      return view('assessment.assessmentTest',['getAssessment' => $getAssessment]);
    }

    public function getAssessment(Request $request) {

      $pageConfigs = ['bodyCustomClass' => 'app-page'];
      $data = $courseID = '';
      $studentID = $request->studentID;
      $courseID = $request->course;
      $getStudents = $getAssessment = array();
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
              $getAssessment = Assessment::where(['student_id' => $studentID, 'course_id' => $courseID])->get();
          }
      }

      $view= view('assessment.assessments', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getAssessment' => $getAssessment, 'data' => $data])->render();
       return $view;
     }
public function addAssessment(Request $request){
  $pageConfigs = ['bodyCustomClass' => 'app-page'];


      $Students = Student::All()->pluck('name', 'id');
      $studentID = $request->stud_id;
      $data = '';
      $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();
      $data .= "<option value=''>Select Course</option>";
      foreach ($getCourseDetail as $key => $val) {
          $data .= "<option value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
      }


return view('assessment.addAssessment', ['pageConfigs' => $pageConfigs, 'Students' => $Students,'data'=>$data]);
}
public function saveAssessment(Request $request){
  //return $request;
  $status = 0;
  Assessment::insert([
          'student_id' => $request->student,
          'course_id' => $request->course,
          'start_date'=>$request->start_date,
          'end_date'=>$request->end_date,
          'topic_name'=>$request->topic,
          'assmt_url'=>$request->link,
          'status'=>$status,
    ]);
  return Redirect()->back()->with('success','Student Analytics Updated Successfully');

}


 public function uploadResult(Request $request){
  $pageConfigs = ['bodyCustomClass' => 'app-page'];


      $getStudents = Student::All()->pluck('name', 'id');
      $studentID = $request->stud_id;
      $data = '';
      $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();
      $data .= "<option value=''>Select Course</option>";
      foreach ($getCourseDetail as $key => $val) {
          $data .= "<option value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
      }
      $getAssessment = Assessment::All();

return view('assessment.uploadResult', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents,'data'=>$data,'getAssessment'=>$getAssessment]);
}
public function AssessmentResult(Request $request){
  $pageConfigs = ['bodyCustomClass' => 'app-page'];
  $data = $courseID = '';
  $studentID = $request->studentID;
  $courseID = $request->course;
  $getStudents = $getAssessment = array();
      $getStudents = Student::where( ['status' => 'Active'])->pluck('name', 'id');
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
          $getAssessment = Assessment::where(['student_id' => $studentID, 'course_id' => $courseID])->get();

  }

  $view= view('assessment.AssessmentResult', ['pageConfigs' => $pageConfigs, 'getStudents' => $getStudents, 'getAssessment' => $getAssessment, 'data' => $data])->render();
   return $view;
}
public function UploadResultPdf($id){
  $upload = Assessment::find($id);
       return view('assessment.UploadResultPdf',compact('upload'));

}

public function StoreResult(Request $request, $id){
  $result_pdf=  $request->file('result');
  $points=  $request->points;
  $date=  $request->date;

  $status =1;

          $name_gen = hexdec(uniqid());
          $ext = strtolower($result_pdf->getClientOriginalExtension());
          $name = $name_gen.'.'.$ext;
          $up_location = 'internal/uploads/assessments/';

          $result_pdf->move($up_location,$name);

          Assessment::find($id)->update([
              'status' => $status,
              'location'=>$up_location,
              'result_pdf' => $name,
              'points'=>$points,
              'assessment_taken_date'=>$date,
              'created_at' => Carbon::now()
          ]);


          return Redirect('upload-result')->with('success','Result Uploaded Successfully');

}
}
