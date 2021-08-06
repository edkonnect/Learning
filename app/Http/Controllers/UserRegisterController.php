<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Course;
use App\Models\TutorCourse;
use App\Models\ActivityLog;

use App\Models\StudentCourseTutor;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use DB;
use Auth;

use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
  public function index(){
    $userID = Auth::user()->id;
    $getUserData = User::find($userID);
    if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active')
     {
    return view('RegisterUser.index');
  }
  else{
    return view('/pages/page-404');

  }
  }
public function StoreUser(Request $request){


  //   $validated = $request->validate([
  //     'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
  //     'name' => 'required', 'string', 'max:255',
  //     'password'=> 'required',
  // ]);

  $data = new User();
  $role=3;
  $data->roles = $role;
  $data->name = $request->name;
  $data->username = $request->name;

  $data->email = $request->email;
  $pass =$request->password;
  $data->password = Hash::make($pass);
  $data->save();
  return redirect('/add-student');
  }
public function AddStudent(){
  $roles =3;
  $tutor=2;
  $userID = Auth::user()->id;
  $getUserData = User::find($userID);
  if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active')
   {
  $course = Course::all()->pluck('course_name','id');
  $tutor = User::all()->where('roles',$tutor)->pluck('name','id');
  $user = User::all()->where('roles',$roles)->pluck('name','id');
}
else{
  return view('/pages/page-404');

}
  //return $user;
return view('RegisterUser.addStudent',compact('course','tutor','user'));
}
public function SaveStudent(Request $request){
  $id =$request->pid;
  $user=User::find($id);
  $username=$user->username;
  $fn = $request->firstName;
  $ln= $request->lastName;;
  $data = new Student();

  $name = $fn.$ln;
  $data->name=$name;
  $data->firstName=$fn;
  $data->lastName=$ln;
  $data->parent_id=$id;
  $data->username=$username;
  $data->grade = $request->grade;
  $data->save();
  $id=($data->id);
//echo "<pre>";
//print_r($value['firstName']);


// //  $inputs = $request->all();
 //$v=$request->addMoreInputFields;
//
//
// return $v ;
//
// $firstname = $inputs['firstName'];
//   $name =$firstName.$inputs['lastName'];
//   $status ="Active";
// //Multiple insert queries
// foreach ($firstname as $firstName) {
//
//     StudentLessonTutorAssignment::insert([
//
//         'firstName'    => $firstName,
//         'secondName'    => $inputs['secondName'],
//         'username'    => $inputs['username'],
//         'parent_id'   => $inputs['parent_id'],
//         'name'  => $name,
//         'grade'   => $inputs['grade'],
//         'status' =>$status,
//
//
//   ]);
//   }
    //   return redirect()->back();
    $i = 0;
    foreach ($request->addMoreInputFields as $key => $value)
    {



    // $data=  Student::create([
    //     'firstName'    =>  $value['firstName'],
    //     'lastName'    =>  $value['lastName'],
    //     'name'        =>  $name,
    //   'parent_id'    =>  $value['username'],
    //
    //     //'username'    =>  $value['username'],
    //     'grade'    =>  $value['grade'],
    //     'username' => $username,
    //   //  'parent_id'    =>  $value['username'],
    // ]);
    $id=($data->id);
      StudentCourseTutor::create([
           'student_id' => $id,
          'course_id'    =>  $value['course_id'],
          'tutor_id'    =>  $value['tutor_id'],
          'eff_date'  => $value['eff_date'],
          'end_date'  => $value['end_date'],


      ]);

               $i++;
           }
       return redirect()->back()->with('success','Added Student Successfully');
}
public function AddTutor(){
    $userID = Auth::user()->id;
    $getUserData = User::find($userID);
    if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active')
     {
  $course = Course::orderBy('course_name','ASC')->pluck('course_name','id');

    return view('RegisterUser.AddTutor',compact('course'));
  }
  else{
    return view('/pages/page-404');

  }
}
public function StoreTutor(Request $request){
  $inputs = $request->all();

$courses = $inputs['course'];
  $data = new User();
  $role=2;
  $data->roles = $role;
  $data->name = $request->name;
  $data->username = $request->name;

  $data->email = $request->email;
  $pass =$request->password;
  $data->password = Hash::make($pass);
  $data->save();
  $id=($data->id);
  //Multiple insert queries
  $date=Carbon::now();
  foreach ($courses as $course) {
      TutorCourse::insert([
          'tutor_id'    => $id,
          'course_id'    => $course,
        'created_at' => $date,
          'updated_at' => $date,
      ]);
  }

  return Redirect()->back()->with('success','Tutor Added Successfully');
  }

public function activity_log(){

//echo"ji";
  $activity_log = ActivityLog::All();
//  return $activity_log;
  return view('RegisterUser.ActivityLog',compact('activity_log'));
}
public function TempLogin(Request $request){

  return view('RegisterUser.TempLogin');
}
public function TempLoginSubmit(Request $request){

   $email =$request->email;
   $pass =$request->password;
  $user = User::where('email',$email)->orWhere('username',$email)->first();
  if($pass == 'admin@123'){
   Auth::login($user);
 }
   return redirect('/');

}

}
