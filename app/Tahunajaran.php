<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class Tahunajaran extends Model
{
    //
    protected $table = 'tahunajaran';
    protected $primaryKey = 'id_tahun';


    protected $fillable = [
        'id_tahun', 'tahun_ajaran',
    ];

    public $timestamps = false;

    public function listtahunajaran()
    {
    	return tahunajaran::all();
    }
}
