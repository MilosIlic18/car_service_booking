<?php

namespace App\Models;

use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    //
    const TABLE = "services";
    protected $table = self::TABLE;
    protected $fillable = [
        User::TABLE.'_id',
        'name',
        'description',
        'verified',
    ];

    public function location():HasOne{
        return $this->hasOne(Location::class,self::TABLE.'_id','id');
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class,'users_id');
    }
}
