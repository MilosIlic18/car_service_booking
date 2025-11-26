<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    const TABLE = 'services';
    protected $fillable = [
        User::TABLE.'_id',
        'name',
        'description',
        'verified',
    ];
}
