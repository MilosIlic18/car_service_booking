<?php


namespace App\Services\TownService;

use App\Models\Town;
use App\Repositories\TownRepository;

class TownService{

    private $townRepo;
    public function __construct(TownRepository $townRepo) {
        
        $this->townRepo  = $townRepo;
    }
    public function getAll(){
        return $this->townRepo->all();
    }
    public function getOne(Town $town){ return $town;}
    
    public function store($request){
        return $this->townRepo->store($request->all());
    }
    public function update($request,Town $town){ 
        return $town->update($request->all());
    }
    public function destroy(Town $town){
        return count($town->locations)===0?$town->delete():1;
    }
}