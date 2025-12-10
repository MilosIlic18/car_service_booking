<?php

namespace App\Models;

use App\Models\WorkHour;
use Illuminate\Database\Eloquent\Model;

class WorkHourBreak extends Model
{
    //
    const TABLE = 'work_hour_breaks';
    protected $table = self::TABLE;
    protected $fillable = [
        WorkHour::TABLE.'_id',
        'start_time',
        'end_time'
    ];
}
