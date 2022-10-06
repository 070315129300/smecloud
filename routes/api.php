<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
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
//public routes
//Route::resource('registers', RegisterController::class);
Route::get('/registers/search/{name}', [RegisterController::class, 'search']);
Route::get('/users', [RegisterController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//protected routes
// Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::put('/user/{id}', [RegisterController::class, 'update']);
    Route::delete('/user/{id}', [RegisterController::class, 'delete']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user/{id}', [RegisterController::class, 'show']);
//    Route::post('/registers', [RegisterController::class, 'store']);

// });
