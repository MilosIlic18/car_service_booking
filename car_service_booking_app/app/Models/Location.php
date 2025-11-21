<?php

namespace App\Models;

use App\Models\Town;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function service():BelongsTo{
        return $this->belongsTo(Service::class);
    }
    public function town():BelongsTo{
        return $this->belongsTo(Town::class,'towns_id');
    }
}
