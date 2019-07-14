<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Company_Visit;

class Visit_Feedback extends Authenticatable
{
    use Notifiable;
    public $incrementing = false;
    protected $table = 'visit_feedback';
    protected $primaryKey = 'Feedback_Id';
    protected $fillable = [
        'Feedback_Id', 
        'Feedback',
        'created_at',
        'updated_at',
        'Visit_Id',       
    ];
    
    public function company_visit()
    {
        return $this->belongsTo(Company_Visit::class, 'Visit_Id');
    }

}
