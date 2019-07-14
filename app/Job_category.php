<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job_sub_category;

class Job_category extends Model
{
    protected $table = 'job_categories';
    protected $primaryKey = 'Cat_Id';
    protected $fillable = [
        'Cat_Id', 
        'Cat_Name', 
    ];
    
    public function job_sub_categories()
    {
        return $this->hasMany(Job_sub_category::class, 'Cat_Id');
    }
}
