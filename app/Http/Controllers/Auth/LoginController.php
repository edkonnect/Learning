<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use DB;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
     public function logout(Request $request){
       $user =Auth::user();
           $dt = Carbon::now();
           Session::put('user',$user);
           $user=Session::get('user');
           //$login_time=toDayDateTimeString();
           //dd($dt);
           $activitylog =[
             //'user_name'=>$name,
             'logout_time'=>$dt,
           ];
           DB::table('activity_logs')->insert($activitylog);
       Auth::logout();
    return redirect('/login');
     }

    public function __construct() {


        $this->middleware('guest')->except('logout');
    }


    protected function validateLogin(Request $request) {
        $userTypeVal = $request->userTypeVal;
        $userNameEmail = $request->email;
        $input = $request->all();
        // Get the user details from database and check if user is exist and active.
        //Daniel
//         echo '<pre>';
//        print_r($userTypeVal);
//        die;
        $user = User::where(function ($q) use ($userNameEmail) {
                    $q->where('username', $userNameEmail)
                            ->orWhere('email', $userNameEmail);
                })->first();
        if ($userTypeVal == 3) {
            if (isset($user->roles) && $user->roles == '2') {
                throw ValidationException::withMessages([$this->username() => __('User is not a Parent.')]);
            }
            if (isset($user->status) && $user->status == 'Active' ) {

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
              //dd($activitylog);
            }


//        echo '<pre>';
//        print_r($user->getStudents);
//        die;
            if (isset($user->status) && $user->status != 'Active') {
                throw ValidationException::withMessages([$this->username() => __('User has been deactivated.')]);
            } elseif (isset($user->roles) && $user->roles != '3') {
                throw ValidationException::withMessages([$this->username() => __('User is not a Parent.')]);
            } elseif (!isset($user->getStudents) && isset($user->roles) && $user->roles == '3') {
                throw ValidationException::withMessages([$this->username() => __('This Parent has no Students.')]);
            }
        } else {
            if (isset($user->status) && $user->status != 'Active') {
                throw ValidationException::withMessages([$this->username() => __('User has been deactivated.')]);
            } elseif (isset($user->roles) && $user->roles == '3') {
                throw ValidationException::withMessages([$this->username() => __('User is not a Tutor.')]);
            }
        }

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (!auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']))) {
            throw ValidationException::withMessages(['email' => __('The Credentials do not match.')]);
        }

        // Then, validate input.
        return $request->validate([
                    $this->username() => 'required|string',
                    'password' => 'required|string',
        ]);
    }

}
