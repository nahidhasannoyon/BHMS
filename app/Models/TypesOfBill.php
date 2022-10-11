<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesOfBill extends Model
{
    use HasFactory;
    protected $table = "types_of_bills";
    protected $guarded = ['id'];
}
