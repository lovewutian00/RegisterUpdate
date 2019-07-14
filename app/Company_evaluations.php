<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_evaluations extends Model
{
    public $timestamps = false;
    protected $table = 'company_evaluations';
    protected $fillable = ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'WithPermission', 'WithoutPermission', 'Grade', 'Comment', 'ProgOfTraining', 'SupervisorName', 'Date', 'Designation', 'Stud_Id', 'Cmp_Id'];

    public function student(){
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
    
    public function Companies(){
        return $this->belongsTo('App\companies','Cmp_Id','Cmp_Id');
    }    
}
