<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ServiceRepository;
use App\Repositories\LocationRepository;
use App\Http\Requests\Service\StoreServiceRequest;

class ServiceController extends Controller
{
    //
    private $serviceRepo;
    private $locationRepo;
    public function __construct(ServiceRepository $serviceRepo, LocationRepository $locationRepo){

        $this->serviceRepo  = $serviceRepo;
        $this->locationRepo = $locationRepo;
    }
    public function store(StoreServiceRequest $request) {
        $newService = $this->serviceRepo->store($request->only(['name','description'])+['users_id' => Auth::user()->id]);
        $this->locationRepo->store(array_merge($request->input('location', []), ['services_id' => $newService->id]));
        return redirect()->route('homepage');
    }
}
