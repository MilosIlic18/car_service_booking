<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\ServiceProfiles\ServiceProfilesService;

class ServiceProfilesController extends Controller
{
    //
    public function __construct(private ServiceProfilesService $serviceProfilesService){}
    
    public function index(): View {
        return view("admin.service-profiles.index",['services'=>$this->serviceProfilesService->getAll()]);
    }
    public function verified(Service $service): RedirectResponse {
        $this->serviceProfilesService->verified($service);
        return back();
    }
}
