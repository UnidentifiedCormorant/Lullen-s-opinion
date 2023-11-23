<?php

use App\Http\Controllers\FrontBuildController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'start'])->name('start');

Route::get('new-game', [MainController::class, 'newGame'])->name('newGame');
Route::get('current-stage', [MainController::class, 'currentStage'])->name('currentStage');
Route::post('next-stage', [MainController::class, 'nextStage'])->name('nextStage');

Route::get('view/{view}', [FrontBuildController::class, 'ShowView']);
