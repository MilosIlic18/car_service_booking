<?php

namespace App\Repositories;

use App\Models\Town;

class TownRepository{
    private $town;
    public function __construct(Town $town){
        $this->town = $town;
    }
    public function store($request){
        return $this->town->create($request);
    }
}