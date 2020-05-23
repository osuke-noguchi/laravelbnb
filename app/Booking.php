<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = ['from', 'to'];

    public function bookble()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function reviews()
    {
        return $this->hasOne(Review::class); //1つの予約には1つのレビューが紐づく
    }

    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        return $query->where('to', '>=', $from)
                ->where('from', '<=', $to);
    }

}