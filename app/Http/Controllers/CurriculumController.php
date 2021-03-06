<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use App\Models\StudentLessonTutorAssignment;
use App\Models\LessonPlan;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;

class CurriculumController extends Controller{

    public function index(Request $request) {
      $userID = Auth::user()->id;
      $getUserData = User::find($userID);

      if (is_object($getUserData) && $getUserData->roles == '2'  && $getUserData->status == 'Active') {

          $pageConfigs = ['bodyCustomClass' => 'app-page'];

          $request->student;
          $course = $request->course;
              $Students = Student::orderBy('name','ASC')->pluck('name', 'id');
              $Courses = Course::orderBy('course_name','ASC')->pluck('course_name','id');


$lesson = LessonPlan::where('course_id',$course)->orderBy('topic_name','ASC')->groupBy('topic_name')->pluck("topic_name","id");

               }
  else {
  return view('/pages/page-404');
   }
      return view('curriculum.index', ['pageConfigs' => $pageConfigs, 'Students' => $Students, 'Courses' => $Courses,'lesson'=>$lesson]);
}


 public function AssignCurriculum(Request $request)
 {
   $pageConfigs = ['bodyCustomClass' => 'app-page'];

   $student = $request->student;
   $course = $request->course;
   $userID = Auth::user()->id;
   $getUserData = User::find($userID);

   if (is_object($getUserData) && $getUserData->roles == '2'  && $getUserData->status == 'Active') {

   $res =  DB::table('lesson_plan')
         ->leftjoin('student_lesson_tutor_assignment AS B', 'B.lesson_id', '=','lesson_plan.id')
         ->select('lesson_plan.id','lesson_plan.topic_name')
         ->where('B.student_id',$student)
         ->where('B.course_id',$course)
         ->orderBy('topic_name','ASC')
         ->get();

  $lesson = LessonPlan::where('course_id',$course)->orderBy('topic_name','ASC')->groupBy('topic_name')->pluck("topic_name","id");
}
 return view('curriculum.getCurriculum', ['pageConfigs' => $pageConfigs, 'lesson'=>$lesson,'res'=>$res]);

 }

public function Upload(Request $request){
  $inputs = $request->all();

$lessons = $inputs['lesson'];

//Multiple insert queries
foreach ($lessons as $lesson) {
    StudentLessonTutorAssignment::insert([
        'student_id'    => $inputs['student'],
        'tutor_id'    => Auth::user()->id,
        'lesson_id'   => $lesson,
        'course_id'  => $inputs['course'],
        'start_date' => $inputs['start_date'],
        'end_date'     => $inputs['end_date'],
    ]);
}

return Redirect()->back()->with('success','Curriculum Updated Successfully');
}


public function createLesson(){

      $Courses = Course::orderBy('course_name','ASC')->pluck('course_name','id');
      return view('curriculum.createLesson',compact('Courses'));
}

public function lessonUpload(Request $request){

  $inputs = $request->all();

$grades = $inputs['grade'];

//Multiple insert queries
foreach ($grades as $grade) {
    LessonPlan::insert([
        'course_id'  => $inputs['course'],
        'topic_name' => $inputs['lesson_name'],
        'descr'     => $inputs['lesson_description'],
        'grade'   => $grade,
    ]);
}


return Redirect()->back()->with('success','Curriculum Updated Successfully');
}

    }
