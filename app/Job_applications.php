<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Job_applications extends Model
{
    protected $table = 'job_applications';
    public $fillable = ['Job_Id','Stud_Id','Status'];
    public $timestamps = false;
    //
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
                ->where('Stud_Id','=',$this->getAttribute('Stud_Id'))
                ->where ('Job_Id','=',$this->getAttribute('Job_Id'));
        
        return $query;
    }
   
    public function job_post(){
        return $this->belongsTo('App\Job_post','Job_Id','Job_Id');
    }
    
    public function student(){
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
}
