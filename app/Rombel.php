<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class Rombel extends Model
{
    //

    protected $table = 'rombel';
    protected $primaryKey = 'user_id';


    protected $fillable = [
        'id_kelas', 'id_user','id_jurusan',
    ];

    public $timestamps = false;
}
