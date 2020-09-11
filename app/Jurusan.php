<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class jurusan extends Model
{
    //
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';


    protected $fillable = [
        'id_jurusan', 'nama_jurusan',
    ];

    public $timestamps = false;

    public function listjurusan()
    {
    	return jurusan::all();
    }
}
