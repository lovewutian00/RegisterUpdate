<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'faculties';
    protected $primaryKey = 'Faculty_Code';
    protected $fillable = [
        'Faculty_Code',
        'FacultyName'
        ];
    
    public function programs()
    {
        return $this->hasMany('App\Program','Faculty_Code','Faculty_Code');
    }

}
