<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository{
    private $locaton;
    public function __construct(Location $locaton){
        $this->locaton = $locaton;
    }

    public function store($request){
        return $this->locaton::create($request);
    }
}