<?php

use App\Http\Controllers\api\LentesController;
use App\Http\Controllers\api\TipoLunaController;
use App\Http\Controllers\api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(LentesController::class)
    ->prefix("lentes")
    ->group(function () {
        Route::get("/ShowAllLente/{per_page}", "ShowAllLente");
        Route::post("/CreateLente", "CreateLente");
        Route::put("/updateLente/{id_lentes}", "updateLente");
    });
Route::controller(UsuarioController::class)
    ->prefix("usuarios")
    ->group(function () {
        Route::post("/userRegister", "userRegister");
        Route::post("/accessUser", "accessUser");
    });
    Route::controller(TipoLunaController::class)
    ->prefix("tipoLuna")
    ->group(function () {
        Route::get("/ShowAllTipoLuna", "ShowAllTipoLuna");
    });
