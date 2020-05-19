<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = ['from', 'to'];

    public function bookble()
    {
        return $this->belongsTo(Bookable::class);
    }
}
