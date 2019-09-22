<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kagawad extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'firstname',
        'middlename',
        'surname',
        'position',
        'about',
        'address',
        'contact',
        'image',
    ];
}
