<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Company;
use App\Document;
use Storage;
use Response;
use Validator;
use App\Student;
use App\Skill;
use App\Company_student;
use App\Company_evaluations;    
use App\Job_post;
use App\Job_applications;
use App\Report;
use Carbon\Carbon;
use DateTime;
use App\Leave;
use App\Additional_Info;
use App\Experience;
use App\Education;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company')->except(['login','showLoginForm','logout']);
        $this->middleware('guest')->only(['login','showLoginForm']);
    }
    
    public function profile()
    {
        $id = Auth()->id();
        $user = Company::where('Cmp_Id',$id)->first();
        return view('company.profile', compact('user'));
    }
    
    public function showUpdateProflie()
    {
        $id = Auth()->id();
        $user = Company::where('Cmp_Id',$id)->first();
        return view('company.update_profile', compact('user'));
    }
    
    public function updateProfile(Request $request){
        
        $id = Auth()->id();
        $Cmp = Company::find($id);
        Validator::make($request->all(), [
            'Cmp_Name'=> 'required|string|max:30',
            'PICName' => 'required|string|max:30',
            'PICPosition' =>'required|string|max:30',
            'ContactNo' =>'required|string|max:11|min:10|regex:/[0-9]{3}[-]*[0-9]{7,8}/',
            'Address' => 'required|string|max:50',
            'Town' => 'required|string|max:25',
            'State' => 'required|string|max:25',
            'Country' => 'required|string|max:25',
            'Avatar' => 'image|mimes:jpeg,jpg,png',
            'Document.*' => 'nullable|mimes:pdf|distinct'
        ],[
            'Avatar.mimes' => 'Please upload with correct format.E.g: jpeg,jpg,png',
            'Document.*.mimes' => 'Only pdf file are allowed',
        ])->validate();
        
        if($request->hasFile('Document')){
            $Cmp_Name = preg_replace('/\s+/', '', $Cmp->Cmp_Name);
            $docs = Document::where('Cmp_Id',$Cmp->Cmp_Id )->get();
            Storage::deleteDirectory('Docs/'. $Cmp_Name);
            foreach($docs as $doc){
                $doc->delete();
            }

            foreach ($request->Document as $file) {
                $path = $file->store('Docs/'. $Cmp_Name);
                Document::create([
                'Cmp_Id' => $Cmp->Cmp_Id,
                'File' => $path,
            ]);
            }
        }
        if($request->hasFile('Avatar')){
            $Avatar = request()->file('Avatar'); 
            $ext = $Avatar->extension();
            $Cmp_Name = preg_replace('/\s+/', '', $Cmp->Cmp_Name);
            $Avatar->storeAs('Avatars/'. $Cmp_Name, "Avatar.{$ext}",'public');
            $Cmp->Avatar = "Avatar.{$ext}";
        }
        
        if($Cmp->is_activated <= 2){
            $Cmp->update(['is_activated' => 2]);
        }
        
        $Cmp->Cmp_name = $request->Cmp_Name;
        $Cmp->ContactNo = $request->ContactNo;
        $Cmp->PICName = $request->PICName;
        $Cmp->PICPosition = $request->PICPosition;
        $Cmp->Address = $request->Address;
        $Cmp->Town = $request->Town;
        $Cmp->State = $request->State;
        $Cmp->Country = $request->Country;
     
        $Cmp->save();
        
        return redirect()->intended(route('company_profile'))->with('Success','Update Information Success.');
    }
    
    use AuthenticatesUsers; 
    public function showLoginForm(){
        return view('company.login');
    }
    
    public function credentials(Request $request) {
        return $request->only('email','password','is_activated');
    }
    
    public function username(){
        return 'email';
    }
    
    protected function guard(){
        return Auth::guard('company');
    }
    
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        
        
        $request['is_activated'] = 1;
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        $request['is_activated'] = 2;
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        $request['is_activated'] = 3;
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    
    public function redirectPath()
    {
        return '/company/companyHome';
    }
    
    public function viewDocument()
    {
        $id = Auth()->id();
        $docs = Document::where('Cmp_Id',$id)->get();
        return view('company.viewDocument', compact('docs'));
    }
    
    public function getDocument($id)
    {
        $document = Document::findOrFail($id);
        $filePath = $document->File;
        if( ! Storage::exists($filePath) ) {
          abort(404);
        }
        $pdfContent = Storage::get($filePath);
        $type       = Storage::mimeType($filePath);

        return Response::make($pdfContent, 200, [
          'Content-Type'        => $type,
        ]);
    }
    
    public function add()
    {
        $jobApplications = Job_applications::where('Status','Pending')->whereHas('Job_post',function($query){
            $query->where('Cmp_Id',Auth()->id());
        })->get();
        return view('company.add')->with('jobApplications',$jobApplications);
    }
    
    public function confirm()
    {
        return view('company.confirm');
    }
    
    public function evaluation($sid)
    {
        if(company_evaluations::where('Stud_Id',$sid)->first() == null){
            $cs =  Company_student::where('Stud_Id','=',$sid)->first();
            if($cs == null){
                return redirect('/company/_list');
            }
            $stud =Student::find($sid);
            
            return view('company.evaluation', compact(['cs','stud']));
        }else{
            return redirect('/company/_list')->with('message', 'Evaluation already done!');
        }
       
    }
    
    public function submitEva(Request $request)
    {   
        Validator::make($request->all(), [
        'score.0' => 'required|integer|between:0,6',  
        'score.1' => 'required|integer|between:0,6',  
        'score.2' => 'required|integer|between:0,6',  
        'score.3' => 'required|integer|between:0,6',  
        'score.4' => 'required|integer|between:0,6',  
        'score.5' => 'required|integer|between:0,6', 
        'score.6' => 'required|integer|between:0,6',
        'score.7' => 'required|integer|between:0,6',
        'score.8' => 'required|integer|between:0,6',
        'score.9' => 'required|integer|between:0,6',
        'withoutPermission' => 'required|integer|between:0,31',
        'withPermission' => 'required|integer|between:0,31',
        'grade' => 'required|in:A,A-,B+,B,B-,C+,C,F',
        'comment' =>  'max:1000',
        'progOfTraining' =>  'required|string|max:1000',
        ])->validate();
        
        $students = Company_student::where('Stud_Id','=',$request['Stud_Id'])->first();
        $s = Student::where('Stud_Id',$request['Stud_Id'])->first();
        $ce = new Company_evaluations();
        $ce->Q1 = $request->score[0];
        $ce->Q2 = $request->score[1];
        $ce->Q3 = $request->score[2];
        $ce->Q4 = $request->score[3];
        $ce->Q5 = $request->score[4];
        $ce->Q6 = $request->score[5];
        $ce->Q7 = $request->score[6];
        $ce->Q8 = $request->score[7];
        $ce->Q9 = $request->score[8];
        $ce->Q10 = $request->score[9];
        $ce->WithPermission = $request->withPermission;
        $ce->WithoutPermission = $request->withoutPermission;
        $ce->Grade = $request->grade;
        $ce->Comment = $request->comment;
        $ce->ProgOfTraining = $request->progOfTraining;
        $ce->SupervisorName = $students->PersonInCharged;
        $ce->Date = Carbon::now()->format('d/m/Y');
        $ce->Designation = $students->PicPosition;
        $ce->Stud_Id = $students->Stud_Id;
        $ce->Cmp_Id = $students->Cmp_Id;
        $ce->save();
        $s->Cmp_Eva = ($request->score[0] + $request->score[1] + 
                       $request->score[2] + $request->score[3] +
                       $request->score[4] + $request->score[5] +
                       $request->score[6] + $request->score[7] +
                       $request->score[8] + $request->score[9]
                );
        $s->save();
        
        return redirect('/company/companyHome')->with('message', 'Evaluation has been done!');
    }
    
    public function info($sid)
    {
        if(Company_student::where('Stud_Id',$sid)->first()){
        $student = Student::where('Stud_Id',$sid)->first();
        $program = $student->program;
        $exps = $student->experiences;
        $edus = $student->educations; 
        $skillBeginner = Skill::where('Stud_Id',$sid)->where('Proficiency','Beginner')->get();
        $skillIntermediate = Skill::where('Stud_Id',$sid)->where('Proficiency','Intermediate')->get();
        $skillAdvanced = Skill::where('Stud_Id',$sid)->where('Proficiency','Advanced')->get();
        $languages = $student->languages;
        $add_infos = $student->additional_info; 
        
        return view('company.info',compact('student','program','exps','edus','skillBeginner','skillIntermediate','','skillAdvanced','languages','add_infos'));
        }else{
           return redirect('/company/_list');
        }
    }
    
    public function _list()
    {
        $cid = Auth::user()->getId();
        $students = Company_student::where('Cmp_Id','=',$cid)->join('students','students.Stud_Id','=','company_student.Stud_Id')->get();
        return view('company._list',compact('students','cid'));
    }
	
	public function acceptApplicant($Stud_Id,$Job_Id)
    {
        $jobApplication = Job_applications::where('Stud_Id',$Stud_Id)->where('Job_Id',$Job_Id)->first();
        $jobApplication->Status = "Accepted";        
        $jobApplication->save();
        
        return $this->add();
    }
	
	public function rejectApplicant($Stud_Id,$Job_Id)
    {
        $jobApplication = Job_applications::where('Stud_Id',$Stud_Id)->where('Job_Id',$Job_Id)->first();
        $jobApplication->Status = "Rejected";        
        $jobApplication->save();
        
        return $this->add();
    }
	
	public function showJobDetail($Job_Id)
    {
        $job = Job_post::find($Job_Id);
        return view('company.jobPostDetail')->with('job',$job);        
    }
    
    public function post()
    {
        return view('company.jobPost');
    }
	
	public function postJob(Request $request)
    {
        $validatedData = $request->validate([
           'title' => 'required|max:50',
           'qualification' => 'required|in:Diploma,Degree,Internship',
           'minAllowance' => 'regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/|nullable',
           'maxAllowance' => 'regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/|nullable',
           'description' => 'required|max:500',
           'location' => 'required|in:Johor,Kedah,Kelantan,Kuala Lumpur,Labuan,Melaka,Negeri Sembilan,Pahang,Penang,Perak,Perlis,Putrajaya,Sabah,Sarawak,Selangor,Terengganu',
           'processTime' => 'max:20',
           'dressCode' => 'max:50',
           'Benefits' => 'max:100',
           'WorkingDays' => 'max:100',
           'WorkingHours' => 'max:100'
        ]);
            
        $addpost = new Job_post();
        $addpost->Title = $request->input('title');
        $id = Auth()->id();
        $addpost->Cmp_Id = $id;
        $addpost->Qualification = $request->input('qualification');
        $addpost->MinAllowance = $request->input('minAllowance');
        $addpost->MaxAllowance = $request->input('maxAllowance');
        $addpost->Descript = $request->input('description');
        $addpost->Location = $request->input('location');
        $addpost->ProcessTime = $request->input('processTime');
        $addpost->DressCode = $request->input('dressCode');
        $addpost->Benefits = $request->input('Benefits');
        $addpost->WorkingDays = $request->input('WorkingDays');
        $addpost->WorkingHours = $request->input('WorkingHours');
        $addpost->PostDT = Carbon::now();
        
        $addpost->save();
        
        return redirect()->route('companyHome');
    }
	
     public function home()
    {
        $id = Auth()->id();
        $myJobPost = Job_post::where('Cmp_Id',$id)->orderBy('Job_Id','DESC')->get();
        return view('company.home')->with('job_posts',$myJobPost);
    }
	
	public function editPost($Job_Id)
    {
        $jobPost = Job_post::find($Job_Id);
        if($jobPost!=null) 
        {
            return view('company.editPost')->with('job',$jobPost);
        }
        else 
        {
            return redirect()->route('companyHome');
        }
    }
	
	public function updatePost(Request $request,$Job_Id)
    {
        $validatedData = $request->validate([
           'title' => 'required|max:50',
           'qualification' => 'required|in:Diploma,Degree,Internship',
           'minAllowance' => 'regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/|nullable',
           'maxAllowance' => 'regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/|nullable',
           'description' => 'required|max:500',
           'location' => 'required|in:Johor,Kedah,Kelantan,Kuala Lumpur,Labuan,Melaka,Negeri Sembilan,Pahang,Penang,Perak,Perlis,Putrajaya,Sabah,Sarawak,Selangor,Terengganu',
           'processTime' => 'max:20',
           'dressCode' => 'max:50',
           'Benefits' => 'max:100',
           'WorkingDays' => 'max:100',
           'WorkingHours' => 'max:100'
        ]);
        
        $jobPost = Job_post::find($Job_Id);
        if($jobPost!=null)
        {
            $jobPost->Title = $request->input('title');
            $jobPost->Qualification = $request->input('qualification');
            $jobPost->MinAllowance = $request->input('minAllowance');
            $jobPost->MaxAllowance = $request->input('maxAllowance');
            $jobPost->Descript = $request->input('description');
            $jobPost->Location = $request->input('location');
            $jobPost->ProcessTime = $request->input('processTime');
            $jobPost->DressCode = $request->input('dressCode');
            $jobPost->Benefits = $request->input('Benefits');
            $jobPost->WorkingDays = $request->input('WorkingDays');
            $jobPost->WorkingHours = $request->input('WorkingHours');
            
            $jobPost->save();            
            
            return $this->showJobDetail($Job_Id);
        }
        else
        {
            return $this->home();
        }
    }
    
    //New Controller
    public function studentResume($Stud_Id)
    {
        $studDetail = Student::find($Stud_Id);
        if($studDetail!=null)
        {
            $program = $studDetail->program;
            $exps = $studDetail->experiences;
            $edus = $studDetail->educations;
            $skillBeginner = Skill::where('Stud_Id',$Stud_Id)->where('Proficiency','Beginner')->get();
            $skillIntermediate = Skill::where('Stud_Id',$Stud_Id)->where('Proficiency','Intermediate')->get();
            $skillAdvanced = Skill::where('Stud_Id',$Stud_Id)->where('Proficiency','Advanced')->get();
            $languages = $studDetail->languages;
            $add_infos = $studDetail->additional_info; 
        
            return view('company.studentResume',
			compact('studDetail','program','exps','edus','skillBeginner','skillIntermediate','','skillAdvanced','languages','add_infos'));
        }
        else
        {
            return $this->add();
        }        
    }
    
    public function confirmStudentForm($Stud_Id,$Job_Id)
    {
        $student = Student::find($Stud_Id);
        $job = Job_post::find($Job_Id);
        if($student!=null && $job!=null)
        {
            return view('company.confirmStudentForm')->with('student',$student)->with('job',$job);
        }
        else {return redirect()->route('companyHome');}
    }
    
    public function submitConfirmStudent(Request $request,$Stud_Id,$Job_Id)
    {
        $validatedData = $request->validate([
           'PersonInCharged' => 'required|max:30',
           'PicPosition' => 'required|max:50',
           'Allowance' => 'required|regex:/^\s*(?=.*[1-9])\d*(?:\.\d{1,2})?\s*$/'
        ]);
        
        $student = Student::find($Stud_Id);
        $job = Job_post::find($Job_Id);
        if($student!=null && $job!=null)
        {            
            $jobApplication = Job_applications::where('Stud_Id',$Stud_Id)->where('Job_Id',$Job_Id)->first();
            $companyStudent = new Company_student();
            $companyStudent->Stud_Id = $student->Stud_Id;
            $companyStudent->Cmp_Id = $job->company->Cmp_Id;
            $companyStudent->PersonInCharged = $request->input('PersonInCharged');
            $companyStudent->PicPosition = $request->input('PicPosition');
            $companyStudent->Status = "Pending";
            $companyStudent->Descript = $job->Descript;
            $companyStudent->Allowance = $request->input('Allowance');
            $companyStudent->DressCode = $job->DressCode;
            $companyStudent->WorkingDays = $job->WorkingDays;
            $companyStudent->WorkingHours = $job->WorkingHours;
            $companyStudent->Benefits = $job->Benefits;
            $companyStudent->Accomodation = 1;
            $jobApplication->Status = "Accepted";      
            $companyStudent->save();
            $jobApplication->save();
            return redirect()->route('add');
        }        
        else {return redirect()->route('companyHome');}
    }
    
    //NEW UPDATE 
    public function viewReportList($sid)
    {
        $rl = Report::where('Stud_id','=',$sid)->get();
        return view('company.viewReportList', compact('rl','sid'));
    }
    
     public function updateViewReport($rid)
    {
        $report = Report::join('schedules','schedules.Sch_Id','=','reports.Sch_Id')->where('Report_Id','=',$rid)->first();   
        $id = $report->Stud_Id;
        $report->Cmp_Status = "approved";
        $report->updated_at = new DateTime('now');
        
        $report->save();
        
        return back();
    }
    
    public function viewReport($rid)
    {
        $id = Auth()->id();
        $cmp = Company::where('Cmp_Id',$id)->first();
        $report = Report::join('schedules','schedules.Sch_Id','=','reports.Sch_Id')->where('Report_Id','=',$rid)->first();   
        $leave = Leave::where('Report_Id',$rid)->get();
         
        return view('company.viewReport', compact('report','cmp','leave'));
    }}
