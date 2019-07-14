<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $dates = ['Sch_Date'];
    protected $primaryKey = 'Sch_Id';
    protected $fillable = ['Sch_Id','Sch_Date','Status'];
    public $timestamps = false;
    
//    public function programs(){
//        return $this->belongsToMany('App\Program','program_schedule','Sch_Id','Program_Code');
//    }
    
    public function reports(){
        return $this->hasMany('App\Report','Sch_Id','Sch_Id');
    }
    
     public function batch(){
        return $this->belongsTo('App\Batch','Batch_Id','Batch_Id');
    }
}
