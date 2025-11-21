<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Service;

class ServiceRepository{
    private $service;
    public function __construct(Service $service){
        $this->service = $service;
    }

    public function store($request){
        return $this->service::create($request);
    }

    public function verified($service){
        $service->verified = true;
        $user = User::find($service->users_id);
        $user->role = 'owner';
        $user->save();
        $service->save();
        return $service;
    }
}