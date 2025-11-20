<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //
    const TABLE = "towns";
    protected $table = self::TABLE;
    protected $fillable = [
        'name',
    ];
}
