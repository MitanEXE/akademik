<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;
use Maatwebsite\Excel\Facades\Excel;
use App\Semester;
use App\Exports\SemesterExport;

class Semester extends Model
{
    //
    protected $table = 'semester';
    protected $primaryKey = 'id_semester';


    protected $fillable = [
        'id_semester', 'semester',
    ];

    public $timestamps = false;

    public function listsemester()
    {
    	return semester::all();
    }
}
