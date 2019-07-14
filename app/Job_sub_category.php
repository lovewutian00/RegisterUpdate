<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job_category;
use App\Job_post;

class Job_sub_category extends Model
{
    protected $table = 'job_sub_categories';
    protected $primaryKey = 'Sub_Id';
    protected $fillable = [
        'Sub_Id', 
        'Sub_Name',
        'Cat_Id',
    ];
    
    public function job_category()
    {
        return $this->belongsTo(Job_category::class, 'Cat_Id');
    }
    
    public function job_posts()
    {
        return $this->hasMany(Job_post::class, 'Sub_Id');
    }
}
