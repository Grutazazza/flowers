<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tovar extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'country',
        'model',
        'color',
        'photo',
    ];
}
