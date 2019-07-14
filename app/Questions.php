<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{  
    protected $primaryKey = 'Survey_Id';    
    protected $table = 'questions';
    public $timestamps = false;
    
    public function Surveys(){
        return $this->belongsTo('App\surveys','Survey_Id','Survey_Id');
    }
}
