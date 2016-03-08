<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
	protected $table = 'users';

	protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = ['remember_token'];

	use Authenticatable, CanResetPassword, HasRoleAndPermission;
}