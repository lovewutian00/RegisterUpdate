<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Supervisor;
use App\Student;

class Student_Supervisor extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'student_supervisor';
    
        
    protected $primaryKey =  ['Student_Id', 'Spv_Id'];
    protected $fillable = [
        'Stud_Id', 
        'Spv_Id',
    ];

    protected $hidden = [
        'Password',
    ];
    
    public function supervisor(){
        return $this->belongsTo(Supervisor::class, 'Spv_Id');
    }
    
    public function students(){
        return $this->belongsToMany(Student::class, 'Stud_Id');
    }
}
