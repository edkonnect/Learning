<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Tutor;

use App\Models\Course;
use App\Models\StudentCourseTutor;

use App\Models\User;
use App\Models\Student;
use DB;
use Auth;

use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
  public function index(){
    return view('RegisterUser.index');
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
  $course = Course::all()->pluck('course_name','id');
  $tutor = User::all()->where('roles',$tutor)->pluck('name','id');
  $user = User::all()->where('roles',$roles)->pluck('name','username');
  //return $user;
  return view('RegisterUser.addStudent',compact('course','tutor','user'));
}
public function SaveStudent(Request $request){
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
//echo "<pre>";
//print_r($value['firstName']);
$name = $value['firstName']."  ".$value['lastName'];

$data=  Student::create([
    'firstName'    =>  $value['firstName'],
    'lastName'    =>  $value['lastName'],
    'name'    =>  $name,
    'username'    =>  $value['username'],
    'grade'    =>  $value['grade'],
  //  'parent_id'    =>  $value['id'],
]);
$id=($data->id);
  StudentCourseTutor::create([
       'student_id' => $id,
      'course_id'    =>  $value['course_id'],
      'tutor_id'    =>  $value['tutor_id'],
      'eff_date'  => $value['eff_date'],
      'end_date'  => $value['end_date'],


  ]);
//print_r($name);
//$name =
  //print_r($request->addMoreInputFields);
//  exit();
          // Student::create($value);
           $i++;
       }
    //   exit();
//$lastRecord = Student::latest()->first();
       // foreach ($request->addMoreInputFields as $key => $value)
       // {
       //
       //
       //
       //   //print_r($request->addMoreInputFields);
       // //  exit();
       //            StudentCourseTutor::create($value);
       //        }
       //        return redirect()->back();
       return redirect()->back()->with('success','Added Student Successfully');
}

}
