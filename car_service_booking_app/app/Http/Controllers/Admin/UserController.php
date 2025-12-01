<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService\UserService;

class UserController extends Controller
{
    //
    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function index() : View {
        return view("admin.users.index",["users"=>$this->userService->getAll()]);
    }
}
