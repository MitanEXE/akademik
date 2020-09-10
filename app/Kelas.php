<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class Kelas extends Model
{
    //
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';


    protected $fillable = [
        'id_kelas', 'nama_kelas', 'kode_kelas'
    ];

    public $timestamps = false;

    public function listkelas()
    {
    	return Kelas::all();
    }
}
