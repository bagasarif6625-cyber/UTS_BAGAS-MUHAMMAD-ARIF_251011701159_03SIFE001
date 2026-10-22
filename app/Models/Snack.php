<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    protected $fillable = [
        'brand',
        'name',
        'flavor',
        'price',
        'weight',
        'image',
        'description',
    ];
}
