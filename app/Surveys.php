<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    protected $primaryKey = 'Survey_Id';    
    protected $table = 'surveys';
    public $timestamps = false;
    
    public function Questions(){
        return $this->hasMany('App\questions','Survey_Id','Survey_Id');
    }
    
    public function Survey_result(){
        return $this->hasMany('App\survey_result','Survey_Id','Survey_Id');
    }
}
