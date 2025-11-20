<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    const TABLE = "services";
    protected $table = self::TABLE;
    protected $fillable = [
        User::TABLE.'_id',
        'name',
        'description',
        'verified',
    ];
}
