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
    public function __construct(private ServiceRequestProfile $serviceRequestProfile,private TownService $townService){}

    public function index():View{
        return view('public.service_request',['towns'=>$this->townService->getAll()]);
    }
    public function store(StoreServiceRequest $storeServiceRequest){

        $this->serviceRequestProfile->store($storeServiceRequest);
        return back()->with('success','Uspesno ste prosledili zahtev');
    }
}
