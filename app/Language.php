<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $primaryKey = 'Language_Id';
    protected $fillable = ['Language_Id','Language','Spoken','Written','Stud_Id'];
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
}
