<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
| Routes for menu
*/

// Route::get('/menu', [MenuController::class, 'index']);
// Route::post('/menu', [MenuController::class, 'store']);
// Route::get('/menu/{id}', [MenuController::class, 'show']);
// Route::put('/menu/{id}', [MenuController::class, 'update']);
// Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

Route::resource('/menu', MenuController::class)->except(['create', 'edit']);

/*
| Routes for detail pesanan
*/

Route::resource('/pesanan', PesananController::class)->except(['create', 'edit']);
