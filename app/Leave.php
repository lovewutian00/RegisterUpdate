<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table ='leaves';
    protected $primaryKey = 'Leave_Id';
    protected $dates = ['Leave_Date'];
    protected $fillable = ['Leave_Date','Leave_Day','Leave_Reason','Cmp_Approve','Spv_Approve','Report_Id'];
    public $timestamps = false;

    public function report()
    {
        return $this->belongsTo('App\Leave', 'Report_Id', 'Report_Id');
    }
}
