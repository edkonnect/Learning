<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
if (Auth::check()) {
    Route::post('/', function () {
        return view('index');
    });
} else {
    Route::get('/', function () {
        return redirect('login');
    });
}
Route::get('/activity-log', 'UserRegisterController@activity_log');
Route::get('/temp-login', 'UserRegisterController@TempLogin');
Route::post('/temp-login/store', 'UserRegisterController@TempLoginSubmit');

Auth::routes();
Route::group(array('middleware' => 'auth'), function () {

    Route::any('/', 'DashboardController@index');
    Route::any('/showInvoice', 'DashboardController@showInvoice');
    Route::any('/tutor/getNumberOfSession', 'DashboardController@getNumberOfSession');
    Route::any('/userprofile/storeUserData', 'DashboardController@storeUserData');
    Route::any('/dashboard/getDashboardData', 'DashboardController@getDashboardData');
    Route::any('/dashboard/getTutorNotes', 'DashboardController@getTutorNotes');
    Route::any('/tutor/tutorProfileEdit/{id}', 'DashboardController@tutorProfileEdit');
    Route::any('/userProfile', 'DashboardController@userProfile');
    Route::any('/userProfile/changePassword', 'DashboardController@changePassword');
	    Route::any('/student-analytics','DashboardController@StudentAnalytics');
  Route::any('/student-analytics/upload','DashboardController@UploadAnalytics');
    //Session Notes
    Route::any('/session-notes', 'SessionController@index');
    Route::any('/post-session-notes', 'SessionController@tutorIndex');
    Route::any('/view-tutor-sessions', 'SessionController@viewTutorSessions');
    Route::any('/view-session-notes', 'SessionController@tutorView');
    Route::any('/session-notes/tutor/getCourse/', 'SessionController@getTutorCourse');
    Route::any('/session-notes/tutor/getSession/', 'SessionController@getTutorSession');
    Route::any('/session-notes/tutor/getTimePeriodData/', 'SessionController@getTutorTimePeriodData');

    Route::any('/tutor/getAllStudents', 'SessionController@getAllStudents');

    Route::any('/tutor/getStudents', 'SessionController@getStudents');
    Route::any('/tutor/getTutorList', 'SessionController@getTutorList');
    Route::any('/tutor/getFiles', 'SessionController@getFiles');
    Route::any('/tutor/getSystemFiles', 'SessionController@getSystemFiles');
    Route::any('/tutor/getLessonPlan', 'SessionController@getLessonPlan');
    Route::any('/tutor/getLessonPlans', 'SessionController@getLessonPlans');

    Route::any('/tutor/getLessonPlanDetails', 'SessionController@getLessonPlanDetails');
    Route::any('/tutor/storeSessionNotes', 'SessionController@storeSessionNotes');
    Route::any('/tutor/getTutorCourseSessions', 'SessionController@getTutorCourseSessions');
    Route::any('/tutor/setCloneData', 'SessionController@setCloneData');
    Route::any('/session-notes/upcomingSession', 'SessionController@upcomingSession');
    Route::any('/upcoming-sessions', 'SessionController@upcomingSessionIndex');
    Route::any('/upcoming-sessions-tutor', 'SessionController@upcomingSessionTutor');
    Route::any('/getHomework/{session_id}/{student_id}/{course_id}', 'HomeworkController@getHomework');
    Route::any('/tutor/getHomework/{session_id}/{student_id}/{course_id}', 'HomeworkController@getTutorHomework');
    Route::any('/homework-list', 'HomeworkController@index');
    Route::any('/review-homework', 'HomeworkController@tutorIndex');
    Route::any('/homework-upload', 'HomeworkController@uploadHomework');
    Route::any('/uploadHomeworkNotification/{session_id}/{course_id}/{student_id}', 'HomeworkController@uploadHomeworkNotification');
    Route::any('/homework-list/getListing', 'HomeworkController@getListing');
    Route::any('/homework-list/uploadFile', 'HomeworkController@uploadFile');
    Route::any('/getHomeworkDetailView/{session_id}/{student_id}/{course_id}', 'HomeworkController@getHomeworkDetailView');
    Route::any('/homework-list/destroy', 'HomeworkController@destroy');
    Route::any('/getHomeworkAjaxView/{student_id}/{course_id}/{timeperiod}', 'HomeworkController@getHomeworkAjaxView');
    Route::any('/tutor/getHomeworkAjaxView/{student_id}/{course_id}/{timeperiod}', 'HomeworkController@getTutorHomeworkAjaxView');
	 //Tutor Homework Uploads
    Route::any('/upload-homework-files', 'HomeworkController@uploadTutorHomeworkFiles');
    Route::any('/tutor-homework-list/uploadFile', 'HomeworkController@uploadTutorFile');
    Route::any('/tutor-homework-list/destroy', 'HomeworkController@FileDestroy');
    Route::any('/getSessionDate/{student_id}/{course_id}', 'HomeworkController@getSessionDate');
    Route::any('/session-notes/getCourse/', 'SessionController@getCourse');
    Route::any('/session-notes/getSession/', 'SessionController@getSession');
    Route::any('/session-notes/getTimePeriodData/', 'SessionController@getTimePeriodData');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::any('/assessment', 'AssessmentController@index');
    Route::any('/assessment/assessments','AssessmentController@getAssessment');
    Route::any('/assessment/test/{id}','AssessmentController@assessmentTest');
        Route::any('/assessment/completed','AssessmentController@CompletedAssessment');
    Route::any('/assessment/completedView','AssessmentController@CompletedAssessmentView');

    Route::any('/printables', 'PrintablesController@index');
    Route::any('/printables/getTopics', 'PrintablesController@getTopics');

    Route::any('/messages', 'MessagesController@index');
    Route::any('/messages/create', 'MessagesController@create');
    Route::any('/messages/store', 'MessagesController@store');
    Route::any('/messages/edit/{id}', 'MessagesController@edit');
    Route::any('/messages/show/{id}', 'MessagesController@show');
      Route::any('/tutor-messages', 'MessagesController@TutorIndex');
    Route::any('/tutor-messages/edit/{id}', 'MessagesController@action');
    Route::any('/changeStatus', 'MessagesController@status');
    Route::any('/tutor-messages/show/{id}', 'MessagesController@showMsg');
    



    Route::any('/course-detail', 'CourseDetailController@index');
    Route::any('/course-detail/getLessonList', 'CourseDetailController@getLessonList');

    Route::any('/quizes', 'QuizController@index');
    Route::any('/quizes/getQuizesList', 'QuizController@getQuizesList');
    Route::any('/quizes/startQuiz/{id}', 'QuizController@startQuiz');


    Route::any('/test-index', 'TestController@index');
    Route::any('/articles', 'DashboardController@articles');

	 Route::any('/assign-curriculum','CurriculumController@index');
    Route::any('/assign-curriculum/get-curriculum','CurriculumController@AssignCurriculum' );
    Route::any('/assign-curriculum/upload','CurriculumController@Upload' );

    //Create Lesson
    Route::any('/create-curriculum','CurriculumController@createLesson');
    Route::any('/create-curriculum/upload','CurriculumController@lessonUpload');

    //Register User
    Route::any('/add-tutor','UserRegisterController@AddTutor');
    Route::any('/add-tutor/store','UserRegisterController@StoreTutor');
    Route::any('/register-user','UserRegisterController@index');
    Route::any('/register-user/store','UserRegisterController@StoreUser');
    Route::any('/add-student','UserRegisterController@AddStudent');
    Route::any('/save-student','UserRegisterController@SaveStudent');

    //ASSESSMENT utor Portal
      Route::any('/add-assessment', 'AssessmentController@addAssessment');
      Route::any('/save-assessment', 'AssessmentController@saveAssessment');
      Route::any('/upload-result', 'AssessmentController@uploadResult');
      Route::any('/assessment/assessments-result','AssessmentController@AssessmentResult');
      Route::any('/assessment/upload-result-pdf/{id}', 'AssessmentController@UploadResultPdf');
      Route::any('/assessment/store-result/{id}', 'AssessmentController@StoreResult');

	  //Tutor Portal Grade 7-8
    Route::any('/grade-7-8', 'GradeController@index');
        Route::any('/grade-7-10', 'GradeController@indexEng');
            Route::any('/satEnglish','GradeController@SatEng');




});
