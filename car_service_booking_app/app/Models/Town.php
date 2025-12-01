<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Town extends Model
{
    //
    const TABLE = 'towns';
    protected $fillable = [
        'name',
    ];
    
    public function locations(): HasMany {
        return $this->hasMany(Location::class,'towns_id','id');
    }
}
