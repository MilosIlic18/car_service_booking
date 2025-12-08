<?php

namespace App\Repositories;

use App\Models\User;


class UserRepository{

    
    function __construct(private User $user){}

    function all(){
        
        return $this->user::all();
    }
}