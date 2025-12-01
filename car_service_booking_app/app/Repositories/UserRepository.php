<?php

namespace App\Repositories;

use App\Models\User;


class UserRepository{

    private  $user;
    
    function __construct(User $user) {
        
        $this->user = $user;
    }
    function all(){
        
        return $this->user::all();
    }
}