<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelMeal extends Model
{
    use HasFactory;
    protected $table = 'hostel_meals';
    protected $guarded = ['id'];
}
