<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    //
    const TABLE = 'holidays';
    protected $table = self::TABLE;
    protected $fillable = [
        
        Service::TABLE.'_id',
        'date',
        'description'
    ];
}
