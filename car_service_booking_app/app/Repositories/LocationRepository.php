<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository{

    private  $location;
    
    function __construct(Location $location) {
        
        $this->location = $location;
    }
    public function store($request){
        
        return $this->location::create($request);
    }
}