<?php


namespace App\Services\TownService;

use App\Models\Town;

class TownService{

    private $townRepo;
    public function __construct(Town $townRepo) {
        
        $this->townRepo  = $townRepo;
    }
    public function getAll(){
        return $this->townRepo->all();
    }
}