<?php

namespace App\Repositories;

use App\Models\Town;
use App\Models\Location;

class TownRepository{

    private  $town;
    
    function __construct(Town $town) {
        
        $this->town = $town;
    }
    function all(){
        
        return $this->town::with('locations')->get();
    }
    public function store($request){
        
        return $this->town::create($request);
    }
}