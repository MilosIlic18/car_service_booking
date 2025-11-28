<?php

namespace App\Services\ServiceProfiles;

use App\Models\User;
use App\Models\Service;
use App\Repositories\ServiceRepository;

class ServiceProfilesService{

    private $serviceRepo;

    public function __construct(ServiceRepository $serviceRepo) {

        $this->serviceRepo  = $serviceRepo;
    }

    public function getAll(){
        return $this->serviceRepo->all();
    }

    public function verified(Service $service){
        $service->verified = true;
        if($service->user->role!=="owner"){
            $user = User::where("id",$service->user->id)->first();
            $user->role = "owner";
            $user->save();
        }

        return $service->save();
    }
}