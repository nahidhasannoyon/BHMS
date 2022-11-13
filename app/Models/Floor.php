<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floors';
    protected $guarded = ['id'];

    public function seats()
    {
        return $this->hasMany(Seat::class, 'floor_id', 'id');
    }
}
