<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreDefaultAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name'      => "Admin",
            'email'     => env("DEFAULT_ADMIN_EMAIL"),
            'password'  =>  Hash::make(env("DEFAULT_ADMIN_PASSWORD")),
            'role'      => "admin",
        ]);
    }
}
