<?php

namespace App\Http\Controllers\ServiceProfiles;

use Exception;
use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\ServiceProfiles\ServiceProfileService;

class ProfileDashboardController extends Controller
{
    //
    public function __construct(private ServiceProfileService $serviceProfileService){}
    
    public function index(Service $service):RedirectResponse|View{
        try{
            $this->serviceProfileService->getProfile($service);
            return view("service-profiles.profile.dashboard.index");
        }
        catch(Exception $ex){
            return redirect()->route("service-profiles.index");
        }
    }
}
