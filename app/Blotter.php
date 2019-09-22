<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Blotter extends Model
{
    // use SoftDeletes;
    protected $table = 'blotter';
    protected $fillable = [
        'suspect',
        'victim',
        'reason',
        'datetime',
        'place',
        'fingerprint',
    ];
}
