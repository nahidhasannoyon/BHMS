<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherBill extends Model
{
    use HasFactory;
    protected $table = "other_bills";
    protected $guarded = ['id'];
}
