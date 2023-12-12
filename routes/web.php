<?php

use App\Http\Controllers\AttednLackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudantsController;
Auth::routes(['register' => false ]);

Route::resource('/', HomeController::class)->middleware('auth');
Route::resource('/home', HomeController::class)->middleware('auth');
// Route::resource('/rep', Controller::class)->middleware('auth');
// الدول والمحافظات والمراكز
Route::resource('Location', LocationController::class);

Route::resource('studants', StudantsController::class)->middleware('auth');
Route::resource('attedn', AttednLackController::class)->middleware('auth');
// Route::get('studant.show', function () {
//     return view("home");
// })->name("studant.show")->middleware('auth');

Route::get('rep1', 'App\Http\Controllers\RepController@rep1')->middleware('auth');
Route::get('rep2', 'App\Http\Controllers\RepController@rep2')->middleware('auth');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::get('/{page}', 'App\Http\Controllers\AdminController@index')->middleware('auth');
