<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class biodata extends Model
{
    protected $table = 'biodata';
    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'address',
        'occupation',
        'birthday',
        'sex',
        'fingerprint',
        'email',
    ];
}
