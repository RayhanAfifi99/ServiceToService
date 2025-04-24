<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/matkuls/api', [MatkulController::class, 'index']);

Route::get('/matkuls', [MatkulController::class, 'viewIndex'])->name('matkuls.index');



