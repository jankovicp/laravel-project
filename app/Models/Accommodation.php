<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;



    protected $guarded = [];

/*
    protected $fillable = [
        'name',
        'users_id',
    ];

*/
    public static function paginate($int)
    {
    }


    public function user()
    {

        return $this->belongsTo(User::class, "users_id");

    }






}
