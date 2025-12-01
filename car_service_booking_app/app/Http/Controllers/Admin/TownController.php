<?php

namespace App\Http\Controllers\Admin;

use App\Models\Town;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\TownService\TownService;
use App\Http\Requests\town\EditTownRequest;
use App\Http\Requests\town\StoreTownRequest;

class TownController extends Controller
{
    //
    private $townService;

    public function __construct(TownService $townService){
        $this->townService = $townService;
    }
    public function index(): View {
        return view("admin.towns.index",["towns"=>$this->townService->getAll()]);
    }
    public function store(StoreTownRequest $storeTownRequest): RedirectResponse {
        $this->townService->store($storeTownRequest);
        return back();
    }
    public function show(Town $town): View{
        return view("admin.towns.edit",["town"=>$this->townService->getOne($town)]);
    }
    public function update(EditTownRequest $storeTownRequest,Town $town): RedirectResponse {
        $this->townService->update($storeTownRequest,$town);        
        return redirect()->route("admin.towns.index");
    }
    public function destroy(Town $town): RedirectResponse {
        return $this->townService->destroy($town)!==1?back():back()->with("err","Nije moguce obrisati grad");
    }
}
