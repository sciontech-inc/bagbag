<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'biodata_fingerprint',
        'reference',
        'surname',
        'firstname',
        'middlename',
        'nickname',
        'resident_date',
        'citizenship',
        'gender',
        'civil_status',
        'birthday',
        'age',
        'birthplace',
        'contact_no',
        'current_address',
        'other_address',
        'educational',
        'occupation',
        'card_presented',
        'email',
    ];

    public function certification() 
    {
        return $this->hasMany(Certification::class);
    }
}
