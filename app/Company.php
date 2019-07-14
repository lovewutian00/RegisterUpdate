<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Job_post;
use App\Document;
use App\Location;

class Company extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    
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
            return $this->Cmp_Id;
        }
        
    protected $table = 'companies';
    protected $primaryKey = 'Cmp_Id';
    protected $fillable = [
        'Cmp_Id', 
        'Cmp_Name', 
        'Email',
        'ContactNo',
        'Password',
        'Address',
        'Town',
        'State',
        'Country',
        'PICName',
        'PICPosition',
        'Gender',
        'Avatar',
        'is_activated',
        'Remark'
    ];

    protected $hidden = [
        'Password','remember_token',
    ];
    
    public function job_posts()
    {
        return $this->hasMany(Job_post::class, 'Cmp_Id');
    }
    
    public function documents()
    {
        return $this->hasMany(Document::class, 'Cmp_Id');
    }
    
    public function company_evaluations(){
        return $this->hasMany('App\company_evaluations','Cmp_Id','Cmp_Id');
    }
    
    public function company_students(){
        return $this->hasMany('App\company_student','Cmp_Id','Cmp_Id');
    }
    
}
