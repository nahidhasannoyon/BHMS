<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedMeal extends Model
{
    protected $table = 'booked_meals';
    protected $guarded = ['id'];
}
