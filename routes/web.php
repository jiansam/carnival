<?php

use App\Http\Controllers\PageController;
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


Route::get('qrcode', function(){
    return view("index_qrcode");
});

Route::get('convert/{type}/{phone}', [PageController::class, "convert"]);
Route::get('manager/{type}/{phone}', [PageController::class, "managerConvert"]);

Route::post('toLevel', [PageController::class, "toLevel"]);
Route::get('manager', [PageController::class, "manager"]);

Route::get('index', [PageController::class, "index"]);
Route::get('level', [PageController::class, "level"]);
Route::get('programme', [PageController::class, "programme"]);
Route::get('map', [PageController::class, "map"]);

