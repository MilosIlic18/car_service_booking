<?php

namespace App\Http\Controllers\ServriceProfile;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ServiceRepository;

class ServiceProfilesController extends Controller
{
    //
      private $serviceRepo;
    public function __construct(ServiceRepository $serviceRepo){
        $this->serviceRepo  = $serviceRepo;
    }
    public function index():View{
        return view('pages.serviceprofile.dashboard.index',['services'=>Auth::user()->services]);
    }

}
