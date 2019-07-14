<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table ='reports';
    protected $primaryKey = 'Report_Id';
    protected $fillable = ['Trainee_Name','Activity_1','Activity_2','Activity_3','Activity_4',
        'Additional_Info','Sign','Spv_Status','Cmp_Status','Status','created_at','updated_at','Stud_Id','Sch_Id'];
    protected $dates = ['updated_at', 'created_at'];
    
    public function student()
    {
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
    public function leaves()
    {
        return $this->hasMany('App\Leave', 'Report_Id', 'Report_Id');
    }  
    public function schedule(){
        return $this->belongsTo('App\Schedule','Sch_Id','Sch_Id');
    }
}
