<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueueNumber extends Model
{
    protected $fillable = [
        'queue_no',
        'date',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
