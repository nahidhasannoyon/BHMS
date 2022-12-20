<?php

namespace App\Models;

use App\Enums\Type;
use Illuminate\Database\Eloquent\Model;

class BookedMeal extends Model
{
    protected $table = "booked_meals";
    protected $guarded = ["id"];

    protected $casts = ["user_type" => Type::class];
}
