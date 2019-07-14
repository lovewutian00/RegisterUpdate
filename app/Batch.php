<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table ='batches';
    protected $primaryKey = 'Batch_Id';
    public $timestamps = false;
    
    public function programs(){
        return $this->belongsTo('App\Program','Program_Code','Program_Code');
    }
    public function schedules(){
        return $this->hasMany('App\Schedule','Batch_Id','Batch_Id');
    }
    
    public function students(){
        return $this->hasMany('App\Student','Batch_Id','Batch_Id');
    }
}
