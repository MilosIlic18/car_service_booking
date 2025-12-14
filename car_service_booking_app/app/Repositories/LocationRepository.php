<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository{
    
    function __construct(private Location $location) {}
    public function store($request){
        
        return $this->location::create($request);
    }
}