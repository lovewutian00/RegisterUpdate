<?php

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

Auth::routes();
//login & register -guest
Route::get('/logout', 'AuthController@getLogout')->name('logout');
Route::get('/login_menu', 'AuthController@showLoginMenu')->name('login_menu');
Route::post('/register', 'AuthController@store')->name('register.submit');
Route::get('/register', 'AuthController@showStudentForm')->name('register');
Route::post('/_register', 'AuthController@_store')->name('_register.submit');
Route::get('/_register', 'AuthController@showCompanyForm')->name('_register');
Route::get('/verify/{Token}', 'AuthController@userActivation')->name('verify');
Route::get('/create', 'AuthController@create')->name('create');

//student
Route::prefix('student')->group(function () {
     Route::get('/profile', 'StudentController@profile')->name('student_profile');
    Route::post('/update_profile', 'StudentController@updateProfile')->name('student_profile.submit');
    Route::get('/update_profile', 'StudentController@showUpdateProflie')->name('update_student');

    Route::get('/jobDetails/{detail}', 'StudentController@jobDetails')->name('jobDetails');
    Route::post('/jobDetails', 'StudentController@storeJobDetails')->name('storeJobDetails');
    Route::delete('/jobDetails','StudentController@deleteJobDetails')->name('deleteJobDetails');
    Route::get('/appliedJob','StudentController@appliedJob')->name('appliedJob');
    Route::post('/appliedJob','StudentController@storeAppliedJob')->name('storeAppliedJob');
    
    Route::get('spvProfile','StudentController@spvProfile')->name('spvProfile');
    Route::get('cmpProfile','StudentController@cmpProfile')->name('cmpProfile');
    
    
    Route::post('/login', 'StudentController@login')->name('student_login.submit');
    Route::get('/login', 'StudentController@showLoginForm')->name('student_login');

    Route::get('/index','StudentController@index')->name('stud_Index');
    Route::get('/','StudentController@index')->name('stud_Index'); 
    
    Route::get('/resumeProfile', 'StudentController@resumeProfile')->name('resume_profile');
    
    Route::get('/preference','StudentController@preference')->name('preference');
    Route::post('/preference','StudentPostController@findAction')->name('storePreference');
    Route::patch('/preference','StudentPostController@findAction')->name('updatePreference');
    
    Route::get('/report/create/{id}','ReportController@create')->name('report.create');
    
    Route::get('/survey', 'StudentController@survey')->name('student_Survey');
    Route::patch('/survey/surSubmit','StudentController@surSubmit');
    Route::resource('report', 'ReportController',['except'=>[
        'create'
    ]]);
    
});

Route::prefix('student/resume')->group(function () {
    Route::post('/education','StudentPostController@findAction')->name('storeEducation');
    Route::patch('/education/{edu_Id}','StudentPostController@findAction')->name('updateEducation'); 
    Route::delete('/education/{edu_Id}','StudentPostController@findAction')->name('deleteEducation');
    Route::get('/education/{eduDetail}/edit','StudentController@editEducation')->name('editEducation');
    Route::get('/education','StudentController@education')->name('education');
    
    Route::get('/experience','StudentController@experience')->name('experience');
    Route::post('/experience','StudentPostController@findAction')->name('storeExperience');
    Route::patch('/experience/{exp_Id}','StudentPostController@findAction')->name('updateExperience');
    Route::delete('/experience/{exp_Id}','StudentPostController@findAction')->name('deleteEXperience');
    Route::get('/experience/{expDetail}/edit','StudentController@editExperience')->name('editExperience');
    
    Route::get('/skill','StudentController@skill')->name('skill');
    Route::post('/skill','StudentPostController@findAction')->name('storeSkill');
    Route::get('/skill/edit','StudentController@editSkill')->name('editSkill');
    Route::get('/skill/delete','StudentController@deleteSkillPage')->name('deleteSkillPage');
    Route::delete('/skill/{skill_Id}','StudentPostController@findAction')->name('deleteSkill');
    Route::patch('/skill','StudentPostController@findAction')->name('updateSkill');
    
    Route::get('/language','StudentController@language')->name('language');
    Route::post('/language','StudentPostController@findAction')->name('storeLanguage');
    Route::get('/language/edit','StudentController@editLanguage')->name('editLanguage');
    Route::patch('/language','StudentPostController@findAction')->name('updateLanguage');
    Route::get('/language/delete','StudentController@deleteLanguagePage')->name('deleteLanguagePage');
    Route::delete('/language/{language_Id}','StudentPostController@findAction')->name('deleteLanguage');
    
    
    Route::get('/additional_info','StudentController@additional_info')->name('additional_info');
    Route::post('/additional_info','StudentPostController@findAction')->name('storeAddInfo');
    Route::get('/additional_info/edit','StudentController@editAddInfo')->name('editAddInfo');
    Route::patch('/additional_info','StudentPostController@findAction')->name('updateAddInfo');
    
    
});

//company
Route::prefix('company')->group(function () {
    Route::get('/add', 'CompanyController@add')->name('add');
    Route::get('/confirm', 'CompanyController@confirm')->name('confirm');
    Route::get('/evaluation/{sid}', 'CompanyController@evaluation')->name('evaluation');
    Route::patch('/evaluation', 'CompanyController@submitEva')->name('evaluation.submitEva');
    Route::get('/info/{sid}', 'CompanyController@info')->name('info');
    Route::get('/_list', 'CompanyController@_list')->name('_list');
    Route::get('/profile', 'CompanyController@profile')->name('company_profile');
    Route::post('/update_profile', 'CompanyController@updateProfile')->name('company_profile.submit');
    Route::get('/update_profile', 'CompanyController@showUpdateProflie')->name('update_company');
    Route::post('/login', 'CompanyController@login')->name('company_login.submit');
    Route::get('/login', 'CompanyController@showLoginForm')->name('company_login');
    Route::get('/viewDocument', 'CompanyController@viewDocument')->name('viewDocument');
    Route::get('/documents/pdf-document/{id}', 'CompanyController@getDocument');
    Route::get('/post', 'CompanyController@post')->name('post');
    Route::patch('/post','CompanyController@postJob');
    Route::get('/companyHome', 'CompanyController@home')->name('companyHome');
    Route::get('/add/{Stud_Id}/{Job_Id}/accept','CompanyController@acceptApplicant')->name('accept');
    Route::get('/add/{Stud_Id}/{Job_Id}/reject','CompanyController@rejectApplicant')->name('reject');
    Route::get('/jobPostDetail/{Job_Id}','CompanyController@showJobDetail')->name('JobDetail');
    Route::get('/editPost/{Job_Id}','CompanyController@editPost')->name('EditPost');
    Route::patch('/editPost/{Job_Id}/update','CompanyController@updatePost')->name('UpdatePost');
    //New Route
    Route::get('/studentResume/{Stud_Id}','CompanyController@studentResume')->name('StudentResume');
    Route::get('/confirmStudentForm/{Stud_Id}/{Job_Id}','CompanyController@confirmStudentForm')->name('confirmStudentForm');
    Route::patch('/confirmStudentForm/{Stud_Id}/{Job_Id}','CompanyController@submitConfirmStudent')->name('accept');
    
    Route::get('/viewReport/{rid}','CompanyController@viewReport')->name('viewReport');
    Route::get('/viewReportList/{sid}','CompanyController@viewReportList')->name('viewReportList');
    Route::post('/updateViewReport/{rid}','CompanyController@updateViewReport')->name('updateViewReport');
});

//supervisor
Route::prefix('supervisor')->group(function () {
   Route::get('/', 'SupervisorController@studentList')->name('studentList');
    Route::get('/studentList', 'SupervisorController@studentList');
    Route::get('/studentDetails/{id}', 'SupervisorController@details');
    Route::get('/companyVisit', 'SupervisorController@companyVisit')->name('companyVisit');
    Route::get('/visitFeedback/{id}', 'SupervisorController@visitFeedback');
    Route::post('/visitFeedback', 'SupervisorController@submitFB')->name('visitFeedback.submitFB');
    Route::get('/reportList/{id}', 'SupervisorController@reportList')->name('reportList');
    Route::get('/viewReport/{studid}/{repid}', 'SupervisorController@viewReport');
    Route::get('/evaluation/{id}', 'SupervisorController@evaluation');
    Route::post('/evaluation', 'SupervisorController@submit')->name('evaluation.submit');
    Route::post('/login', 'SupervisorController@login')->name('staff_login.submit');
    Route::get('/login', 'SupervisorController@showLoginForm')->name('staff_login');
});

//admin
Route::prefix('admin')->group(function () {
    Route::get('/studentList', 'AdminController@studentList')->name('studList');;
    Route::get('/studentDetails/{id}', 'AdminController@studDetails');
    Route::get('/supervisorList', 'AdminController@supervisorList');
    Route::get('/supervisorDetails/{id}', 'AdminController@spvDetails');
    Route::get('/supervisorAssign/{id}', 'AdminController@spvAssign');
    Route::get('/studentAssign/{id}', 'AdminController@studAssign')->name('studAssign');
    Route::post('/supervisorAssign', 'AdminController@store')->name('spvAssign.submit');
    Route::post('/supervisorDetails', 'AdminController@remove')->name('remove.submit');
    Route::post('/studentAssign', 'AdminController@save')->name('studAssign.submit');
    Route::get('/companyVisitList', 'AdminController@companyList');
    Route::get('/approveList', 'AdminController@approveList')->name('approveList');
    Route::get('/approve/{id}', 'AdminController@approve')->name('approve');
    Route::post('/reject/{id}', 'AdminController@reject')->name('reject');
    Route::get('/viewCompany/{id}', 'AdminController@viewCompany')->name('viewCompany');
    Route::get('/viewDocument/{id}', 'AdminController@viewDocument')->name('viewDocument');
    Route::get('/documents/pdf-document/{id}', 'AdminController@getDocument');
    
    Route::get('/showSurvey/{sid}', 'AdminController@showSurvey')->name('showSurvey');
    Route::get('/showCompanyEva/{sid}', 'AdminController@showCompanyEva')->name('showCompanyEva');
});

//home 
Route::get('/profile', function () {
    if (Auth::guard('student')->check()) {
        return redirect()->intended(route('student_profile'));
    }else if(Auth::guard('company')->check()){
        return redirect()->intended(route('company_profile'));
    }else if(Auth::guard('supervisor')->check()){
        return redirect()->intended(route('staff_home'));
    }else if(Auth::guard('admin')->check()){
        return redirect()->intended(route('studList'));
    }
    return redirect()->intended(route('index'));
});
Route::post('/criteria', 'HomeController@criteria')->name('criteria');
Route::post('/home', 'HomeController@search')->name('search');
Route::get('/home', 'HomeController@home')->name('searchjob');
Route::get('/index', 'HomeController@index')->name('index');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/ipim', 'HomeController@ipim')->name('ipim');
Route::get('/feedback', 'HomeController@feedback')->name('feedback');
Route::get('/survey', 'HomeController@survey')->name('survey');
Route::get('/specialization', 'HomeController@specialization')->name('specialization');
Route::get('/location', 'HomeController@location')->name('location');
Route::get('/companylist', 'HomeController@companylist')->name('companylist');



