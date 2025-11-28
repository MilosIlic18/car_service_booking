<?php

namespace App\Http\Controllers\Public;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TownService\TownService;
use App\Http\Requests\service\StoreServiceRequest;
use App\Services\ServiceProfiles\ServiceRequestProfile;

class ServiceRequestController extends Controller
{
    //
    private $serviceRequestProfile;
    private $townService;
    
    public function __construct(ServiceRequestProfile $serviceRequestProfile, TownService $townService){
        
        $this->serviceRequestProfile    = $serviceRequestProfile;
        $this->townService              = $townService;
    }
    public function index():View{
        return view('public.service_request',['towns'=>$this->townService->getAll()]);
    }
    public function store(StoreServiceRequest $storeServiceRequest){

        $this->serviceRequestProfile->store($storeServiceRequest);
        return back()->with('success','Uspesno ste prosledili zahtev');
    }
}
