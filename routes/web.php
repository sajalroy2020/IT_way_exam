<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [AuthController::class, 'profile'])->name('profile');
    Route::get('edit/{id}', [AuthController::class, 'edit'])->name('edit');
    Route::post('update-profile', [AuthController::class, 'updateProfile'])->name('profile-update');

});


