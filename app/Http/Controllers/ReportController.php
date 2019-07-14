<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Leave;
use App\Student;
use App\Schedule;
use App\Program;
use App\Batch;
use App\program_batch;
use Carbon\Carbon;
use App\Company;
use App\Company_student;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    
    public function index()
    {
        //All the student records, student batch, the batch schedules, and the student submmited reports.
        $stud = Student::find($this->get_stud_id());
        $batch = $stud->batch;
        $schedules = $batch->schedules;  
        $reports = $stud->reports;
        //All the submmited report's schedule ids 
        $submmited_schedule_ids = $reports->pluck('Sch_Id');
        //All the unsubmit and submmited schedule id's of student batch
        $unsubmit_schedules = Schedule::whereNotIn('Sch_Id', $submmited_schedule_ids)
                ->where('Batch_Id',$batch->Batch_Id)->orderBy('Sch_Date','asc')->get();
        $submitted_schedules = Schedule::whereIn('Sch_Id', $submmited_schedule_ids)
                ->where('Batch_Id',$batch->Batch_Id)->orderBy('Sch_Date','asc')->get();
                
        return view('student.report',compact('unsubmit_schedules','submitted_schedules'));
    }
        
    public function create(Schedule $id)
    {     
        $leaves_count = Leave::join('reports','leaves.Report_Id','=','reports.Report_Id')
                ->where('reports.Stud_Id',$this->get_stud_id())
                ->count();
        $company = Company_student::where('Stud_Id',Auth::user()->getId())->first();
        
        if($company){
            $company_detail = Company::where('Cmp_Id',$company->Cmp_Id)->first();
            return view('student.report_form',compact('id','leaves_count','company_detail'));
        }
        else
            return redirect()->route('report.index');  
    }

    public function store(Request $request)
    {
        //Report field validation
        $validated = request()->validate([
            'Trainee_Name' => 'min:3|string|required', 
            'Activity_1' => 'nullable|present',
            'Activity_2' => 'nullable|present',
            'Activity_3' => 'nullable|present',
            'Activity_4' => 'nullable|present',
            'Additional_Info' => 'nullable',
            'Sign' => 'accepted',
            'Leave_Date' => 'array|max:6',
            'Leave_Date.0' => 'required_with:Leave_Reason.0|required_with:Cmp_Approve.0|required_with:Spv_Approve.0|required_with:Leave_Day.0|date|before_or_equal:today|nullable',
            'Leave_Date.1' => 'required_with:Leave_Reason.1|required_with:Cmp_Approve.1|required_with:Spv_Approve.1|required_with:Leave_Day.1|date|before_or_equal:today|nullable',
            'Leave_Date.2' => 'required_with:Leave_Reason.2|required_with:Cmp_Approve.2|required_with:Spv_Approve.2|required_with:Leave_Day.2|date|before_or_equal:today|nullable',
            'Leave_Date.3' => 'required_with:Leave_Reason.3|required_with:Cmp_Approve.3|required_with:Spv_Approve.3|required_with:Leave_Day.3|date|before_or_equal:today|nullable',
            'Leave_Date.4' => 'required_with:Leave_Reason.4|required_with:Cmp_Approve.4|required_with:Spv_Approve.4|required_with:Leave_Day.4|date|before_or_equal:today|nullable',
            'Leave_Date.5' => 'required_with:Leave_Reason.5|required_with:Cmp_Approve.5|required_with:Spv_Approve.5|required_with:Leave_Day.5|date|before_or_equal:today|nullable',
            'Leave_Day' => 'array|max:6',
            'Leave_Day.0' => 'required_with:Leave_Reason.0|required_with:Cmp_Approve.0|required_with:Spv_Approve.0|required_with:Leave_Date.0|in:Half Day,Full Day',
            'Leave_Day.1' => 'required_with:Leave_Reason.1|required_with:Cmp_Approve.1|required_with:Spv_Approve.1|required_with:Leave_Date.1|in:Half Day,Full Day',
            'Leave_Day.2' => 'required_with:Leave_Reason.2|required_with:Cmp_Approve.2|required_with:Spv_Approve.2|required_with:Leave_Date.2|in:Half Day,Full Day',
            'Leave_Day.3' => 'required_with:Leave_Reason.3|required_with:Cmp_Approve.3|required_with:Spv_Approve.3|required_with:Leave_Date.3|in:Half Day,Full Day',
            'Leave_Day.4' => 'required_with:Leave_Reason.4|required_with:Cmp_Approve.4|required_with:Spv_Approve.4|required_with:Leave_Date.4|in:Half Day,Full Day',
            'Leave_Day.5' => 'required_with:Leave_Reason.5|required_with:Cmp_Approve.5|required_with:Spv_Approve.5|required_with:Leave_Date.5|in:Half Day,Full Day',
            'Leave_Reason' =>'array|max:6',
            'Leave_Reason.0' => 'required_with:Leave_Date.0|required_with:Cmp_Approve.0|required_with:Spv_Approve.0|required_with:Leave_Day.0',
            'Leave_Reason.1' => 'required_with:Leave_Date.1|required_with:Cmp_Approve.1|required_with:Spv_Approve.1|required_with:Leave_Day.1',
            'Leave_Reason.2' => 'required_with:Leave_Date.2|required_with:Cmp_Approve.2|required_with:Spv_Approve.2|required_with:Leave_Day.2',
            'Leave_Reason.3' => 'required_with:Leave_Date.3|required_with:Cmp_Approve.3|required_with:Spv_Approve.3|required_with:Leave_Day.3',
            'Leave_Reason.4' => 'required_with:Leave_Date.4|required_with:Cmp_Approve.4|required_with:Spv_Approve.4|required_with:Leave_Day.4',
            'Leave_Reason.5' => 'required_with:Leave_Date.5|required_with:Cmp_Approve.5|required_with:Spv_Approve.5|required_with:Leave_Day.5',
            'Cmp_Approve' =>'array|max:6',
            'Cmp_Approve.0' => 'required_with:Leave_Date.0|required_with:Leave_Reason.0|required_with:Spv_Approve.0|required_with:Leave_Day.0|in:Yes,No',
            'Cmp_Approve.1' => 'required_with:Leave_Date.1|required_with:Leave_Reason.1|required_with:Spv_Approve.1|required_with:Leave_Day.1|in:Yes,No',
            'Cmp_Approve.2' => 'required_with:Leave_Date.2|required_with:Leave_Reason.2|required_with:Spv_Approve.2|required_with:Leave_Day.2|in:Yes,No',
            'Cmp_Approve.3' => 'required_with:Leave_Date.3|required_with:Leave_Reason.3|required_with:Spv_Approve.3|required_with:Leave_Day.3|in:Yes,No',
            'Cmp_Approve.4' => 'required_with:Leave_Date.4|required_with:Leave_Reason.4|required_with:Spv_Approve.4|required_with:Leave_Day.4|in:Yes,No',
            'Cmp_Approve.5' => 'required_with:Leave_Date.5|required_with:Leave_Reason.5|required_with:Spv_Approve.5|required_with:Leave_Day.5|in:Yes,No',
            'Spv_Approve' =>'array|max:6',
            'Spv_Approve.0' => 'required_with:Leave_Date.0|required_with:Leave_Reason.0|required_with:Cmp_Approve.0|required_with:Leave_Day.0|in:Yes,No',
            'Spv_Approve.1' => 'required_with:Leave_Date.1|required_with:Leave_Reason.1|required_with:Cmp_Approve.1|required_with:Leave_Day.1|in:Yes,No',
            'Spv_Approve.2' => 'required_with:Leave_Date.2|required_with:Leave_Reason.2|required_with:Cmp_Approve.2|required_with:Leave_Day.2|in:Yes,No',
            'Spv_Approve.3' => 'required_with:Leave_Date.3|required_with:Leave_Reason.3|required_with:Cmp_Approve.3|required_with:Leave_Day.3|in:Yes,No',
            'Spv_Approve.4' => 'required_with:Leave_Date.4|required_with:Leave_Reason.4|required_with:Cmp_Approve.4|required_with:Leave_Day.4|in:Yes,No',
            'Spv_Approve.5' => 'required_with:Leave_Date.5|required_with:Leave_Reason.5|required_with:Cmp_Approve.5|required_with:Leave_Day.5|in:Yes,No'
        ]);
        
        //schid validation
        $schedule = Schedule::find($request->schid);
        $student = Student::find($this->get_stud_id());
        $check_batch = '';
        $check_submmit = '';
        
        if($schedule && $student){
            //check wheter the schedule's batch belongs to student
            $check_batch = Student::where('Stud_Id',$student->Stud_Id)->where('Batch_Id',$schedule->Batch_Id)->first();
            //check whether the report is submmitted or ubsubmit
            $check_submmit = Report::where('Stud_Id',$student->Stud_Id)->where('Sch_Id',$schedule->Sch_Id)->first();
        }

        //Only can access when schedule id is valid
        if($check_batch!= '' && $check_submmit == '' ){
            $today = Carbon::now(); 
            $status = '';

            if($schedule->Sch_Date < $today){
                $status = 'Overdue';
            }
            else{
                $status = 'On Time';
            }

            $report = new Report([
                'Trainee_Name' => $request->Trainee_Name,
                'Activity_1' => $request->Activity_1,
                'Activity_2' => $request->Activity_2,
                'Activity_3' => $request->Activity_3,
                'Activity_4' => $request->Activity_4,
                'Additional_Info' => $request->Additional_Info,
                'Sign' => $request->Sign,
                'Spv_Status' => 'Uncheck',
                'Cmp_Status' => 'Uncheck',
                'Status' => $status
            ]);

            $data = [];
            if($request->has('Leave_Day')&&$request->has('Leave_Date')&&$request->has('Leave_Reason')&&$request->has('Spv_Approve')&&$request->has('Cmp_Approve')){
                for($i=0;$i<count($request->Leave_Day);$i++)
                {
                    if($request->Leave_Day[$i] != null && $request->Leave_Date[$i] != null && $request->Leave_Reason[$i] != null
                            && $request->Cmp_Approve[$i] != null && $request->Spv_Approve[$i] != null){
                            $data[]= new Leave ([
                            'Leave_Date' => $request->Leave_Date[$i],
                            'Leave_Day' => $request->Leave_Day[$i],
                            'Leave_Reason' => $request->Leave_Reason[$i],
                            'Cmp_Approve' => $request->Cmp_Approve[$i],
                            'Spv_Approve' => $request->Spv_Approve[$i]   
                            ]);
                        }
                }       
                $report->schedule()->associate($schedule);
                $report->student()->associate($student);
                $report->save();
                $report->leaves()->saveMany($data); 
            }
        }
             
        return redirect()->route('report.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    
    public function get_stud_id(){
        return Auth::user()->getId();
    }
}
