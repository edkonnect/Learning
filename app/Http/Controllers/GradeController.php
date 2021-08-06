<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class GradeController extends Controller
{
  public function index(Request $request) {
    $userID=Auth::User()->id;
    $getUserData = User::find($userID);
    if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {

    $path = "grade7-8/pdf/";
    $files = scandir($path);
    $view = view('grade.grade7-8', ['files' => $files])->render();

    return $view;
  }
  else {
      return view('/pages/page-404');
  }
}
public function indexEng(Request $request) {
  $userID=Auth::User()->id;
  $getUserData = User::find($userID);
  if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {

  $path = "ELAGR7-10/";
  $files = scandir($path);
  $view = view('grade.grade7-10', ['files' => $files])->render();

  return $view;
}
else {
    return view('/pages/page-404');
}
}
public function SatEng(Request $request){
  $path = "SATENG/";
  $files = scandir($path);
  $view = view('grade.SatEng', ['files' => $files])->render();

  return $view;
}
}
