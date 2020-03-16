<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
   protected $fillable = [
        'title',
        'url',
        'description'
    ];
}
