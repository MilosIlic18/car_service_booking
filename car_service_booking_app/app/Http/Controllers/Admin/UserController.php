<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService\UserService;

class UserController extends Controller
{
    //
    public function __construct(private UserService $userService){}

    public function index() : View {
        return view("admin.users.index",["users"=>$this->userService->getAll()]);
    }
}
