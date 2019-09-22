<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blotter extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'reference',
        'complainant',
        'respondent',
        'incident_type',
        'date_report',
        'date_incident',
        'place',
        'description'
    ];
}
