<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Event extends Model
{
    protected $fillable = [
        'title',
        'date',
        'time',
        'location',
        'category',
        'description',
        'image',
    ];
}
