<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;


Route::prefix('/')->group(function(){
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
