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

//post methods
Route::post('/register', [AdminController::class, 'register']);
Route::post('/tables/delete', [AdminController::class, 'delete']);

//put methods
Route::put('/tables/update', [AdminController::class, 'update']);
Route::put('/tables/restore', [AdminController::class, 'restore']);
