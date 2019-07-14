<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Student_Supervisor;
use App\Batch;
use App\Company_Student;
use App\Evaluation;

class Student extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'students';
    protected $casts = ['Stud_Id' => 'string'];

    public function getAuthIdentifier()
    {
        Return $this->getKey ();
    }
    public function getAuthPassword()
    {
        return $this->Password;
    }

    public function getId()
    {
        return $this->Stud_Id;
    }
        
    protected $primaryKey = 'Stud_Id';
    protected $fillable = [
        'Stud_Id', 
        'IcNo',
        'FirstName',
        'LastName',
        'DOB',
        'Race',
        'Email',
        'ContactNo',
        'Address_1',
        'Address_2',
        'City',
        'Postcode',
        'State',
        'Country',
        'Password',
        'Group',
        'CGPA',
        'FYPTitle',
        'FYPDesc',
        'Spv_Eva',
        'Cmp_Eva',
        'Gender',
        'Avatar',
        'Batch_Id',
        'Program_Code',
        'is_activated',
    ];

    protected $hidden = [
        'Password','remember_token',
    ];
    
    
     public function student_supervisor(){
        return $this->hasOne(Student_Supervisor::class, 'Stud_Id');   
    }
    
    public function educations()
    {
        return $this->hasMany('App\Education','Stud_Id','Stud_Id');
    }
    
    public function experiences()
    {
        return $this->hasMany('App\Experience','Stud_Id','Stud_Id');
    }
    
    public function skills()
    {
        return $this->hasMany('App\Skill','Stud_Id','Stud_Id');
    }
    
    public function languages()
    {
        return $this->hasMany('App\Language','Stud_Id','Stud_Id');
    }
    public function additional_info()
    {
        return $this->hasMany('App\Additional_Info','Stud_Id','Stud_Id');
    }
    public function program(){
        return $this->belongsTo('App\Program','Program_Code','Program_Code');
    }
    
    public function reports()
    {
        return $this->hasMany('App\Report','Stud_Id','Stud_Id');
    }
    
    public function batch(){
        return $this->belongsTo('App\Batch','Batch_Id','Batch_Id');
    }
    
    public function company_student()
    {
        return $this->hasOne(Company_Student::class, 'Stud_Id');
    }
    
    public function evaluation()
    {
        return $this->hasOne(Evaluation::class, 'Stud_Id');
    }
    
    public function preference(){
        return $this->hasOne('App\Preference', 'Stud_Id', 'Stud_Id');
    }
}
