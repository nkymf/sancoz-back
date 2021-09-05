<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Src\V1\Infrastructure\Controllers\CreateUserController;
use App\Src\V1\Infrastructure\Controllers\DeleteUserController;
use App\Src\V1\Infrastructure\Controllers\ReadUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    Route::put('user', [CreateUserController::class, 'handle'])->name('api.v1.create-user');
    Route::get('user', [ReadUserController::class, 'handle'])->name('api.v1.read-user');
    Route::delete('user', [DeleteUserController::class, 'handle'])->name('api.v1.delete-user');

    //TODO : Implement Auth for this route.
    Route::get('/token', function () {
        return response()->json(['token' => csrf_token()]);
    });
});

