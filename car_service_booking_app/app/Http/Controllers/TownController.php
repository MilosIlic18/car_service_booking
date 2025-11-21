<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;
use App\Repositories\TownRepository;
use App\Http\Requests\Town\StoreTownRequest;

class TownController extends Controller
{
    //
     public function __construct(TownRepository $townRepo){

        $this->townRepo  = $townRepo;
    }

    public function index(){
        return view('pages.admin.town.index',['towns'=>Town::all()]);
    }

    public function store(StoreTownRequest $request){
        $this->townRepo->store($request->all());
        return back();
    }
}
