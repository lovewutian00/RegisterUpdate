<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'programs';
    protected $primaryKey = 'Program_Code';
    protected $fillable = [
        'Program_Code', 
        'ProgramName',
        'Faculty_Code'
    ];
    
    public function faculty(){
        return $this->belongsTo(Faculty::class, 'Faculty_Code');
    }
    
    public function students()
    {
        return $this->hasMany(Student::class, 'Program_Code');
    }
    public function batches(){
        return $this->hasMany('App\Batch','Program_Code','Program_Code');
    }
}
