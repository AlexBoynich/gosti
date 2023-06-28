<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'street',
        'house',
        'flat',
        'entrance',
        'floor',
        'intercom',
    ];
}
