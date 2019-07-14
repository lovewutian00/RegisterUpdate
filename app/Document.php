<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Company;

class Document extends Model
{
    use Notifiable;
    public $timestamps = false;
    
    public function getId()
    {
        return $this->Doc_Id;
    }
        
    protected $table = 'documents';
    protected $primaryKey = 'Doc_Id';
    protected $fillable = [
        'Doc_Id', 
        'File', 
        'Cmp_Id',
        'Remark',
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class,'Cmp_Id');
    }
}
