<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public static function findByReviewkey(string $reviewKey): ?Booking
    {
        return static::where('review_key', $reviewKey)->with('bookable')->get()->first();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->review_key = Str::uuid();
        });
    }

}
