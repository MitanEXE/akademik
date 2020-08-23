<?php 
namespace App;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class Permission extends EntrustPermission

{ 
	protected $fillable = ['name', 'display_name', 'description'];
}