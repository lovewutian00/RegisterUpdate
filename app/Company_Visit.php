<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company_Visit extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'company_visit';
    protected $primaryKey = 'Visit_Id';
    protected $fillable = [
        'Visit_Id',
        'Spv_Id', 
        'Cmp_Id', 
        'Title', 
        'Desc',
        'VisitDT',       
    ];
    
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'Spv_Id');
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'Cmp_Id');
    }
    
    public function visit_feedback()
    {
        return $this->hasOne(Visit_Feedback::class, 'Visit_Id');
    }
}
