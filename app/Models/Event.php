<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'time',
        'location',
        'category',
        'description',
        'image_path',
    ];
}
