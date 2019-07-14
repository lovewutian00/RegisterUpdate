<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Program;
use App\Student;
use App\Company;
use App\Supervisor;
use App\Document;
use App\Batch;
use Mail;
use DB;
use Illuminate\Notifications\Notifiable;
use Validator;
use Session;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['except' => ['logout','getLogout']]);
    }
    
    use Notifiable;
    use AuthenticatesUsers;
    
    public function showLoginMenu()
    {
        return view('home.login');
    }
    
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'Stud_Id'=> 'required|string|unique:students|regex:/[0-9]{2}[A-Z]{3}[0-9]{5}/',
            'FirstName' => 'required|string|max:30',
            'LastName' => 'required|string|max:30',
            'IcNo' =>'string|size:14|unique:students|regex:/[0-9]{6}[-]*[0-9]{2}[-]*[0-9]{4}/',
            'ContactNo' =>'sometimes|string|max:14|min:10|regex:/[0-9]{3}[-]{0,1}[0-9]{7,8}/',
            'Program_Code' =>'required|exists:programs',
            'Email' => 'required|string|email|max:50|unque:students|unique:companies|unique:supervisors',
            'Password' => 'required|string|min:6|confirmed',
            'Gender' => 'required|string|in:Male,Female',
            'Group' => 'required|integer|between:1,20',
            'Month' => 'required|in:1,3,5,9,10',
            'Year' => 'required',
            'Year_Intake' => 'required|integer|between:1,3',
        ],[
            'Stud_Id.required' => 'Student Id is require',
			'Stud_Id.unique' => 'This student already register',
			'Stud_Id.regex' => 'The pattern of Student Id is not correct, e.g: 123XXX12345',
			'IcNo.size' => 'Please follow the pattern of example, e.g:000000-00-0000',
			'ContactNo.max' => 'The size of contact number must between 10 and 14, e.g:000-0000000',
			'Email.max' => 'The max size of email only allow 50 character.',
			'Email.unque' => 'This email had been used.',
			'Group.between' => 'The group number must in between 1 and 20.',
			'Month.in' => 'Only allow Jan, March, May, Sept and Oct'
        ])->validate();
        
        $month = $request->Month;
        $year = $request->Year;
        $batch = Batch::where('Year_Intake',$year)
                ->where('Month_Intake',$month)
                ->where('Program_Year_Intake',$request->Year_Intake)
                ->where('Program_Code',$request->Program_Code)
                ->first();
        if($batch){
            try{
            $user = Student::create([
                'Stud_Id' => $request['Stud_Id'],
                'FirstName' => $request['FirstName'],
                'LastName' => $request['LastName'],
                'IcNo' => $request['IcNo'],
                'ContactNo' => $request['ContactNo'],
                'Program_Code' => $request['Program_Code'],
                'Email' => $request['Email'],
                'Password' => Hash::make($request['Password']),
                'Gender' => $request['Gender'],
                'Group' => $request['Group'],
                'Batch_Id' => $batch->Batch_Id,
            ]);

            $user['link'] = str_random(25);
            DB::table('users_activations')->insert(['Stud_Id' => $user['Stud_Id'], 'token' => $user['link']]);
            $to_name = $user->FirstName;
            $to_email = $user->Email;
            Mail::send('mail.activation', ['user' => $user], function($message) use ($to_name,$to_email,$user){
            $message->to($to_email,$to_name);
            $message->subject('ITP System - Activation code');
            $message->from('lovewutian00@gmail.com','TARUCITP');
            });
            
            return redirect()->intended(route('login_menu'))->with('Success','We sent activation code. Please check your email.');
            }catch(\Exception $e){
                return redirect()->intended(route('login_menu'))->with('Warning','Your details had problem please ask admin.');
            }
        }else{
            $errors = new MessageBag();
            $errors->add('Batch', 'The batch is not exist! Please double confirm or info admin.');
            return redirect()->back()->withErrors($errors);
        }
    }
    
    public function _store(Request $request)
    {
        Validator::make($request->all(), [
        'Cmp_Name'=> 'required|string|max:30|unique:companies',
        'PICName' => 'required|string|max:30',
        'ContactNo' =>'sometimes|string|max:14|min:10|regex:/[0-9]{3}[-]{0,1}[0-9]{7,8}/',
        'Email' => 'required|string|email|max:30|unique:students|unique:companies|unique:supervisors',
        'Password' => 'required|string|min:6|confirmed',
        'Avatar' => 'required|image|max:10240|mimes:jpeg,jpg,gif,bmp,png',
        'Document.0' => 'mimes:pdf|required',    
        'Document.*' => 'mimes:pdf|required|distinct'
        ],[
            'Avatar.required' => 'Compang Image is required.',
            'Avatar.image' => 'Please upload image.',
            'Avatar.mimes' => 'Please upload image with correct format.E.g: jpeg,jpg,png',
            'Document.*.required' => 'Please upload required documentation',
            'Document.*.mimes' => 'Document, only pdf file are allowed',
            'Document.0.required' => 'Please upload required documentation',
            'Document.0.mimes' => 'Document, only pdf file are allowed'
        ])->validate();
        
        try{
        $Avatar = request()->file('Avatar'); 
        $ext = $Avatar->extension();
        
        $user = Company::create([
            'Cmp_Name' => $request['Cmp_Name'],
            'PICName' => $request['PICName'],
            'ContactNo' => $request['ContactNo'],
            'Email' => $request['Email'],
            'Password' => Hash::make($request['Password']),
            'Avatar' => "Avatar.{$ext}",
        ]);
        
        $Cmp_Name = preg_replace('/\s+/', '', $user->Cmp_Name);
        $Avatar->storeAs('Avatars/'. $Cmp_Name, "Avatar.{$ext}",'public');
        foreach ($request->Document as $file) {
            $path = $file->store('Docs/'. $Cmp_Name);
            Document::create([
            'Cmp_Id' => $user->Cmp_Id,
            'File' => $path,
        ]);
        }
        $user['link'] = str_random(25);
        DB::table('company_activations')->insert(['Cmp_Id' => $user['Cmp_Id'], 'token' => $user['link']]);
        $to_name = $user->Cmp_Name;
        $to_email = $user->Email;
        
        Mail::send('mail.activation', ['user' => $user], function($message) use ($to_name,$to_email,$user){
        $message->to($to_email,$to_name);
        $message->subject('ITP System - Activation code');
        $message->from('lovewutian00@gmail.com','TARUCITP');
        });
        return redirect()->intended(route('login_menu'))->with('Success','We sent activation code. Please check your email.');
        }catch(\Exception $e){
            return redirect()->intended(route('login_menu'))->with('Warning','Your details had problem please ask admin.');
        }
    }
    
    public function showStudentForm()
    {
        $codes = Program::all();
        $years = Batch::all()->pluck('Year_Intake');
        return view('home.studentRegister', compact('codes','years'));
    }
    
    public function showCompanyForm()
    {
        return view('home.companyRegister');
    }
    
    public function getLogout()
    {
        
        if(Auth::guard('company')->check()){
            Auth::logout('company');
        }
        else if(Auth::guard('student')->check()){
            Auth::logout('student');
            }
        else if(Auth::guard('admin')->check()){
            Auth::logout('admin');
        }
        else if(Auth::guard('supervisor')->check()){
            Auth::logout('supervisor');
        }
        else{
            return redirect()->intended(route('login_menu'))->with('Warning','No user loging.');
        }
        Session::flush();
        return redirect()->intended(route('login_menu'))->with('Success','Logout successful.');
    }
   
    public function userActivation($token){
        $check = DB::table('users_activations')->where('token',$token)->first();
        if(!is_null($check)){
            $user = Student::find($check->Stud_Id);
            if ($user->is_activated == 1) {
               return redirect()->to('student/login')->with('Success','User are already actived.');
            }
            $user->update(['is_activated' => 1]);
            DB::table('users_activations')->where('token',$token)->delete();
            return redirect()->to('student/login')->with('Success','User actived successfully.');
        }
        $checked = DB::table('company_activations')->where('token',$token)->first();
        if(!is_null($checked)){
            $user = Company::find($checked->Cmp_Id);
            if ($user->is_activated >= 1) {
               return redirect()->to('company/login')->with('Success','User are already actived.');
            }
            $user->update(['is_activated' => 2]);
            DB::table('company_activations')->where('token',$token)->delete();
            return redirect()->to('company/login')->with('Success','User actived successfully.');
        }   return redirect()->to('login_menu')->with('Warning','Token is not valid.');
    }
    
    public function create(){
        $request['Spv_Id']= 'SPV0004';
        $request['Spv_Name']='Chok Len Mooi';
        $request['Password']='asd123';
        $request['ContactNo']='0161234567';
        $request['Email']='tanlp@tarc.edu.my';
        Supervisor::create([
                'Spv_Id' => $request['Spv_Id'],
                'Spv_Name' => $request['Spv_Name'],
                'ContactNo' => $request['ContactNo'],
                'Email' => $request['Email'],
                'Password' => Hash::make($request['Password']),
            ]);
        
        return redirect()->intended(route('login_menu'))->with('Success','Create success');
    }
    
}
