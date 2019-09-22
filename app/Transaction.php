<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'cashier_id',
        'item',
        'quantity',
        'price',
        'total'
    ];
    
    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }
}
