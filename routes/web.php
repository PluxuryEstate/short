<?php

use App\Http\Controllers\linkcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/link', [LinkController::class, 'show'])->name('links.show');
Route::post('/link', [LinkController::class, 'send'])->name('links.send');

Route::get('/link/{prefix}', [LinkController::class, 'away'])
    ->where('prefix', '\w+')
    ->name('links.away');


