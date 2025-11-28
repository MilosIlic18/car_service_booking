<?php


namespace App\Services\ServiceProfiles;

use Illuminate\Support\Facades\Auth;
use App\Repositories\ServiceRepository;
use App\Repositories\LocationRepository;

class ServiceRequestProfile{

    private $serviceRepo;
    private $locationRepo;
    
    public function __construct(ServiceRepository $serviceRepo, LocationRepository $locationRepo) {

        $this->serviceRepo  = $serviceRepo;
        $this->locationRepo = $locationRepo;
    }

    public function store($request){
        
        $newService = $this->serviceRepo->store($request->only(['name','description'])+['users_id'=>Auth::user()->id]);
        $this->locationRepo->store(array_merge($request['location'],['services_id'=>$newService->id]));
        return $newService;
    }
}