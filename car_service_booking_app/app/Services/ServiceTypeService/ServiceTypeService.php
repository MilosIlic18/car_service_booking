<?php


namespace App\Services\ServiceTypeService;

use App\Models\ServiceType;
use App\Repositories\ServiceTypeRepository;



class ServiceTypeService{

    public function __construct(private ServiceTypeRepository $serviceTypeRepo) {}
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