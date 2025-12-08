<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository{
    
    function __construct(private Service $service) {}
    public function store($request){
        
        return $this->service::create($request);
    }
    public function all(){
        return Service::with(['user','location','location.town'])->get();
    }
}