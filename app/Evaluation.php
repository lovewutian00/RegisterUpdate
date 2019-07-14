<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Student;
use App\Supervisor;

class Evaluation extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'evaluation';
    protected $primaryKey = 'Eva_Id';
    protected $fillable = [
        'Eva_Id', 
        'A1', 
        'A2', 
        'A3',
        'B1',
        'B2',
        'B3',
        'Total',
        'Comment',
        'Spv_Id',
        'Stud_Id',
    ];
    
    public function student()
    {
        return $this->hasOne(Student::class, 'Stud_Id');
    }
    
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'Spv_Id');
    }
    
}
