<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Booking extends Model
{

    protected $fillable = ['from', 'to'];

    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function review()
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
