<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table ='preferences';
    protected $primaryKey = 'Preference_Id';
    protected $dates = ['Leave_Date'];
    protected $fillable = ['Keyword_1','Keyword_2','Keyword_3','Keyword_4','Keyword_5','Location_1','Location_2','Location_3'
        ,'Job_Type_1','Job_Type_2','Job_Type_3','Stud_Id'
        ];
    public $timestamps = false;

    public function student()
    {
        return $this->hasOne('App\Student', 'Stud_Id', 'Stud_Id');
    }
}
