<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    protected $table = "users";
    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at'];
}
