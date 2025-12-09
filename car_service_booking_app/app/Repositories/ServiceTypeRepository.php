<?php

namespace App\Repositories;

use App\Models\ServiceType;


class ServiceTypeRepository{
    
    function __construct(private ServiceType $serviceType) {}
    function all(){
        
        return $this->serviceType::all();
    }
    public function store($request){
        
        return $this->serviceType::create($request);
    }
}