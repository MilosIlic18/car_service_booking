<?php


namespace App\Services\ServiceTypeService;

use App\Models\ServiceType;
use App\Repositories\ServiceTypeRepository;



class ServiceTypeService{

    private $serviceTypeRepo;
    public function __construct(ServiceTypeRepository $serviceTypeRepo) {
        
        $this->serviceTypeRepo  = $serviceTypeRepo;
    }
    public function getAll(){
        return $this->serviceTypeRepo->all();
    }
    public function getOne(ServiceType $serviceType){ return $serviceType;}
    
    public function store($request){
        return $this->serviceTypeRepo->store($request->all());
    }
    public function update($request,ServiceType $serviceType){ 
        return $serviceType->update($request->all());
    }
    public function destroy(ServiceType $serviceType){
        return $serviceType->delete();
    }
}