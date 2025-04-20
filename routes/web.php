<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

//get methods
Route::get('/', [AdminController::class, 'login']);
Route::get('/index', [AdminController::class, 'index']);
Route::get('/forms', [AdminController::class, 'forms']);
Route::get('/tables', [AdminController::class, 'tables']);
Route::post('/register', [AdminController::class, 'register']);

Route::prefix('tables')->group(function () {
    Route::post('/remove', [AdminController::class, 'remove']);
    Route::post('/delete', [AdminController::class, 'delete']);

    Route::put('/update', [AdminController::class, 'update']);
    Route::put('/restore', [AdminController::class, 'restore']);
});
