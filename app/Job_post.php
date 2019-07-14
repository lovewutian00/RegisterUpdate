<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Company;
use App\Job_sub_category;
use App\Location;

class Job_post extends Authenticatable
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'job_posts';
    protected $primaryKey = 'Job_Id';
    public $timestamps = false;
    protected $fillable = [
        'Job_Id',
        'Title', 
        'Descript',
        'PostDT',
        'Qualification',
        'MinAllowance',
        'MaxAllowance',
        'DressCode',
        'ProcessTime',
        'WorkingDays',
        'WorkingHours',
        'Accomodation',
        'Benefits',
        'Cmp_Id',
    ];
    
    public function company(){
        return $this->belongsTo(Company::class, 'Cmp_Id');
    }
    
    public function job_sub_category()
    {
        return $this->belongsTo(Job_sub_category::class, 'Sub_Id');
    }
    
    public function location()
    {
        return $this->belongsTo(Location::class, 'Loc_Id');
    }
}
