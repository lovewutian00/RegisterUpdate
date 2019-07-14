<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Education;
use App\Experience;
use App\Skill;
use App\Additional_Info;
use App\Language;
use App\Batch;
use App\Job_post;
use App\Job_applications;
use App\Preference;
use App\Company_student;
use App\Student_Supervisor;
use App\Company;
use App\Supervisor;
use Validator;
use App\Survey_result;
use App\Surveys;
use App\Questions;

class StudentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:student')->except(['login','showLoginForm']);
        $this->middleware('guest')->only(['login','showLoginForm']);
    }
    
   public function index()
    {
        $id = $this->get_stud_id();
        
        if($id)
        {
            $studDetail = Student::where('Stud_Id',$id)->with(['educations' => function($query) use ($id) {
                $query->where('Stud_Id', $id);
            }])->first();
            $programDetail = $studDetail->program;
            $facultyDetail = $programDetail->faculty;
            
            $preference = $studDetail->preference; 
            
            $chk_company = Company_student::where('Stud_Id',$id)->get();
            
            $chk_supervisor= Student_Supervisor::where('Stud_Id',$id)->get();
            
                
                $priority1=[];
                $priority2=[];
                $priority3=[];
                $priority4=[];
                $priority5=[];
                $priority6=[];
                $priority7=[];
            if($preference){
                
                
                //all qualification matched
                $priority7 = Job_post::where('Qualification',$preference->Job_Type_1)->orWhere('Qualification',$preference->Job_Type_2)
                        ->orWhere('Qualification',$preference->Job_Type_3)->get();
                
                $job_ids_7 = $priority7->pluck('Job_Id');
                
                //all location matched and location matched(case sensitive)
                $priority6 = Job_post::where('Location',$preference->Location_1)->orWhere('Location',$preference->Location_2)
                        ->orWhere('Location',$preference->Location_3)->whereIn('Job_Id',$job_ids_7)->get();
                
                $job_ids_6 = $priority6->pluck('Job_Id');
                
                $job_ids_5 = [];
                $job_ids_4 = [];
                $job_ids_3 = [];
                $job_ids_2 = [];
                
                if($preference->Keyword_5 != null){
                    $priority5 = Job_post::where('Title','like','%'.$preference->Keyword_5.'%')->whereIn('Job_Id',$job_ids_6)->get();
                    $job_ids_5 = $priority5->pluck('Job_Id');;
                }
                if($preference->Keyword_4 != null){
                     $priority4 = Job_post::where('Title','like','%'.$preference->Keyword_4.'%')->whereIn('Job_Id',$job_ids_6)->whereNotIn('Job_Id',$job_ids_5)->get();
                     $job_ids_4 = $priority4->pluck('Job_Id');      
                }
                
                if($preference->Keyword_3 != null){
                    $priority3 = Job_post::where('Title','like','%'.$preference->Keyword_3.'%')->whereIn('Job_Id',$job_ids_6)->whereNotIn('Job_Id',$job_ids_4)->get();
                    $job_ids_3 = $priority3->pluck('Job_Id');;
                }
                if($preference->Keyword_2 != null) {
                    $priority2 = Job_post::where('Title','like','%'.$preference->Keyword_2.'%')->whereIn('Job_Id',$job_ids_6)->whereNotIn('Job_Id',$job_ids_3)->get();
                    $job_ids_2 = $priority2->pluck('Job_Id');;
                }
                if($preference->Keyword_1 != null) {
                    $priority1 = Job_post::where('Title','like','%'.$preference->Keyword_1.'%')->whereIn('Job_Id',$job_ids_6)->whereNotIn('Job_Id',$job_ids_2)->get(); 
                }       
                
            }
            
            return view('student.index',compact('studDetail','programDetail','facultyDetail','priority1','priority2','priority3'
                    ,'priority4','priority5','chk_company','chk_supervisor'));
        }
        else
                return redirect()->route('index');
    }
    
     public function preference(){
        $id = $this->stud_detail();
        
        $preferenceDetail = $id->preference;
        return view('student.preferences',compact('preferenceDetail'));
    }
    
     public function resumeProfile()
    {
        $studDetail = $this->stud_detail();
        $program = $studDetail->program;
        $exps = $studDetail->experiences;
        $edus = $studDetail->educations;
        $skillBeginner = Skill::where('Stud_Id',$this->get_stud_id())->where('Proficiency','Beginner')->get();
        $skillIntermediate = Skill::where('Stud_Id',$this->get_stud_id())->where('Proficiency','Intermediate')->get();
        $skillAdvanced = Skill::where('Stud_Id',$this->get_stud_id())->where('Proficiency','Advanced')->get();
        $languages = $studDetail->languages;
        $add_infos = $studDetail->additional_info; 
        
        return view('student.resumeProfile',compact('studDetail','program','exps','edus','skillBeginner','skillIntermediate','','skillAdvanced','languages','add_infos'));
    }
    
    public function profile()
    {
        $studDetail = $this->stud_detail();
        return view('student.profile', compact('studDetail'));
    }
    
    public function showUpdateProflie()
    {
        $id = Auth::user()->getId();
        $student = Student::find($id);
        return view('student.update_profile', compact('student'));
    }
    
    public function updateProfile(Request $request)
    {
        Validator::make($request->all(), [
            'FirstName' => 'required|string|max:30',
            'LastName' => 'required|string|max:30',
            'DOB' => 'sometimes|date|before:13 years ago|nullable',
            'Race' => 'sometimes|in:Chinese,Malay,Indian,Other|string',
            'ContactNo' =>'sometimes|string|max:12|min:11|regex:/[0-9]{3}[-]*[0-9]{7,8}/',
            'Email' => 'required|string|email|max:30|unique:companies|unique:supervisors',
            'Address_1' => 'sometimes|string|max:50|nullable',
            'Address_2' => 'sometimes|string|max:50|nullable',
            'City' => 'sometimes|string|max:20|nullable',
            'Postcode' => 'sometimes|string|max:10|regex:/[0-9]{3,10}/|nullable',
            'State' => 'sometimes|string|max:30|nullable',
            'Country' => 'sometimes|string|max:30|nullable',
            'Image' => 'nullable|image|mimes:jpeg,jpg,png',
            ],['before' => 'You must be at least 13 years old'])->validate();
        
        
        $id = Auth::user()->getId();
        $student = Student::find($id);
        if($request->hasFile('Image')){
            $Avatar = request()->file('Image'); 
            $ext = $Avatar->extension();
            $Avatar->storeAs('Avatars/Students',"{$id }.{$ext}",'public');
            $student->Avatar = "{$id}.{$ext}";
        }
        
        $student->FirstName = $request->FirstName;
        $student->LastName = $request->LastName;
        $student->DOB = $request->DOB;
        $student->Race = $request->Race;
        $student->ContactNo = $request->ContactNo;
        $student->Email = $request->Email;
        $student->Address_1 = $request->Address_1;
        $student->Address_2 = $request->Address_2;
        $student->City = $request->City;
        $student->Postcode = $request->Postcode;
        $student->State = $request->State;
        $student->Country = $request->Country;
        
        $student->save();
        return redirect()->intended(route('student_profile'))->with('Success','Update successful.');
    }
    
    public function education()
    {  
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $eduDetail = $studDetail->educations()->get();
            $edu_count = $studDetail->educations->count();
        }
        return view('student.resume.education',compact('eduDetail','studDetail','edu_count'));
    }
    
     public function editEducation(Education $eduDetail){
        
        //verify the educaiton whether it belongs to the authenticate user
        if($this->stud_detail() && $this->verify_user($eduDetail->Stud_Id)){
            $studDetail = $this->stud_detail();
        }
        else{
            return redirect()->route('education');
        }
  
        return view('student.resume.editEducation',compact('eduDetail','studDetail'));
    }
    public function editExperience(Experience $expDetail){
        if($this->stud_detail() && $this->verify_user($expDetail->Stud_Id)){
            $studDetail = $this->stud_detail();
        }
        else{
            return redirect()->route('experience');
        }
  
        return view('student.resume.editExperience',compact('expDetail','studDetail'));
    }
    
    public function experience(){
        //TODO
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $expDetail = $studDetail->experiences;
            $exp_count = $studDetail->experiences->count();
        }

        return view('student.resume.experience',compact('studDetail','expDetail','exp_count'));
    }
    
    public function skill(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            //did this because the comma in view
            $skillBeginner = Skill::where('Stud_Id',$this->get_stud_id())->where('Proficiency','Beginner')->get();
            $skillIntermediate = Skill::where('Stud_Id',$this->get_stud_id())->where('Proficiency','Intermediate')->get();
            $skillAdvanced = Skill::where('Stud_Id',$this->get_stud_id())->where('Proficiency','Advanced')->get();
            $skill_count = $studDetail->skills->count();
        }

        return view('student.resume.skill',compact('studDetail','skillBeginner','skillIntermediate','skillAdvanced','skill_count'));
    }
    
    public function editSkill(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $skillDetail = $studDetail->skills;
        }
        return view('student.resume.editSkill',compact('skillDetail','studDetail'));
    }
    
    public function deleteSkillPage(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $skillDetail = $studDetail->skills;
        }
        return view('student.resume.deleteSkill',compact('skillDetail','studDetail'));
    }
    
    public function language(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $lg_count = $studDetail->languages->count();
            $lgDetail = $studDetail->languages;
        }
        return view('student.resume.language',compact('lgDetail','studDetail','lg_count'));
    }
    
    public function editLanguage(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
             $lg_count = $studDetail->languages->count();
            $lgDetail = $studDetail->languages;
        }
        return view('student.resume.editLanguage',compact('lgDetail','studDetail','lg_count'));
    }
    
    public function deleteLanguagePage(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $lgDetail = $studDetail->languages;
        }
        return view('student.resume.deleteLanguage',compact('lgDetail','studDetail'));
    }

     public function additional_info(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $addInfoDetail = $studDetail->additional_info;
        }
        
        return view('student.resume.additional_info',compact('studDetail','addInfoDetail'));
    }
    
    public function editAddInfo(){
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $addInfoDetail = $studDetail->additional_info;
        }
        return view('student.resume.editAddInfo',compact('studDetail','addInfoDetail'));
    }
    
     
    
    private function stud_detail(){
        
        $id = $this->get_stud_id();
        
        if($id){
            return Student::find($id);
        }
        else{
            return null;
        }
    }
    
    private function get_stud_id (){
        
        $id = Auth::user()->getId();
        
        if($this->check_exist($id, 'Student'))
            return $id;
        else
            return null;
    }
    
    private function check_exist($id,$case){
        switch($case){
            case 'Student':
            {
                if(Student::where('Stud_Id', $id)->exists()){
                    return true;
                }
                else{
                    return false;
                }
            }
            break;
            case 'Education':
            {
                if(Education::where('Edu_Id', $id)->exists()){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }
    
     private function verify_user($id){
        if($id== $this->get_stud_id())
            return true;
        else
            return false;
    }
    
    
    public function jobDetails(Job_post $detail)
    {
        $studDetail = $this->stud_detail();
         
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $job = $detail;
            $chk_apply = Job_applications::where('Stud_Id',$this->get_stud_id())->where('Job_Id',$detail->Job_Id)->get();   
            $company_detail = Company::where('Cmp_Id',$job->Cmp_Id)->first();
            $expected_salary = Additional_Info::where('Stud_Id',$this->get_stud_id())->select('Expected_Salary')->first();
           
        }      
        return view('student.viewJob',compact('studDetail','job','chk_apply','company_detail','expected_salary'));
    }
    
    public function appliedJob(){
         
        $studDetail = $this->stud_detail();
        
        if(!$studDetail){
            return redirect()->route('index');
        }
        else{
            $applied_jobs = Job_applications::where('Stud_Id',$this->get_stud_id())->get();
            
            $applied_job_ids = $applied_jobs->pluck('Job_Id');
            $applied_job_details = Job_post::whereIn('Job_Id',$applied_job_ids)->get();
            $chk_company = Company_student::where('Stud_Id',$this->get_stud_id())->get();

        }   
        return view('student.appliedJob',compact('applied_job_details','applied_jobs','chk_company'));
    }
    
    public function storeAppliedJob(Request $request){

        $chk_cmp = Company::findOrFail($request->Cmp_Id);
        $chk_job = Job_post::findOrFail($request->Job_Id);
        $chk_application = Job_applications::where('Job_Id',$chk_job->Job_Id)->where('Stud_Id',$this->get_stud_id())
                ->where('Status','Accepted')->get();
        $chk_student_company = Company_student::where('Stud_Id',$this->get_stud_id())->get();
        
        if($chk_application && !count($chk_student_company)){
            $request->merge([
               'Stud_Id' =>  $this->get_stud_id()
            ]);
            
            Company_student::create(request(['Cmp_Id','Stud_Id']));
            Job_applications::where('Stud_Id',$this->get_stud_id())->where('Job_Id',$request->Job_Id)->delete();
            return redirect(route('stud_Index'))->with('Success','Offer Accepted.');
        }
        else{
            return redirect(route('stud_Index'))->with('Warning','You already joined a company.');
        }
       
    }
    
    public function spvProfile(){      
        $spv_id = Student_Supervisor::where('Stud_Id',$this->get_stud_id())->first();
        
        if($spv_id){
            $student_supervisor = Supervisor::findOrFail($spv_id->Spv_Id);
            return view('student.viewSpv',compact('student_supervisor'));
        }
        else{
             return redirect(route('stud_Index'));
        }
    }
    public function cmpProfile(){      
        $cmp_id = Company_student::where('Stud_Id',$this->get_stud_id())->first();
        
        if($cmp_id){
            $company_student = Company::findOrFail($cmp_id->Cmp_Id);
            return view('student.viewCmp',compact('company_student','cmp_id'));
        }
        else{
             return redirect(route('stud_Index'));
        }
    }
    
    public function storeJobDetails(Request $request){
        if($request->method('POST')){
        $id = $this->get_stud_id();
        $check = Job_post::findOrFail($request->Job_Id);
        $request->merge([
           'Status' => 'Pending' ,
           'Stud_Id' => $id
        ]);
        
        Job_applications::create(request(['Job_Id','Stud_Id','Status']));
        }
        return redirect(route('stud_Index'));
    }
    public function deleteJobDetails(Request $request){
        if($request->method('DELETE')){
            $dlt = Job_applications::where('Job_Id',$request->Job_Id)->where('Stud_Id',$this->get_stud_id())->get();
            
            if($dlt){
                $dlt = Job_applications::where('Job_Id',$request->Job_Id)->where('Stud_Id',$this->get_stud_id())->delete();
            }

            return redirect(route('jobDetails',['id'=>$request->Job_Id]));
        }
    }
    
    ///login
    use AuthenticatesUsers; 
    public function showLoginForm(){
        return view('student.login');
    }
    public function credentials(Request $request) {
        $request['is_activated'] = 1;
        return $request->only('Stud_Id','password','is_activated');
    }
    public function username(){
        return 'Stud_Id';
    }
    protected function guard(){
        return Auth::guard('student');
    }
    protected function validateLogin(Request $request){
        Validator::make($request->all(), [
            $this->username() => 'required|string|size:10',
            'password' => 'required|string|min:6',
            ])->validate();
    }
    public function login(Request $request){
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    public function redirectPath()
    {
        return '/student/index';
    }
    
    public function survey()
    {
        $id = Auth::user()->getId();
        if(Survey_result::find($id) != null){
            return redirect('/student')->with('message', 'Survey has been done!');
        }else{
            //$survey = Surveys::find(1)->first();
            //$questions = Questions::where('Survey_Id','=',1)->get();
            $stud =Student::find($id);
            $cs =  Company_student::where('Stud_Id',$id)->first();
            $cmp = Company::where('Cmp_Id',$cs->Cmp_Id)->first();
            //return view('student.survey',compact(['stud', 'survey', 'questions','cs']));
            return view('student.survey',compact(['stud','cs','cmp']));
            
        }
    }
    
    public function surSubmit(Request $request){
        Validator::make($request->all(), [
        'paid' => 'required|in:Yes,No',  
        'compensation' => 'required',  
        'experience' => 'required',  
        'understanding' => 'required',  
        'trainOrExp' => 'required',  
        'onGoingFeedback' => 'required', 
        'responsibility' => 'required',
        'quesOrConcerns' => 'required',
        'chalAndStimulate' => 'required',
        'treated' => 'required',
        'relationWCoworker' => 'required',
        'oppForLearn' => 'required',
        'prepareToEnterWorld' => 'required',
        'offerWork' =>  'required',
        'recommend' =>  'required',
        'commentOfRecommend' => 'required|max:200',
        'jobsOrDuties' => 'required|max:200',
        'knowledgeOrSkill' => 'required|max:200',
        'suggestionsToStudents' => 'required|max:200',
        'recommendationsToEmployer' => 'required|max:200',
        'problematicCompany' => 'required|max:200',
        ])->validate();
        
        $id = Auth::user()->getId();
        $stud =Student::find($id);
        $cs =  Company_student::where('Stud_Id','=',$id)->first();
        $c = Company::where('Cmp_Id','=',$cs->Cmp_Id)->first();
        Survey_result::create([
            'Stud_Id' => $id ,
            'Gender'  => $stud->Gender,
            'Cmp_Name'  => $c->Cmp_Name,
            'Prog_Code' => $stud->Program_Code,
            'Intern_Paid' => request('paid'),
            'Q1' => request('compensation'),
            'Q2' => request('experience'),
            'Q3' => request('understanding'),
            'Q4' => request('trainOrExp'),
            'Q5' => request('onGoingFeedback'),
            'Q6' => request('responsibility'),
            'Q7' => request('quesOrConcerns'),
            'Q8' => request('chalAndStimulate'),
            'Q9'=> request('treated'),
            'Q10' => request('relationWCoworker'),
            'Q11' => request('oppForLearn'),
            'Q12' => request('prepareToEnterWorld'),
            'Q13' => request('offerWork'),
            'Q14' => request('recommend'),
            'Q15' => request('commentOfRecommend'),
            'Q16' => request('jobsOrDuties'),
            'Q17' => request('knowledgeOrSkill'),
            'Q18' => request('suggestionsToStudents'),
            'Q19' => request('recommendationsToEmployer'),
            'Q20' => request('problematicCompany'),
            'Survey_Id' => 1
        ]);
        return redirect('/student')->with('message', 'Survey has been done!');
    }
    //////////////
}
