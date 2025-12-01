<?php


namespace App\Services\UserService;

use App\Repositories\UserRepository;

class UserService{

    private $userRepo;
    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }

    public function getAll(){
        return $this->userRepo->all();
    }

    
}