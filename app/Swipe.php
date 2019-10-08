<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    protected $fillable = ['user_id', 'distance'];
}
