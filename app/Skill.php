<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $primaryKey = 'Skill_Id';
    protected $fillable = ['Skill_Id','Skill','Proficiency','Stud_Id'];
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
}
