<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingName extends Model
{
    use HasFactory;
    protected $table = 'building_names';
    protected $guarded = ['id'];
}
