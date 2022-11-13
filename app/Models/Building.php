<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';
    protected $guarded = ['id'];

    public function seats()
    {
        return $this->hasMany(Seat::class, 'building_id', 'id');
    }
}
