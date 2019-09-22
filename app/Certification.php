<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
   protected $fillable = [
        'resident_id',
        'purpose',
        'image',
   ];

   public function resident() 
   {
       return $this->belongsTo(Resident::class);
   }
}
