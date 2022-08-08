<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedApartments extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany(User::class, 'booked_apartments');
    }


    public function accommodation()
    {
        return $this->belongsToMany(Accommodation::class, 'booked_apartments');
    }

}
