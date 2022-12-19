<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypesOfBill extends Model
{
    use HasFactory;
    protected $table = "types_of_bills";
    protected $guarded = ['id'];

    protected $casts = ['status' => Status::class];
}
