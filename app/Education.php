<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $dates = ['Grad_Date'];
    protected $primaryKey = 'Edu_Id';
    protected $fillable = ['University','Grad_Date','Qualification','Uni_Location','Field_Of_Study','Major','Grade','CGPA','Additional_Info','Stud_Id'];
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
}
