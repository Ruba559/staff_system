<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/terms-and-conditions',[HomeController::class,'terms'])->name('terms');
Route::get('/privacy-policy',[HomeController::class,'privacy'])->name('privacy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('/my.route', function () {
    return 'button';
})->name('my.route');

Route::get('/test',[TaskController::class,'sendRemind']);
