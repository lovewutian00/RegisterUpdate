<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional_Info extends Model
{
    protected $table = 'additional_infos';
    protected $primaryKey = 'Add_Info_Id';
    protected $fillable = ['Expected_Salary','Preferred_Location_one','Preferred_Location_two','Preferred_Location_three','Oversea','Other_Info','Stud_Id'];
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
}
