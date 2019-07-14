<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Student_Supervisor;
use App\Evaluation;

class Supervisor extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'supervisors';

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    public function getAuthPassword()
    {
        return $this->Password;
    }
    public function getId()
    {
        return $this->Spv_Id;
    }
        
    protected $primaryKey = 'Spv_Id';
    protected $fillable = [
        'Spv_Id', 
        'Spv_Name',
        'Password',
        'ContactNo',
        'Email',
    ];

    protected $hidden = [
        'Password','remember_token',
    ];
    
    public function student_supervisors(){
        return $this->hasMany(Student_Supervisor::class, 'Spv_Id');
    }
    
    public function evaluation(){
        return $this->hasMany(Evaluation::class, 'Spv_Id');
    }
	
	public function company_visit(){
        return $this->hasMany(Company_Visit::class, 'Spv_Id');
    }
}
