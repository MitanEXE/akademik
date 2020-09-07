<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class Sesi extends Model
{
    //
    protected $table = 'sesi';
    protected $primaryKey = 'id_sesi';


    protected $fillable = [
        'id_sesi', 'sesi',
    ];

    public $timestamps = false;

    public function listsesi()
    {
    	return sesi::all();
    }
}
