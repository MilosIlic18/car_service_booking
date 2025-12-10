<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    //
    
    const TABLE = 'work_hours';
    protected $table = self::TABLE;
    protected $fillable = [
        Service::TABLE.'_id',
        'day_of_week',
        'start_time',
        'end_time'
    ];
}
