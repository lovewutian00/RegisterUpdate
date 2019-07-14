<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    class Company_student extends Model
{
    //

    protected $table = 'company_student';
    protected $casts = ['Stud_Id' => 'string'];
    protected $fillable = ['Cmp_Id','Stud_Id','PersonInCharged'
        ,'Status','NatureOfWork','Allowance','WorkingDays',
        'WorkingHours','TravellingReq','Accomodation','Others'];
    public $timestamps = false;
    
    public function student(){
        return $this->belongsTo('App\Student','Stud_Id','Stud_Id');
    }
    
    public function Companies(){
        return $this->belongsTo('App\companies','Cmp_Id','Cmp_Id');
    }
}
