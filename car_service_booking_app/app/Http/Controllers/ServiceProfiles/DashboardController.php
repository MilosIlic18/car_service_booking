<?php

namespace App\Http\Controllers\ServiceProfiles;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ServiceProfiles\ServiceProfilesService;

class DashboardController extends Controller
{
    //
    public function __construct(private ServiceProfilesService $serviceProfilesService){}

    public function index(): View{

        return view("service-profiles.index",["services"=>$this->serviceProfilesService->getServiceProfilesByOwner()]);
    }
}
