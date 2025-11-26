<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //
    const TABLE = 'towns';
    protected $fillable = [
        'name',
    ];
}
