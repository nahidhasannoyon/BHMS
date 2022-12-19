<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Student extends User
{
    protected $table = "students";
    protected $guarded = ['id'];
}
