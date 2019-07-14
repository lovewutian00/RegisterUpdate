<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use App\Company;
use App\Company_Student;
use App\Report;
use App\Schedule;
use App\Leave;
use App\Supervisor;
use App\Student_Supervisor;
use App\Evaluation;
use App\Company_Visit;
use App\Visit_Feedback;
use App\Batch;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:supervisor')->except(['login','showLoginForm']);
        $this->middleware('guest')->only(['login','showLoginForm']);
    }
    
     public function home()
    {
        return view('supervisor.studentList');
    }
    
    public function studentList(Request $request)
    {
        $id = Auth::user()->getId();

        $records = collect();
        $students = Student_Supervisor::where('Spv_Id', $id)->get();       
        $batchs = collect();

        if($request->query('bid') == null || $request->query('bid') == "")
        {
            foreach($students as $student){
                $stud = Student::find($student)->first();
                $check = Report::where('Stud_Id', $student->Stud_Id)->count();
                $batch = Batch::where('Batch_Id', $stud->Batch_Id)->first();
                if(!$batchs->contains($batch)){
                    $batchs->push($batch);
                }
                $records->push(array($stud,$check));                
            }
        }
        else
        {
            foreach($students as $student){
                $stud = Student::find($student)->first();
                $check = Report::where('Stud_Id', $student->Stud_Id)->count();
                $batch = Batch::where('Batch_Id', $stud->Batch_Id)->first();
                if(!$batchs->contains($batch)){
                    $batchs->push($batch);
                }

                $b = $request->query('bid');
                if($stud->Batch_Id == $b){
                    $records->push(array($stud,$check));                
                }       
            }             
        }
        return view('supervisor.studentList', compact('records','batchs'));

    }
    
    public function details($id)
    {
        $students = Student::where('Stud_Id', $id)->get();
        $spvId = Auth::user()->getId();
        $check = Student_Supervisor::where('Spv_Id', $spvId)->where('Stud_Id', $id)->first();    
        
        if ($check == null) {
            return redirect('/supervisor/studentList');
        }
        
        $reports = Report::where('Stud_Id', $id)->count();
        
        return view('supervisor.studentDetails', compact('students', 'reports'));
    }
    
    public function companyVisit()
    {     
        $records = collect();
        $id = Auth::user()->getId();
        $visits = Company_Visit::where('Spv_Id',$id)->get();        
        
        foreach($visits as $data)
        {
            $companies = Company::where('Cmp_Id', $data->Cmp_Id)->get();  
            $date = Company_Visit::where('Cmp_Id', $data->Cmp_Id)->where('Visit_Id', $data->Visit_Id)->get();              
            $check = Visit_Feedback::where('Visit_Id', $data->Visit_Id)->get();
            
            if (!($check->count() == 1 && Carbon::now()->diffInDays($data->VisitDT, false) < -7)) {
                $records->push(array($companies,$date,$check));
            }           
        }
       
        return view('supervisor.companyVisit', compact('records'));
    }
    
    public function visitFeedback($id)
    {
        $visit = Company_Visit::where('Visit_Id', $id)->first();
        $spvid = Auth::user()->getId();
        $check = Company_Visit::where('Visit_Id', $id)->where('Spv_Id', $spvid)->first();
        if ($visit == null || $check == null) {
            return redirect('/supervisor/companyVisit');
        }
        
        $cmp = Company::where('Cmp_Id', $visit->Cmp_Id)->first();
        $feedback = Visit_Feedback::where('Visit_Id', $id)->first();
        
        return view('supervisor.visitFeedback', compact('cmp','visit', 'feedback'));
    }
    
    public function submitFB(Request $request)
    {      
        Validator::make($request->all(), [
        'feedback' => 'required|string',  
        ])->validate();
        
        $check = Visit_Feedback::where('Visit_Id', $request->Visit_Id)->first();
        
        if ($check == null) {
        $vf = new Visit_Feedback();
        $vf->Feedback = $request->feedback;
        $vf->Visit_Id = $request->Visit_Id;
        $vf->updated_at = null;
        $vf->save();
        }
        else{
        $vf = Visit_Feedback::where('Visit_Id', $request->Visit_Id)->first();
        $vf->Feedback = $request->feedback;
        $vf->save();  
        }
        
        return redirect()->to(route('companyVisit'));
    }
    
    public function reportList($id)
    {
        $reports = Report::where('Stud_id', $id)->where('Cmp_Status', 'approved')->get();                   
        $student = Student::where('Stud_id', $id)->first();
        $spvId = Auth::user()->getId();
        $validate = Student_Supervisor::where('Spv_Id', $spvId)->where('Stud_Id', $id)->first();    
        
        if ($student == null || $validate == null) {
            return redirect('/supervisor/studentList');
        }
        
        $check = Evaluation::where('Stud_Id', $id)->first();
        
        return view('supervisor.reportList', compact ('reports', 'student', 'check'));
    }
    
    public function viewReport($studid,$repid)
    {
        $report = Report::where('Report_Id', $repid)->where('Stud_Id', $studid)->first();
        
        if ($report == null) {
            return redirect()->route('reportList', [$studid]);
        }
        
        $schid = Report::where('Sch_Id', $report->Sch_Id)->first();
        $sch = Schedule::where('Sch_Id', $schid->Sch_Id)->first();
        $leave = Leave::where('Report_Id', $report->Report_Id)->get();
        $cmpid = Company_Student::where('Stud_Id', $report->Stud_Id)->first();
        $cmp = Company::where('Cmp_Id', $cmpid->Cmp_Id)->first();
        
        return view('supervisor.viewReport', compact('report', 'sch', 'leave', 'cmp'));
    }
    
    public function evaluation($id)
    {
        $spvId = Auth::user()->getId();
        $check = Student_Supervisor::where('Spv_Id', $spvId)->where('Stud_Id', $id)->first();    
        
        if ($check == null) {
            return redirect('/supervisor/studentList');
        }

        $eva = Evaluation::where('Spv_Id', $spvId)->where('Stud_Id', $id)->first();
        
        $stud = Student::where('Stud_Id', $id)->first();
        $reports = Report::where('Stud_id', $id)->where('Cmp_Status', 'approved')->get();         
        if ($reports->count() < 4) {
           return redirect('/supervisor/studentList');
        }
        
        $repDate = Report::where('Stud_Id', $id)->orderBy('created_at')->take(4)->pluck('created_at');
        $spvid = Student_Supervisor::where('Stud_Id', $id)->pluck('Spv_Id');
        $studid = $id;
        $spv = Supervisor::where('Spv_Id', $spvid)->first();
        
        return view('supervisor.evaluation', compact('repDate', 'spv', 'studid', 'stud', 'eva'));
    }
    
    public function submit(Request $request)
    {      
        Validator::make($request->all(), [
        'score.0' => 'required|integer|between:0,5',  
        'score.1' => 'required|integer|between:1,7',  
        'score.2' => 'required|integer|between:1,7',  
        'score.3' => 'required|integer|between:0,3',  
        'score.4' => 'required|integer|between:1,12',  
        'score.5' => 'required|integer|between:1,6',  
        ])->validate();
        
        $eva = new Evaluation();
        $eva->A1 = $request->score[0];
        $eva->A2 = $request->score[1];
        $eva->A3 = $request->score[2];
        $eva->B1 = $request->score[3];
        $eva->B2 = $request->score[4];
        $eva->B3 = $request->score[5];
        $eva->Total = ($request->score[0] + $request->score[1] + 
                       $request->score[2] + $request->score[3] +
                       $request->score[4] + $request->score[5]);
        $eva->Comment = $request->input('comment');
        $eva->Stud_Id = $request['Stud_Id'];
        $eva->Spv_Id = $request['Spv_Id'];   
        $eva->save();
        
        return redirect()->to(route('reportList', $request['Stud_Id']));
    }
    
    use AuthenticatesUsers;
    
    public function showLoginForm(){
        return view('supervisor.login');
    }
    
    public function credentials(Request $request) {
        return $request->only('email','password');
    }
    
    public function username(){
        return 'email';
    }
    
    protected function guard(){
        return Auth::guard('supervisor');
    }
    
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
        ]);
    }
    
    public function login(Request $request)
    {
//        $this->validateLogin($request);
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
        return '/supervisor/';
    }
}
