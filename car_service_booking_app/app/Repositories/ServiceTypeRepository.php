<?php

namespace App\Repositories;

use App\Models\ServiceType;


class ServiceTypeRepository{

    private  $serviceType;
    
    function __construct(ServiceType $serviceType) {
        
        $this->serviceType = $serviceType;
    }
    function all(){
        
        return $this->serviceType::all();
    }
    public function store($request){
        
        return $this->serviceType::create($request);
    }
}