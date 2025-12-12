<?php

namespace App\Services\ServiceProfiles;

use Exception;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ServiceRepository;

class ServiceProfileService{
    public function __construct(private ServiceRepository $serviceRepo) {}

        public function getProfile(Service $service){
        return $service->verified===1?$service: throw new Exception('servis nije verifikovan');
    }

}