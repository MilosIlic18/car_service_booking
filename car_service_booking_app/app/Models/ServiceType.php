<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    //
    const TABLE = 'service_types';
    protected $fillable = [
        'name',
    ];
}
