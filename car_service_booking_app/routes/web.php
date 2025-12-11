<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\OwnerCheckMiddleware;
use App\Http\Controllers\Admin\TownController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\ServiceProfilesController;
use App\Http\Controllers\Public\ServiceRequestController;
use App\Http\Controllers\ServiceProfiles\DashboardController as ServiceProfilesDasboardController;



Route::prefix('/')->group(function(){
    Route::get('/', function () {
        return "Setup project";
    });
    Route::middleware('auth')->controller(ServiceRequestController::class)->prefix("/service-request")->name('service-request.')->group(function(){
        Route::get("","index")->name('index');
        Route::post("","store")->name('store');
    });

});


Route::middleware(["auth",AdminCheckMiddleware::class])->prefix('/admin')->name("admin.")->group(function(){
    Route::redirect('','admin/service-profiles')->name('index');
    Route::controller(ServiceProfilesController::class)->prefix("/service-profiles")->name('service-profiles.')->group(function(){
        Route::get("","index")->name('index');
        Route::put("{service}","verified")->name('verified');
    });
    Route::controller(TownController::class)->prefix("/towns")->name('towns.')->group(function(){
        Route::get("","index")->name('index');
        Route::get("{town}","show")->name('show');
        Route::put("{town}","update")->name('edit');
        Route::delete("{town}","destroy")->name('destroy');
        Route::post("","store")->name('store');
    });
    Route::controller(UserController::class)->prefix("/users")->name('users.')->group(function(){
        Route::get("","index")->name('index');
    });
    Route::controller(ServiceTypeController::class)->prefix("/service-types")->name('service-types.')->group(function(){
        Route::get("","index")->name('index');
        Route::get("{serviceType}","show")->name('show');
        Route::put("{serviceType}","update")->name('edit');
        Route::delete("{serviceType}","destroy")->name('destroy');
        Route::post("","store")->name('store');
    });
});

Route::middleware(["auth",OwnerCheckMiddleware::class])->prefix('/service-profiles')->name("service-profiles.")->group(function(){
    Route::get("",[ServiceProfilesDasboardController::class,"index"]);
});


Route::get('/logout',function (){
    Auth::logout();
    return redirect('/');
    
})->middleware('auth')->name('logout');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';