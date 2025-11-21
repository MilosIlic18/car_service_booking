<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\ServiceRepository;

class AdminServiceController extends Controller
{
    //
    private $serviceRepo;
    public function __construct(ServiceRepository $serviceRepo){
        $this->serviceRepo  = $serviceRepo;
    }
    public function index():View{
        return view('pages.admin.dashboard.index',['services'=>Service::all()]);
    }

    public function verified(Service $service){
        $this->serviceRepo->verified($service);
        return back();
    }

}
