<?php

namespace App\Models;

use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Database\Eloquent\Model;

class ServiceServiceType extends Model
{
    //
    const TABLE = 'service_service_types';
    protected $table = self::TABLE;
    protected $fillable = [
        Service::TABLE.'_id',
        ServiceType::TABLE.'_id',
        'price',
        'duration',
        'description'
    ];
}
