<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_result extends Model
{
    protected $primaryKey = 'Stud_Id';
    protected $table = 'survey_result';
    protected $casts = ['Stud_Id' => 'string'];
    public $timestamps = false;
    protected $fillable = ['Stud_Id','Gender','Cmp_Name','Prog_Code','Intern_Paid','Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12','Q13','Q14','Q15','Q16','Q17','Q18','Q19','Q20','Survey_Id'];
    
    public function student(){
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
    
    public function Surveys(){
        return $this->belongsTo('App\surveys','Survey_Id','Survey_Id');
    }
}
