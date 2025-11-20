<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository{
    private $service;
    public function __construct(Service $service){
        $this->service = $service;
    }

    public function store($request){
        return $this->service::create($request);
    }
}