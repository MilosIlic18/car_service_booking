<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TownController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\OwnerCheckMiddleware;
use App\Http\Controllers\AdminServiceController;
use App\Http\Middleware\GuestClientCheckMiddleware;
use App\Http\Controllers\ServriceProfile\ServiceProfilesController;


Route::middleware(GuestClientCheckMiddleware::class)->prefix('/')->group(function(){
    Route::get('', function () {
        return view('pages.home.index');
    })->name('homepage');

    Route::middleware('auth')->prefix('/service')->group(function(){
        Route::view('','pages.service.add')->name('services.add');
    
        Route::controller(ServiceController::class)->name("services.")->group(function(){
            Route::post('','store')->name("store");
        });
    });

});

Route::middleware(['auth',OwnerCheckMiddleware::class])->prefix('/serviceProfile')->name('serviceProfile.')->group(function(){
    
    Route::controller(ServiceProfilesController::class)->prefix('/services')->name("services.")->group(function(){
        Route::get('','index')->name("index");
    });
});

Route::middleware(['auth',AdminCheckMiddleware::class])->prefix('/admin')->name('admin.')->group(function(){
    
    Route::controller(AdminServiceController::class)->prefix('/services')->name("services.")->group(function(){
        Route::get('','index')->name("index");
        Route::get('{service}','verified')->name('verified');
    });
    
    Route::controller(TownController::class)->name("towns.")->group(function(){
        Route::get('','index')->name("index");
        Route::post('','store')->name('store');
    });
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
