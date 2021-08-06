<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Messages;
use App\Models\MessagesReason;
use App\Models\MessagesReply;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DateTime;
use DB;

class MessagesController extends Controller {

    public function index(Request $request) {
        $getData = $getReasons = array();
        $userID = Auth::user()->id;
        $data = '';
        $getUserData = User::find($userID);
        if (is_object($getUserData) && $getUserData->roles == '3' && $getUserData->status == 'Active') {
            $getData = Messages::where(['user_id' => $userID])->orderBy('date', 'Desc')->get();

            $getReasons = MessagesReason::where(['status' => 'Active'])->pluck('reason', 'id');
        } else {
            return redirect('messages')->with('error', 'Your not allowed to perform this action');
        }
        return view('messages.index', ['getData' => $getData, 'getReasons' => $getReasons, 'pkID' => ""]);
    }

    public function edit($id) {
        $getData = Messages::find($id);
        if (isset($getData) && $getData->status == 'Closed') {
            return redirect('messages')->with('error', 'Your not allowed to perform this action');
        }
        $getReasons = MessagesReason::where(['status' => 'Active'])->pluck('reason', 'id');
        if (isset($getData)) {
            return view('messages.form', ['getData' => $getData, 'getReasons' => $getReasons, 'pkID' => $id]);
        } else {
            return redirect('messages')->with('error', 'No Data Found');
        }
    }

    public function store(Request $request) {
//        echo '<pre>';
//        print_r($request->all()); die;
        $userID = Auth::user()->id;
        if (isset($userID)) {
            $pkID = $request->pkID;
            if ($pkID == '') {
                $addData = new Messages();
                $addData->date = date('Y-m-d');
                $addData->time = date('H:i:s');
                $addData->reason_id = isset($request->reason_id) ? $request->reason_id : '';
                $addData->message_text = isset($request->message_text) ? $request->message_text : '';
                $addData->user_id = isset($userID) ? $userID : '';
                $addData->status = "Open";
                $addData->view_status = "0";
                $addData->save();

                return redirect('messages')->with('success', 'Messages added successfully');
            } else {
                $addData = Messages::find($pkID);
                $updateData['reason_id'] = isset($request->reason_id) ? $request->reason_id : '';
                $updateData['message_text'] = isset($request->message_text) ? $request->message_text : '';
                $addData->update($updateData);

                return redirect('messages')->with('success', 'Messages updated successfully');
            }
        } else {
            return redirect('messages')->with('error', 'Your not allowed to perform this action');
        }
    }

    public function show($id) {
        $getData = Messages::find($id);
        if (isset($getData)) {
            if (isset($getData->getReply->message_text)) {
                $updateData['status'] = 'Closed';
                $updateData['view_status'] = '1';
                $getData->update($updateData);
            }
            return view('messages.show', ['getData' => $getData]);
        } else {
            return redirect('messages')->with('error', 'No Data Found');
        }
    }
    public function TutorIndex(){
      $getData = $getReasons = array();
      $userID = Auth::user()->id;
      $data = '';
      $getUserData = User::find($userID);
      if (is_object($getUserData) && $getUserData->roles == '2' && $getUserData->status == 'Active') {

          $getData = DB::table('message')
                ->leftjoin('users AS B', 'B.id', '=','message.user_id')
                ->leftjoin('message_reason AS C', 'C.id', '=','message.reason_id')
                ->select('message.*','B.username','C.reason')
                ->get();

      } else {
          return redirect('tutor-messages')->with('error', 'Your not allowed to perform this action');
      }
      return view('messages.TutorIndex', ['getData' => $getData, 'getReasons' => $getReasons, 'pkID' => ""]);
  }
  public function showMsg($id) {
      $getData = Messages::find($id);
      if (isset($getData)) {
        if (isset($getData->getReply->message_text)) {
              $updateData['status'] = 'Closed';
              $updateData['view_status'] = '1';
              $getData->update($updateData);
          }
          return view('messages.showMsg', ['getData' => $getData]);
      } else {
          return redirect('tutor-messages')->with('error', 'No Data Found');
      }
  }
  public function action($id) {
      $mid = $id;

  return view('messages.tutor-form',compact('mid'));
  }

  public function status(Request $request) {
    $admin_id =Auth::User()->id;
$mid=$request->mid;
$datetime =Carbon::now();
$message_text=$request->Reply;
//$status = "Closed";
      $messages = Messages::find($request->mid);
      $view_status =$request->view_status;
      if($view_status == 1){
        $status= "Closed";
      }
      else{
        $status = "Open";
      }
        $messages->view_status = $view_status;
        $messages->status = $status;
      $messages->save();

$message_reply = new MessagesReply();
      $message_reply->date_time = $datetime;
      $message_reply->message_id = $mid;
      $message_reply->message_text = $message_text;
      $message_reply->admin_id = $admin_id;
      $message_reply->status= $status;

      $message_reply->created_at =$datetime;
      $message_reply->updated_at =$datetime;
      $message_reply->save();


        return redirect('tutor-messages')->with('success','Status changed successfully.');
  }
}
