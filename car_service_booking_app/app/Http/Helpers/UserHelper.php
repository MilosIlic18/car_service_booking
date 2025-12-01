<?php

namespace App\Http\Helpers;



class UserHelper{


    public static function getRole($role){
        return match($role){
            'admin' => "administrator",
            'owner' => "vlasnik servisa",
            default => "klijent"
        };
    }
}