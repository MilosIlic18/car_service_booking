<?php

namespace App\Models;

use App\Models\Town;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    const TABLE = 'locations';
    protected $table = self::TABLE;
    protected $fillable = [
        Service::TABLE.'_id',
        Town::TABLE.'_id',
        'street',
        'house_number'
    ];
}
