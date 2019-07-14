<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Education;
use App\Experience;
use App\Skill;
use App\Language;
use App\Additional_Info;
use App\Preference;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class StudentPostController extends Controller {
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    
    public function findAction(Request $request,$id=""){
        
        //post action
        if($request->isMethod('post')){
            if($request->attrb == 'education' && $request->is('student/resume/education'))
                return $this->storeEducation($request);
            else if($request->attrb == 'experience' && $request->is('student/resume/experience'))
                return $this->storeExperience($request);
            else if($request->attrb == 'skill' && $request->is('student/resume/skill'))
                return $this->storeSkill($request);
            else if($request->attrb == 'language' && $request->is('student/resume/language'))
                return $this->storeLanguage($request);
            else if($request->attrb == 'additional_info' && $request->is('student/resume/additional_info'))
                return $this->storeAddInfo($request);
            else if($request->attrb == 'preference' && $request->is('student/preference'))
                return $this->storePreference($request);
        }
        
        //patch action
        if($request->isMethod('patch')){
            if($request->attrb == 'education'&& $request->is('student/resume/education/*'))
                return $this->updateEducation($request,$id);
            else if($request->attrb == 'experience'&& $request->is('student/resume/experience/*'))
                return $this->updateExperience($request,$id);
            else if($request->attrb == 'skill' && $request->is('student/resume/skill'))
                return $this->updateSkill($request);
            else if($request->attrb == 'language' && $request->is('student/resume/language'))
                return $this->updateLanguage($request);
            else if($request->attrb == 'additional_info' && $request->is('student/resume/additional_info'))
                return $this->updateAddInfo($request);
            else if($request->attrb == 'preference' && $request->is('student/preference'))
                return $this->updatePreference($request);
        }
        
        //delete action
        if($request->isMethod('delete')){
            if($request->attrb == 'education'&& $request->is('student/resume/education/*'))
                return $this->deleteEducation($id);
            else if($request->attrb == 'experience'&& $request->is('student/resume/experience/*'))
                return $this->deleteExperience($id);
            else if($request->attrb == 'skill' && $request->is('student/resume/skill/*'))
                return $this->deleteSkill($id);
            else if($request->attrb == 'language' && $request->is('student/resume/language/*'))
                return $this->deleteLanguage($id);
        }
        
        return redirect()->route($request->attrb);
    }

    public function storeEducation(Request $request) {

        //TODO CGPA IF ELSE, VALIDATION
        //TODO all field ddl validation exists
        
        $id = $this->get_stud_id();
        $edu_count = Student::find($id)->educations->count();
        
            if($edu_count < 2){
                $validated = request()->validate([
                    'University' => ['required','min:3','max:60'],
                    'month' => ['required','regex:/[0-1]+/','between:1,12'],
                    'year' =>['required','integer'],
                    'Qualification' => ['required','max:30'], //todo
                    'Uni_Location' =>['required','max:50','min:2'], //todo
                    'Field_Of_Study' => ['required','max:200'], //todo
                    'Major' => ['min:2','max:100','nullable','required'],
                    'Grade' =>['required','max:50'], //todo
                    'CGPA' => ['required_if:Grade,CGPA','nullable','numeric','between:0.0000,4.0000'],
                    'Additional_Info' =>['max:2500','nullable'],
                    'Stud_Id' =>[function($attribute,$value,$fail){
                        if(!Student::where('Stud_Id', $value)->exists()){
                            $fail('Student Id does not exists');
                        }
                    }],      
                ]);

                $request->merge([
                    'Stud_Id' => $id,
                    'Grad_Date' => Carbon::create($request->year, $request->month, 01),
                ]);
                Education::create(request(['University','Grad_Date','Qualification',
                    'Uni_Location','Field_Of_Study','Major','Grade','CGPA','Additional_Info',
                    'Stud_Id'
                    ]));    
        }
        return redirect()->route('education');
    }

    public function updateEducation(Request $request,$edu_id) {
        
        $id = $this->get_stud_id();
        
        $validated = request()->validate([
            'University' => ['required','min:3','max:60'],
            'month' => ['required','regex:/[0-1]+/','between:1,12'],
            'year' =>['required','integer'],
            'Qualification' => ['required','max:30'], //todo
            'Uni_Location' =>['required','max:50','min:2'], //todo
            'Field_Of_Study' => ['required','max:200'], //todo
            'Major' => ['min:2','max:100','nullable','required'],
            'Grade' =>['required','max:50'], //todo
            'CGPA' => ['required_if:Grade,CGPA','nullable','numeric','between:0.0000,4.0000'],
            'Additional_Info' =>['max:2500','nullable'],
            'Edu_Id' =>[function($attribute,$value,$fail){
                        if(!Education::where('Edu_Id', $value)->exists())
                            $fail('Education Id does not exists');
                        else if(empty(Education::where('Edu_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Education Id not found');
                }],      
        ]);
                       
        $request->merge([
            'Stud_Id' => $id,
            'Grad_Date' => Carbon::create($request->year, $request->month, 01),
        ]);
         
        Education::where('Edu_Id',$edu_id)->update(request(['University','Grad_Date','Qualification',
            'Uni_Location','Field_Of_Study','Major','Grade','CGPA','Additional_Info',
            'Stud_Id'
            ]));  

        return redirect()->route('education');
    }
    
    public function deleteEducation($edu_id){

        $edu = Education::findOrFail($edu_id)->where('Stud_Id',$this->get_stud_id())->where('Edu_Id',$edu_id)->delete();
        return redirect(route('education'));
    }
    
    public function storeExperience(Request $request){
        $id = $this->get_stud_id();
        $exp_count = Student::find($id)->experiences->count();

                if($exp_count < 2){
                    $validated = request()->validate([
                        'Position_Title' => ['required','min:3','max:30'],
                        'Company_Name' => ['required','max:30'],
                        'frm_month' => ['required','regex:/[0-1]+/','between:1,12'],
                        'frm_year' =>['required','integer'],
                        'to_month' => ['required','regex:/[0-1]+/','between:1,12'],
                        'to_year' =>['required','integer'],  //to_year or to_month cannot b4 from, year must within the set
                        'Country' => ['required','max:20'], 
                        'Industry' =>['required','max:100'], 
                        'Position_Lvl' => ['required','max:191'], 
                        'Salary_Range' => ['required','max:35'],
                        'Description' => ['max:2500','nullable'],
                        'Stud_Id' =>[function($attribute,$value,$fail){
                            if(!Student::where('Stud_Id', $value)->exists()){
                                $fail('Student Id does not exists');
                            }
                        }],      
                    ]);

                    $request->merge([
                        'Stud_Id' => $id,
                        'Joined_Frm' => Carbon::create($request->frm_year, $request->frm_month, 01),
                        'Joined_To' => Carbon::create($request->to_year, $request->to_month, 01),
                    ]);

                    Experience::create(request(['Position_Title','Company_Name','Joined_Frm',
                        'Joined_To','Country','Industry','Position_Lvl','Salary_Range','Description','Stud_Id'
                        ]));  
                    }
        return redirect()->route('experience');
    }
    
    public function updateExperience(Request $request,$exp_id)
    {
        $id = $this->get_stud_id();
        
        $request->merge([
            'Exp_Id' => $exp_id
        ]);
        
            $validated = request()->validate([
                'Position_Title' => ['required','min:3','max:30'],
                'Company_Name' => ['required','max:30'],
                'frm_month' => ['required','regex:/[0-1]+/','between:1,12'],
                'frm_year' =>['required','integer'],
                'to_month' => ['required','regex:/[0-1]+/','between:1,12'],
                'to_year' =>['required','integer'],  //to_year or to_month cannot b4 from, year must within the set
                'Country' => ['required','max:20'], 
                'Industry' =>['required','max:100'], 
                'Position_Lvl' => ['required','max:191'], 
                'Salary_Range' => ['required','max:35'],
                'Description' => ['max:2500','nullable'],
                'Exp_Id' =>[function($attribute,$value,$fail){
                        if(!Experience::where('Exp_Id', $value)->exists())
                            $fail('Experience Id does not exists');
                        else if(empty(Experience::where('Exp_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Experience Id not found');
                }],       
            ]);
                
            $request->merge([
                'Stud_Id' => $id,
                'Joined_Frm' => Carbon::create($request->frm_year, $request->frm_month, 01),
                'Joined_To' => Carbon::create($request->to_year, $request->to_month, 01),
            ]);
            Experience::where('Exp_Id',$exp_id)->update(request(['Position_Title','Company_Name','Joined_Frm',
                'Joined_To','Country','Industry','Position_Lvl','Salary_Range','Description','Stud_Id'
                ]));  

        return redirect()->route('experience');
    }
    public function deleteExperience($exp_id){
        $exp = Experience::findOrFail($exp_id)->where('Stud_Id',$this->get_stud_id())->where('Exp_Id',$exp_id)->delete();
        return redirect(route('experience'));
     }
     
    public function storeSkill(Request $request){
        
        $stud = Student::find($this->get_stud_id());
        $id = $this->get_stud_id();
        
        $skill_count = Student::find($id)->skills->count();
        
            if($skill_count < 8){
                $validated = request()->validate([
                    'Skill' => 'array|max:8',
                    'Skill.0' => 'required_with:Proficiency.0|max:50',
                    'Skill.1' => 'required_with:Proficiency.1|max:50',
                    'Skill.2' => 'required_with:Proficiency.2|max:50',
                    'Skill.3' => 'required_with:Proficiency.3|max:50',
                    'Skill.4' => 'required_with:Proficiency.4|max:50',
                    'Skill.5' => 'required_with:Proficiency.5|max:50',
                    'Skill.6' => 'required_with:Proficiency.6|max:50',
                    'Skill.7' => 'required_with:Proficiency.7|max:50',
                    'Proficiency' => 'array|max:8',
                    'Proficiency.0' => 'required_with:Skill.0|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.1' => 'required_with:Skill.1|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.2' => 'required_with:Skill.2|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.3' => 'required_with:Skill.3|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.4' => 'required_with:Skill.4|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.5' => 'required_with:Skill.5|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.6' => 'required_with:Skill.6|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.7' => 'required_with:Skill.7|max:20|in:Beginner,Intermediate,Advanced',   
                ]);

                $data = [];
                    if($request->has('Skill') && $request->has('Proficiency')){
                        for($i=0;$i<count($request->Skill);$i++){
                            if($request->Skill[$i]!=null && $request->Proficiency[$i] !=null){
                                $data[]= new Skill ([
                                    'Skill' => $request->Skill[$i],
                                    'Proficiency'=> $request->Proficiency[$i]
                                ]);
                            }
                        }

                    $stud->skills()->saveMany($data);
                }
        }
        return redirect(route('skill'));
    }
    
    public function updateSkill(Request $request){
        $id = $this->get_stud_id();
        $skill_count = Student::find($id)->skills->count();
        
            if($skill_count < 9){
                $validated = request()->validate([
                    'Skill' => 'array|max:8',
                    'Skill.0' => 'required_with:Proficiency.0|max:50',
                    'Skill.1' => 'required_with:Proficiency.1|max:50',
                    'Skill.2' => 'required_with:Proficiency.2|max:50',
                    'Skill.3' => 'required_with:Proficiency.3|max:50',
                    'Skill.4' => 'required_with:Proficiency.4|max:50',
                    'Skill.5' => 'required_with:Proficiency.5|max:50',
                    'Skill.6' => 'required_with:Proficiency.6|max:50',
                    'Skill.7' => 'required_with:Proficiency.7|max:50',
                    'Proficiency' => 'array|max:8',
                    'Proficiency.0' => 'required_with:Skill.0|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.1' => 'required_with:Skill.1|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.2' => 'required_with:Skill.2|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.3' => 'required_with:Skill.3|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.4' => 'required_with:Skill.4|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.5' => 'required_with:Skill.5|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.6' => 'required_with:Skill.6|max:20|in:Beginner,Intermediate,Advanced',
                    'Proficiency.7' => 'required_with:Skill.7|max:20|in:Beginner,Intermediate,Advanced', 
                    'Skill_Id' => 'array|max:8',
                    'Skill_Id.0' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                    'Skill_Id.1' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                    'Skill_Id.2' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                    'Skill_Id.3' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                    'Skill_Id.4' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                    'Skill_Id.5' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                    'Skill_Id.6' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                    'Skill_Id.7' =>[function($attribute,$value,$fail){
                        if(!Skill::where('Skill_Id', $value)->exists())
                            $fail('Skill Id does not exists');
                        else if(empty(Skill::where('Skill_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Skill not found');
                    }], 
                ]);
                if($request->has('Skill_Id') && $request->has('Skill') && $request->has('Proficiency')){
                    for($i=0;$i<count($request->Skill_Id);$i++){
                        Skill::where('Skill_Id',$request->Skill_Id[$i])->update(array('Skill' => $request->Skill[$i],'Proficiency' => $request->Proficiency[$i]));
                    }
                }
            }
        
        return redirect(route('skill'));
    }
            
    public function deleteSkill($skill_id){
        
        $skill = Skill::findOrFail($skill_id)->where('Stud_Id',$this->get_stud_id())->where('Skill_Id',$skill_id)->delete();
        return redirect(route('deleteSkillPage'));
    }
    
    public function storeLanguage(Request $request){
        
        $stud = Student::find($this->get_stud_id());
        $id = $this->get_stud_id();      
        $lg_count = Student::find($id)->languages->count();
        
            if($lg_count < 5){
                $validated = request()->validate([
                    'Languages' => 'array|max:5',
                    'Languages.0' => 'required_with:Written.0|required_with:Spoken.0|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.1' => 'required_with:Written.1|required_with:Spoken.1|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.2' => 'required_with:Written.2|required_with:Spoken.2|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.3' => 'required_with:Written.3|required_with:Spoken.3|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.4' => 'required_with:Written.4|required_with:Spoken.4|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Written' => 'array|max:5',
                    'Written.0' => 'required_with:Languages.0|required_with:Spoken.0|integer|between:1,5',
                    'Written.1' => 'required_with:Languages.1|required_with:Spoken.1|between:1,5',
                    'Written.2' => 'required_with:Languages.2|required_with:Spoken.2|between:1,5',
                    'Written.3' => 'required_with:Languages.3|required_with:Spoken.3|between:1,5',
                    'Written.4' => 'required_with:Languages.4|required_with:Spoken.4|between:1,5',
                    'Languages' => 'array|max:5',
                    'Spoken.0' => 'required_with:Written.0|required_with:Languages.0|integer|between:1,5',
                    'Spoken.1' => 'required_with:Written.1|required_with:Languages.1|integer|between:1,5',
                    'Spoken.2' => 'required_with:Written.2|required_with:Languages.2|integer|between:1,5',
                    'Spoken.3' => 'required_with:Written.3|required_with:Languages.3|integer|between:1,5',
                    'Spoken.4' => 'required_with:Written.4|required_with:Languages.4|integer|between:1,5',
                ]);

                $data = [];
                
                if($request->has('Languages' )&& $request->has('Spoken') && $request->has('Written')){
                    for($i=0;$i<count($request->Languages);$i++){
                        if($request->Languages[$i]!=null && $request->Spoken[$i] !=null && $request->Written[$i] != null){
                            $data[]= new Language ([
                                'Language' => $request->Languages[$i],
                                'Spoken'=> $request->Spoken[$i],
                                'Written' => $request->Written[$i]
                            ]);
                        }
                    }
                    $stud->languages()->saveMany($data);
                }
            }
        return redirect(route('language'));
        
    }
    
    public function updateLanguage(Request $request){
        $id = $this->get_stud_id();
        $lg_count = Student::find($id)->languages->count();
        
            if($lg_count < 6){
                $validated = request()->validate([
                    'Languages' => 'array|max:5',
                    'Languages.0' => 'required_with:Written.0|required_with:Spoken.0|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.1' => 'required_with:Written.1|required_with:Spoken.1|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.2' => 'required_with:Written.2|required_with:Spoken.2|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.3' => 'required_with:Written.3|required_with:Spoken.3|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Languages.4' => 'required_with:Written.4|required_with:Spoken.4|max:20|in:Arabic,Bahasa Indonesia,Bahasa Malaysia,English,Filipino,French,German,Hindi,Japanese,Korean,Mandarin,Spanish,Tamil,Thai,Vietnamese',
                    'Written' => 'array|max:5',
                    'Written.0' => 'required_with:Languages.0|required_with:Spoken.0|integer|between:1,5',
                    'Written.1' => 'required_with:Languages.1|required_with:Spoken.1|integer|between:1,5',
                    'Written.2' => 'required_with:Languages.2|required_with:Spoken.2|integer|between:1,5',
                    'Written.3' => 'required_with:Languages.3|required_with:Spoken.3|integer|between:1,5',
                    'Written.4' => 'required_with:Languages.4|required_with:Spoken.4|integer|between:1,5',
                    'Languages' => 'array|max:5',
                    'Spoken.0' => 'required_with:Written.0|required_with:Languages.0|integer|between:1,5',
                    'Spoken.1' => 'required_with:Written.1|required_with:Languages.1|integer|between:1,5',
                    'Spoken.2' => 'required_with:Written.2|required_with:Languages.2|integer|between:1,5',
                    'Spoken.3' => 'required_with:Written.3|required_with:Languages.3|integer|between:1,5',
                    'Spoken.4' => 'required_with:Written.4|required_with:Languages.4|integer|between:1,5',
                    'Skill_Id' => 'array|max:5',
                    'Language_Id.0' =>[function($attribute,$value,$fail){
                        if(!Language::where('Language_Id', $value)->exists())
                            $fail('Language Id does not exists');
                        else if(empty(Language::where('Language_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Language not found');
                    }], 
                    'Language_Id.1' =>[function($attribute,$value,$fail){
                        if(!Language::where('Language_Id', $value)->exists())
                            $fail('Language Id does not exists');
                        else if(empty(Language::where('Language_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Language not found');
                    }], 
                    'Language_Id.2' =>[function($attribute,$value,$fail){
                        if(!Language::where('Language_Id', $value)->exists())
                            $fail('Language Id does not exists');
                        else if(empty(Language::where('Language_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Language not found');
                    }], 
                    'Language_Id.3' =>[function($attribute,$value,$fail){
                        if(!Language::where('Language_Id', $value)->exists())
                            $fail('Language Id does not exists');
                        else if(empty(Language::where('Language_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Language not found');
                    }], 
                    'Language_Id.4' =>[function($attribute,$value,$fail){
                        if(!Language::where('Language_Id', $value)->exists())
                            $fail('Language Id does not exists');
                        else if(empty(Language::where('Language_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Language not found');
                    }], 
                ]);
                if($request->has('Language_Id') && $request->has('Languages')&& $request->has('Spoken') && $request->has('Written')){
                    for($i=0;$i<count($request->Language_Id);$i++){
                        Language::where('Language_Id',$request->Language_Id[$i])->update(array('Language' => $request->Languages[$i],'Spoken' => $request->Spoken[$i],'Written' => $request->Written[$i]));
                    }
                }
            }
        
        return redirect(route('language'));
    }
    
    public function deleteLanguage($lg_id){
        $language = Language::findOrFail($lg_id)->where('Stud_Id',$this->get_stud_id())->where('Language_Id',$lg_id)->delete();
        return redirect(route('deleteLanguagePage'));
    }
    
    public function storeAddInfo(Request $request){
        $id = $this->get_stud_id();
        $add_info_count = Student::find($id)->additional_info;
        
        
            if(!count($add_info_count)){
                $request->merge([
                    'Stud_Id' => $id,
                ]);
                
                $validated = request()->validate([
                    'Expected_Salary' => ['required','numeric','min:1'],
                    'Preferred_Location_one' => ['required','max:30','in:Anywhere in Malaysia,Johor,Kedah,Kuala Lumpur,
                                         Kelantan,Melaka,Negeri Sembilan,Penang,Pahang,Perak,Perlis,Putrajaya,Sabah
                                         Selangor,Sarawak,Terengganu'],
                    'Preferred_Location_two' => ['max:30','in:Anywhere in Malaysia,Johor,Kedah,Kuala Lumpur,
                                         Kelantan,Melaka,Negeri Sembilan,Penang,Pahang,Perak,Perlis,Putrajaya,Sabah
                                         Selangor,Sarawak,Terengganu','nullable'],
                    'Preferred_Location_three' =>['max:30','in:Anywhere in Malaysia,Johor,Kedah,Kuala Lumpur,
                                         Kelantan,Melaka,Negeri Sembilan,Penang,Pahang,Perak,Perlis,Putrajaya,Sabah
                                         Selangor,Sarawak,Terengganu','nullable'],
                    'Oversea' => ['nullable'],
                    'Other_Info' => ['max:2500','nullable'], 
  
                ]);
                    
                if($request->Oversea == 'on'){
                   $request->merge([
                        'Oversea' => true,
                    ]);
                }

                Additional_Info::create(request(['Expected_Salary','Preferred_Location_one','Preferred_Location_two',
                    'Preferred_Location_three','Oversea','Other_Info','Stud_Id'
                ]));  
            }

        return redirect(route('additional_info'));
    }
    
    public function updateAddInfo(Request $request){
        $id = $this->get_stud_id();
        
            $validated = request()->validate([
                'Expected_Salary' => ['required','numeric','min:1'],
                'Preferred_Location_one' => ['required','max:30','in:Anywhere in Malaysia,Johor,Kedah,Kuala Lumpur,
                                     Kelantan,Melaka,Negeri Sembilan,Penang,Pahang,Perak,Perlis,Putrajaya,Sabah
                                     Selangor,Sarawak,Terengganu'],
                'Preferred_Location_two' => ['max:30','in:Anywhere in Malaysia,Johor,Kedah,Kuala Lumpur,
                                     Kelantan,Melaka,Negeri Sembilan,Penang,Pahang,Perak,Perlis,Putrajaya,Sabah
                                     Selangor,Sarawak,Terengganu','nullable'],
                'Preferred_Location_three' =>['max:30','in:Anywhere in Malaysia,Johor,Kedah,Kuala Lumpur,
                                     Kelantan,Melaka,Negeri Sembilan,Penang,Pahang,Perak,Perlis,Putrajaya,Sabah
                                     Selangor,Sarawak,Terengganu','nullable'],
                'Oversea' => ['nullable'],
                'Other_Info' => ['max:2500','nullable'], 
                'Add_Info_Id' =>[function($attribute,$value,$fail){
                        if(!Additional_Info::where('Add_Info_Id', $value)->exists())
                            $fail('Add Info Id does not exists');
                        else if(empty(Additional_Info::where('Add_Info_Id',$value)->where('Stud_Id',$this->get_stud_id())->first()))
                            $fail('Add Info Id not found');
                 }],      
            ]);

            if($request->Oversea == 'on'){
               $request->merge([
                    'Oversea' => true,
                ]);
            }
            else {
                $request->merge([
                    'Oversea' => false,
                ]);
            }
                   
            Additional_Info::where('Stud_Id',$id)->update(request(['Expected_Salary','Preferred_Location_one','Preferred_Location_two',
                'Preferred_Location_three','Oversea','Industry','Other_Info'
                ]));  

        return redirect()->route('additional_info');
    }
    
    public function storePreference(Request $request){
        $id = $this->get_stud_id();
        $preference_count = Student::find($id)->preference;

            if(!$preference_count){
                $request->merge([
                    'Stud_Id' => $id,
                ]);
                
                $validated = request()->validate([
                    'Keyword_1' => ['required','max:100'],
                    'Keyword_2' => ['nullable','max:100'],
                    'Keyword_3' => ['nullable','max:100'],
                    'Keyword_4' => ['nullable','max:100'],
                    'Keyword_5' => ['nullable','max:100'],
                    'Location_1' => ['required','max:100'],
                    'Location_2' => ['nullable','max:100'],
                    'Location_3' => ['nullable','max:100'],
                    'Job_Type_1' => ['required','max:100','in:Internship,Diploma,Bachelor Degree'],
                    'Job_Type_2' => ['nullable','max:100','in:Internship,Diploma,Bachelor Degree'],
                    'Job_Type_3' => ['nullable','max:100','in:Internship,Diploma,Bachelor Degree'],
  
                ]);
                    
                Preference::create(request(['Keyword_1','Keyword_2','Keyword_3','Keyword_4',
                    'Keyword_5','Location_1','Location_2','Location_3','Job_Type_1','Job_Type_2','Job_Type_3','Stud_Id'
                ]));  
            }

        return redirect(route('preference'));
    }
    
    public function updatePreference(Request $request){
        $id = $this->get_stud_id();

            $validated = request()->validate([
                    'Keyword_1' => ['required','max:100'],
                    'Keyword_2' => ['nullable','max:100'],
                    'Keyword_3' => ['nullable','max:100'],
                    'Keyword_4' => ['nullable','max:100'],
                    'Keyword_5' => ['nullable','max:100'],
                    'Location_1' => ['required','max:100'],
                    'Location_2' => ['nullable','max:100'],
                    'Location_3' => ['nullable','max:100'],
                    'Job_Type_1' => ['required','max:100','in:Internship,Diploma,Bachelor Degree'],
                    'Job_Type_2' => ['nullable','max:100','in:Internship,Diploma,Bachelor Degree'],
                    'Job_Type_3' => ['nullable','max:100','in:Internship,Diploma,Bachelor Degree'],
  
                ]);
                   
            Preference::where('Stud_Id',$id)->update(request(['Keyword_1','Keyword_2','Keyword_3','Keyword_4',
                    'Keyword_5','Location_1','Location_2','Location_3','Job_Type_1','Job_Type_2','Job_Type_3'
                ]));  

        return redirect()->route('preference');
    }
            
    public function get_stud_id(){
        return Auth::user()->getId();
    }

}
