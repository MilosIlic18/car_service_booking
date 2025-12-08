<?php


namespace App\Services\UserService;

use App\Repositories\UserRepository;

class UserService{

    public function __construct(private UserRepository $userRepo){}

    public function getAll(){
        return $this->userRepo->all();
    }

    
}