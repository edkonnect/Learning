<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\StudentCourseTutor;
use App\Models\PrintableTopicsFiles;
use App\Models\PrintableTopics;
use Illuminate\Http\Request;
use Auth;
use DateTime;

class PrintablesController extends Controller {

    public function index(Request $request) {
        $pageConfigs = ['bodyCustomClass' => 'app-page'];
        $getCourseDetail = $getsessionData = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getCourseDetail = Course::where('status','Active')->orderBy('course_name', 'Asc')->get();
        }
        return view('printables.index', ['getCourseDetail' => $getCourseDetail]);
    }

    public function getTopics(Request $request) {
        $courseID = $request->course_id;
        $getTopicDetails = array();
        $getTopicDetails = PrintableTopics::where(['status'=>'Active','course_id'=>$courseID])->get();
        $view = view('printables.topicsList', ['getTopicDetails' => $getTopicDetails])->render();
        return $view;
    }

}
