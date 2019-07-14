<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    protected $dates = ['Joined_Frm','Joined_To'];
    protected $primaryKey = 'Exp_Id';
    protected $fillable = ['Position_Title','Company_Name','Joined_Frm','Joined_To','Country','Industry','Position_Lvl','Salary_Range','Description','Stud_Id'];
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
}
