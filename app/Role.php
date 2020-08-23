<?php namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Ultraware\Roles\Traits\HasRoleAndPermission;

class Role extends EntrustRole
{
	protected $fillable = ['name', 'display_name', 'description'];
}