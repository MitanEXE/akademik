<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class blok extends Model
{
    //
    protected $table = 'blok';
    protected $primaryKey = 'id_blok';


    protected $fillable = [
        'id_blok', 'blok',
    ];

    public $timestamps = false;

    public function listblok()
    {
    	return blok::all();
    }
}
