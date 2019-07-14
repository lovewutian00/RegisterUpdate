<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use App\Supervisor;
use App\Company;
use App\Document;
use App\Student_Supervisor;
use Storage;
use Response;
use Mail;
use Validator;
use App\Survey_result;
use App\Company_evaluations;

class AdminController extends Controller
{
    public function studentList()
    {
        $studName = Input::get('studName');
        $records = collect();
        
        if ($studName != null) {
            $students = Student::where('FirstName', 'LIKE', '%' . $studName . '%')
                    ->orWhere('LastName', 'LIKE', '%' . $studName . '%')
                    ->get();         
            
            foreach($students as $student){
                $check = Student_Supervisor::where('Stud_Id', $student->Stud_Id)->count();
                if($check==1){
                    $assign = 'Assigned';
                    $records->push(array($student,$assign));
                }else{
                    $assign = 'Unassign';
                    $records->push(array($student,$assign));
                }
            }
        }
        else{
            $students = Student::all();
            
            foreach($students as $student){
                $check = Student_Supervisor::where('Stud_Id', $student->Stud_Id)->count();
                if($check==1){
                    $assign = 'Assigned';
                    $records->push(array($student,$assign));
                }else{
                    $assign = 'Unassign';
                    $records->push(array($student,$assign));
                }
            }
        }
        
        foreach($records as $key => $record){
            if($record[1]=='Assigned'){
                $records->forget($key);
                $records->push($record);
            }  
        }
        
        return view('admin.studentList', compact('records'));

    }
    
    public function studDetails($id)
    {
        $students = Student::where('Stud_Id', $id)->get();
        $check = Student_Supervisor::where('Stud_Id', $id)->count();
        
        return view('admin.studentDetails', compact('students', 'check'));
    }
    
    public function supervisorList()
    {
        $spvName = Input::get('spvName');
        $records = collect();
        
        if ($spvName != null) {
            $supervisors = Supervisor::where('Spv_Name', 'LIKE', '%' . $spvName . '%')->get();         
            
            foreach($supervisors as $supervisor){
                $spv = Supervisor::find($supervisor)->first();
                $check = Student_Supervisor::where('Spv_Id', $supervisor->Spv_Id)->count();
                $records->push(array($spv,$check));   
            }
        }
        else{
            $supervisors = Supervisor::all();
            
            foreach($supervisors as $supervisor){
                $spv = Supervisor::find($supervisor)->first();
                $check = Student_Supervisor::where('Spv_Id', $supervisor->Spv_Id)->count();
                $records->push(array($spv,$check));
            }
            
        }
        return view('admin.supervisorList', compact('records'));

    }
    
     public function spvDetails($id)
    {
        $studName = Input::get('studName');
        $records = collect();
        $spvid = Supervisor::where('Spv_Id', $id)->first();
        $count = Student_Supervisor::where('Spv_Id', $id)->get();
        
        if ($studName != null) {
            $students = Student_Supervisor::where('Spv_Id', $id)->get();
            foreach($students as $student){
                $stud = Student::where('Stud_Id',$student->Stud_Id)
                                ->where(function($q) use ($studName){
                                  $q->where('FirstName', 'LIKE', '%' . $studName . '%')
                                    ->orWhere('LastName', 'LIKE', '%' . $studName . '%');
                                })->first();
                    
                    if($stud!=null){
                    $records->push(array($stud));
                }
            }   
        }
        else{
            $students = Student_Supervisor::where('Spv_Id', $id)->get();
            foreach($students as $student){
                $stud = Student::find($student)->first();
                $records->push(array($stud));
            }
        }
        return view('admin.supervisorDetails', compact('records', 'spvid','count'));

    }
    
    public function spvAssign($id)
    {
        $records = collect();
        $spv = Supervisor::where('Spv_Id', $id)->first();
        $students = Student::all();
            
        foreach($students as $student){
            $check = Student_Supervisor::where('Stud_Id', $student->Stud_Id)->count();
            if($check==1){
                $assign = 'Assigned';
                $records->push(array($student,$assign));
            }else{
                $assign = 'Unassign';
                $records->push(array($student,$assign));
            }
        }
        
        foreach($records as $key => $record){
            if($record[1]=='Assigned'){
                $records->forget($key);
                $records->push($record);
            }  
        }
        return view('admin.supervisorAssign', compact('spv', 'records'));
    }
    
    public function store(Request $request)
    {
        $request->merge([ 
        'students' => implode(',', (array) $request->get('students'))
         ]);
        $students = explode(',', $request->input('students'));
        $count = Student_Supervisor::where('Spv_Id', $request->input('Spv_Id'))->count();
        $check = $count + count($students);
        if($check > 10){
            return redirect()->back()->with('Warning','Must not exceed 10 students');
        }else{
            if($students[0]!=null){
                foreach($students as $data)
                {
                    $stud_spv = new Student_Supervisor();
                    $stud_spv->Stud_Id = $data;
                    $stud_spv->Spv_Id = $request->input('Spv_Id');
                    $stud_spv->save();
                }
                return redirect()->back()->with('Success','Assign Success');
            }
            return redirect()->back()->with('Warning','Please select at least one student');
        }
    }
    
    public function remove(Request $request)
    {
        $stud = Input::get('Stud_Id');
        Student_Supervisor::where('Stud_Id', $stud)->delete();
        
        return redirect()->back()->with('Success','Successfully Unassign');
    }
    
    public function studAssign($id)
    {
        if (!Student::where('Stud_Id',$id)->exists()) {
            return redirect()->to(route('studList'))->with('Warning','Error : Student does not exist.');
        }
        if (Student_Supervisor::where('Stud_Id',$id)->first()) {
            return redirect()->to(route('studList'))->with('Warning','Error : Student has already assigned.');
        }
        
        $records = collect();
        
        $spvName = Input::get('spvName');
        $records = collect();
        
        if ($spvName != null) {
            $supervisors = Supervisor::where('Spv_Name', 'LIKE', '%' . $spvName . '%')->get();         
            
            foreach($supervisors as $supervisor){
                $check = Student_Supervisor::where('Spv_Id', $supervisor->Spv_Id)->count();
                $records->push(array($supervisor,$check));
            }
        }
        else{
            $supervisors = Supervisor::all();
            $studid = Student::where('Stud_Id', $id)->first();    

            foreach($supervisors as $supervisor){
                $check = Student_Supervisor::where('Spv_Id', $supervisor->Spv_Id)->count();
                $records->push(array($supervisor,$check));
            }
        }
        
        foreach($records as $key => $record){
            if($record[1]=='Available'){
                $records->forget($key);
                $records->push($record);
            }  
        }
        $studid = Student::where('Stud_Id', $id)->first();
        return view('admin.studentAssign', compact('records','studid'));
    }
    
    public function save(Request $request)
    {
        $student = $request['Stud_Id'];
        $count = Student_Supervisor::where('Spv_Id', $request['Spv_Id'])->count();
        if($count >= 10){
            return redirect()->back()->with('Warning','Supervisor already have 10 students');
        }else{
            $stud_spv = new Student_Supervisor();
            $stud_spv->Stud_Id = $student;
            $stud_spv->Spv_Id = $request->input('Spv_Id');
            $stud_spv->save();
            return redirect()->to(route('studList'))->with('Success','Assign Success');
        }
    }
    
    public function companyVisitList()
    {       
        return view('admin.companyVisitList');
    }
    
    public function approveList()
    {
        $Cmps = Company::where('is_activated',2)->get();
        return view('admin.approveList', compact('Cmps'));
    }
    
    public function viewCompany($id){
        $Cmp = Company::find($id);
        return view('admin.viewCompany', compact('Cmp'));
    }
    
    public function approve($id)
    {
        $Cmp = Company::find($id);
        $Cmp->update(['is_activated' => 3,'Remark' => '']);
        Mail::send('mail.approve', ['user' => $Cmp], function($message) use ($Cmp){
        $message->to($Cmp->Email);
        $message->subject('ITP System - Approve Annocement');
        });
        return redirect()->to(route('approveList'))->with('Success',"You had approve {$Cmp->Cmp_Name} as a valid company");
    }
    
    public function reject($id,Request $request)
    {
        $Cmp = Company::find($id);
        Validator::make($request->all(), [
            'remark' => 'required|string|max:150'
        ])->validate();
        $Cmp->update(['is_activated' => 1, 'Remark' => $request->remark]);
        Mail::send('mail.rejection', ['user' => $Cmp], function($message) use ($Cmp){
        $message->to($Cmp->Email);
        $message->subject('ITP System - Reject Annocement');
        });
        return redirect()->to(route('approveList'))->with('Warning',"You had reject {$Cmp->Cmp_Name} as a valid company");
    }
    
    public function viewDocument($id)
    {
        $docs = Document::where('Cmp_Id',$id)->get();
        return view('admin.viewDocument', compact('docs','id'));
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
    
    public function showSurvey($sid)
    { 
        if(Survey_result::find($sid)){
            $sr = Survey_result::find($sid);
            return view('admin.showSurvey',compact('sr')); 
        }else{
            return redirect('/admin/studentList');
        }
    }
    
    public function showCompanyEva($sid)
    { 
        if(Company_evaluations::where('Stud_Id',$sid)->first())    {
            $ce = Company_evaluations::where('Stud_Id',$sid)->first();
            $student = Student::where('Stud_Id','17WMR09323')->first();
            return view('admin.showCompanyEva',compact('ce','student')); 
        }else{
            return redirect('/admin/studentList');
        }
    }
}
