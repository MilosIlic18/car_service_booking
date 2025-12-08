<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\ServiceTypeService\ServiceTypeService;
use App\Http\Requests\serviceType\EditServiceTypeRequest;
use App\Http\Requests\serviceType\StoreServiceTypeRequest;

class ServiceTypeController extends Controller
{
    //
    public function __construct(private ServiceTypeService $serviceTypeService){}
    
    public function index(): View {
        return view("admin.service-types.index",["serviceTypes"=>$this->serviceTypeService->getAll()]);
    }
    public function store(StoreServiceTypeRequest $storeServiceTypeRequest): RedirectResponse {
        $this->serviceTypeService->store($storeServiceTypeRequest);
        return back();
    }
    public function show(ServiceType $serviceType): View {
        return view("admin.service-types.edit",["serviceType"=>$this->serviceTypeService->getOne($serviceType)]);
    }
    public function update(EditServiceTypeRequest $editServiceTypeRequest,ServiceType $serviceType): RedirectResponse {
        $this->serviceTypeService->update($editServiceTypeRequest,$serviceType);        
        return redirect()->route("admin.service-types.index");
    }
    public function destroy(ServiceType $serviceType): RedirectResponse {
        return $this->serviceTypeService->destroy($serviceType)!==1?back():back()->with("err","Nije moguce obrisati tip");
    }
}
