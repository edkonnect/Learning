<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Student;
use App\Models\User;
use App\Models\StudentCourseTutor;
use App\Models\Assessment;

use App\Models\StudentSession;
use App\Models\CustomDashboardData;
use App\Models\StudentAnalytics;
use App\Models\Invoices;
use App\Models\StudentSessionPerformance;
use Carbon\Carbon;
use Session;
use DB;

class DashboardController extends Controller {

    public function index(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
//        echo '<pre>';
//        print_r($getCourseDetail);
//        die;

       $user =Auth::user();
       $name=$user->username;
           $dt = Carbon::now();
           Session::put('user',$user);
           $user=Session::get('user');
           //$login_time=toDayDateTimeString();
           //dd($dt);
           $activitylog =[
             'user_name'=>$name,
             'login_time'=>$dt,
           ];
           DB::table('activity_logs')->insert($activitylog);


        $getStudents = $customDashboardData = $studentAnalytics = $studentSessionPerformance = $getsessionData = $getNoofsessionCompleted = array();
        $userID = Auth::user()->id;
        $data = $hs = $skills = $assessments= $searchDate = $courseID = $timePeriod = $searchEndDate = '';
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
                        $hs =StudentSession::where(['course_id' => $courseID, 'student_id' => $studKey]);
                        //dd($hours);
                        $hours =$hs->count();
                        $assessments = Assessment::where(['course_id' => $courseID, 'student_id' => $studKey]);
                        $assessment = $assessments->count();
                        $skills = StudentSession::where(['course_id' => $courseID, 'student_id' => $studKey])->DISTINCT('topic_name');
                        $skill = $skills->count();
                        $customDashboardData['typeOne'] = CustomDashboardData::where(['status' => 'Active', 'type' => 1])->get();
                        $customDashboardData['typeTwo'] = CustomDashboardData::where(['status' => 'Active', 'type' => 2])->get();
                        $customDashboardData['typeThree'] = CustomDashboardData::where(['status' => 'Active', 'type' => 3])->get();
                        $studentSessionPerformance = StudentSessionPerformance::where(['status' => 'Active', 'course_id' => $courseID, 'student_id' => $studKey])->get();

                        $studentAnalytics = StudentAnalytics::where(['course_id' => $courseID, 'student_id' => $studKey])->first();
                    }

                    $i++;
                }
            }
            return view('dashboard.index', ['pageConfigs' => $pageConfigs, 'hours'=>$hours,'assessment'=>$assessment,'skill'=>$skill, $getsessionData, 'studentAnalytics' => $studentAnalytics, 'getStudents' => $getStudents, 'studentSessionPerformance' => $studentSessionPerformance, 'customDashboardData' => $customDashboardData, 'data' => $data, 'timePeriod' => $timePeriod]);

        } else {
            $searchDate = date('Y-m-01 00:00:00');
            $searchEndDate = date('Y-m-t 23:59:59');
            $getsessionData = StudentCourseTutor::where(['tutor_id' => $userID])->get()->sortBy('getStudentDetail.name');
            $getNoofsessionCompleted = StudentSession::where(['status' => 'Active', 'tutor_id' => $userID])
                            ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                            ->groupBy('student_id')
//                    ->orderBy('session_date','Desc')->get();

                            ->select('*','session_date as sessionDate', DB::raw('count(*) as totalSessions'))->get()->sortBy('getStudentDetail.name');
                            return view('dashboard.index', ['pageConfigs' => $pageConfigs, 'getNoofsessionCompleted' => $getNoofsessionCompleted, 'getsessionData' => $getsessionData,  'getStudents' => $getStudents, 'studentSessionPerformance' => $studentSessionPerformance, 'customDashboardData' => $customDashboardData, 'data' => $data, 'timePeriod' => $timePeriod]);

        }
    }

    public function getNumberOfSession(Request $request) {
        $input = $request->timePeriod;
        $userID = Auth::user()->id;
        $getsessionData = array();
        $query = StudentSession::where(['status' => 'Active', 'tutor_id' => $userID]);

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
                $getsessionData = StudentSession::where(['status' => 'Active', 'tutor_id' => $userID])->groupBy('student_id')
                            ->select('*','session_date as sessionDate', DB::raw('count(*) as totalSessions'))->get()->sortBy('getStudentDetail.name');
            } else {
                $getsessionData=StudentSession::where(['status' => 'Active', 'tutor_id' => $userID])
                        ->where('session_date', '>=', $searchDate)->where('session_date', '<=', $searchEndDate)
                            ->groupBy('student_id')
                            ->select('*','session_date as sessionDate', DB::raw('count(*) as totalSessions'))->get()->sortBy('getStudentDetail.name');
            }
        }else{
             $getsessionData = StudentSession::where(['status' => 'Active', 'tutor_id' => $userID])->groupBy('student_id')
                            ->select('*','session_date as sessionDate', DB::raw('count(*) as totalSessions'))->get()->sortBy('getStudentDetail.name');
        }
        $view = view('session.numberOfSessionView', ['getsessionData' => $getsessionData, 'input' => $input])->render();
        return $view;
    }

    public function userProfile(Request $request) {
        $getCourseDetail = $studValArr = array();
        $getUserData = User::find(Auth::user()->id);
        if (isset($getUserData) && $getUserData->roles == '3') {
            $studValArr = Student::where(['status' => 'Active', 'parent_id' => Auth::user()->id])->pluck('id');
            $getCourseDetail = StudentCourseTutor::whereIn('student_id', $studValArr)->orderBy('student_id','Asc')->get();
            $getInvoicesDetail = Invoices::where('user_id', Auth::user()->id)->get();
            return view('dashboard.user-profile', ['getUserData' => $getUserData, 'getCourseDetail' => $getCourseDetail, 'getInvoicesDetail' => $getInvoicesDetail]);
        } else {
            return view('dashboard.user-profile-tutor', ['getUserData' => $getUserData]);
        }
    }

    public function tutorProfileEdit($id) {
        $getCourseDetail = $studValArr = array();
        $userID = Auth::user()->id;
        if ($id == $userID) {
            $getUserData = User::find(Auth::user()->id);
            if (isset($getUserData) && $getUserData->roles == '2') {
                return view('dashboard.user-profile-edit', ['getUserData' => $getUserData]);
            } else {
                return view('/pages/page-404');
            }
        } else {
            return view('/pages/page-404');
        }
    }

    public function changePassword(Request $request) {
//        print_r($request->all()); die;
        $userData = User::findOrFail(Auth::user()->id);
        $newPassword = bcrypt($request->confirmPwd);
        $password_reset_at = date('Y-m-d h:i:s');
        $userData->update(['password' => $newPassword]);
        return 1;
    }

    public function showInvoice(Request $request) {
        return view('dashboard.app-invoice-view');
    }

    public function getTutorNotes(Request $request) {
        $inputVal = $request->inputVal;
        $studentSessionPerformance = StudentSessionPerformance::find($inputVal);
        $getNotes = isset($studentSessionPerformance->tutor_comments) ? $studentSessionPerformance->tutor_comments : '';
        return $getNotes;
    }

    public function getDashboardData(Request $request) {
        $courseID = $request->course;
        $studentID = $request->studentID;
        $customDashboardData = $studentSessionPerformance = array();
        $hs =StudentSession::where(['course_id' => $courseID, 'student_id' => $studentID]);
        //dd($hours);
        $hours =$hs->count();
        $assessments = Assessment::where(['course_id' => $courseID, 'student_id' => $studentID]);
        $assessment = $assessments->count();
        $skills = StudentSession::where(['course_id' => $courseID, 'student_id' => $studentID])->DISTINCT('topic_name');
        $skill = $skills->count();
        $customDashboardData['typeOne'] = CustomDashboardData::where(['status' => 'Active', 'type' => 1])->get();
        $customDashboardData['typeTwo'] = CustomDashboardData::where(['status' => 'Active', 'type' => 2])->get();
        $customDashboardData['typeThree'] = CustomDashboardData::where(['status' => 'Active', 'type' => 3])->get();
        $studentSessionPerformance = StudentSessionPerformance::where(['status' => 'Active', 'course_id' => $courseID, 'student_id' => $studentID])->get();
        $studentAnalytics = StudentAnalytics::where(['course_id' => $courseID, 'student_id' => $studentID])->first();
        $view = view('dashboard.dashboardDetailView', ['hours'=>$hours,'assessment'=>$assessment,'skill'=>$skill,'studentAnalytics' => $studentAnalytics, 'customDashboardData' => $customDashboardData, 'studentSessionPerformance' => $studentSessionPerformance])->render();
        return $view;
    }

    public function dashboardEcommerce() {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
    }

    public function dashboardAnalytics() {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
    }

    public function storeUserData(Request $request) {
//        echo '<pre>';
//        print_r($request->all());
//        die;

        $userID = Auth::user()->id;

        if (isset($userID) && Auth::user()->roles == '3') {
            $name = $request->name;
            $phone = $request->phone;

            if ($request->removeImg) {
                $addUserData['profile_image'] = '';
            }

            if ($_FILES['profile_image']['name'] != '') {
                $files_single = $request->file('profile_image');
                $filename = $files_single->getClientOriginalName();
                $extension = $files_single->getClientOriginalExtension();
                $picture_single = date('His') . Auth::user()->username . '_parent_' . rand(1000, 10000) . '.' . $extension;
                $destinationPath = base_path() . '/public/uploads/' . Auth::user()->username . '/profile_image';
                $files_single->move($destinationPath, $picture_single);
                $addUserData['profile_image'] = $picture_single;
            }
            $addData = User::find($userID);
            $addUserData['name'] = isset($name) ? $name : '';
            $addUserData['phone'] = isset($phone) ? $phone : '';
            $addData->update($addUserData);

            return redirect('messages')->with('success', 'Profile updated successfully');
        } elseif (isset($userID) && Auth::user()->roles == '2') {
            $name = $request->name;
            $phone = $request->phone;

            if ($request->removeImg) {
                $addUserData['profile_image'] = '';
            }
            if ($request->removeImgresume) {
                $addUserData['resume'] = '';
            }

            if ($_FILES['profile_image']['name'] != '') {
                $files_single = $request->file('profile_image');
                $filename = $files_single->getClientOriginalName();
                $extension = $files_single->getClientOriginalExtension();
                $picture_single = date('His') . Auth::user()->username . '_tutor_' . rand(1000, 10000) . '.' . $extension;
                $destinationPath = base_path() . '/public/uploads/' . Auth::user()->username . '/profile_image';
                $files_single->move($destinationPath, $picture_single);
                $addUserData['profile_image'] = $picture_single;
            }
            if ($_FILES['resume']['name'] != '') {
                $files_single = $request->file('resume');
                $filename = $files_single->getClientOriginalName();
                $extension = $files_single->getClientOriginalExtension();
                $picture_single_resume = date('His') . Auth::user()->username . '_tutor_' . rand(1000, 10000) . '.' . $extension;
                $destinationPath = base_path() . '/public/uploads/' . Auth::user()->username . '/resume';
                $files_single->move($destinationPath, $picture_single_resume);
                $addUserData['resume'] = $picture_single_resume;
            }
            $addData = User::find($userID);
            $addUserData['name'] = isset($name) ? $name : '';
            $addUserData['phone'] = isset($phone) ? $phone : '';
            $addUserData['no_of_years_taught'] = isset($request->no_of_years_taught) ? $request->no_of_years_taught : '';
            $addUserData['education_qualification'] = isset($request->education_qualification) ? $request->education_qualification : '';
            $addUserData['experience_summary'] = isset($request->experience_summary) ? $request->experience_summary : '';
            $addData->update($addUserData);

//            return redirect('messages')->with('success', 'Profile updated successfully');
        } else {
            return view('/pages/page-404');
        }
    }

    public function articles(Request $request) {
        $customDashboardData['typeOne'] = CustomDashboardData::where(['status' => 'Active', 'type' => 1])->get();
        $customDashboardData['typeTwo'] = CustomDashboardData::where(['status' => 'Active', 'type' => 2])->get();
        $customDashboardData['typeThree'] = CustomDashboardData::where(['status' => 'Active', 'type' => 3])->get();
        return view('dashboard.articles', ['customDashboardData' => $customDashboardData]);
    }
	 public function StudentAnalytics(Request $request){

      $pageConfigs = ['bodyCustomClass' => 'app-page'];


          $Students = Student::All()->pluck('name', 'id');
          $studentID = $request->stud_id;
          $data = '';
          $getCourseDetail = StudentCourseTutor::with('getCourseDetail')->where('student_id', $studentID)->get();
          $data .= "<option value=''>Select Course</option>";
          foreach ($getCourseDetail as $key => $val) {
              $data .= "<option value=" . $val->getCourseDetail->id . ">" . $val->getCourseDetail->course_name . "</option>";
          }




    return view('dashboard.StudentAnalytics', ['pageConfigs' => $pageConfigs, 'Students' => $Students,'data'=>$data]);
    }

    public function UploadAnalytics(Request $request){
    $now=Carbon::now();
    StudentAnalytics::insert([
            'student_id' => $request->student,
            'course_id' => $request->course,
            'proficiency_level'=> $request->performance,
            'participation_rate'=> $request->participation_rate,
            'created_at'=>$now,
            'updated_at'=>$now,




        ]);
    return Redirect()->back()->with('success','Student Analytics Updated Successfully');
    }



}
