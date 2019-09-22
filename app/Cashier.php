<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $fillable = [
        'receipt_no',
        'tin',
        'resident',
        'contact',
        'address',
        'discount',
        'sub_total',
        'total_amount',
        'pay_amount',
        'change',
        'status',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
