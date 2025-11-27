<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\ServiceRequestController;



Route::prefix('/')->group(function(){
    Route::get('/', function () {
        return "Setup project";
    });
    Route::middleware('auth')->controller(ServiceRequestController::class)->prefix("/service-request")->name('service-request.')->group(function(){
        Route::get("","index")->name('index');
        Route::post("","store")->name('store');
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