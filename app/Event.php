<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'title',
        'description',
        'date',
        'time_from',
        'time_to',
        'location',
        'status',
        'image'
    ];
}
