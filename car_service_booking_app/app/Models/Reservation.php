<?php

namespace App\Models;

use App\Models\User;
use App\Models\ServiceServiceType;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    const TABLE = 'reservations';
    protected $fillable = [
        User::TABLE.'_id',
        ServiceServiceType::TABLE.'_id',
        'datetime',
        'notes',
        'status'
    ];

}
