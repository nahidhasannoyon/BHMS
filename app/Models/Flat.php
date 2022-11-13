<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $table = 'flats';
    protected $guarded = ['id'];

    public function seats()
    {
        return $this->hasMany(Seat::class, 'flat_id', 'id');
    }
}
