<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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

// Routes de l'utilisateur simple

Route::get('/', [UserController::class, 'main_user']);
Route::get('/Site_touristique', [UserController::class, 'site_touristique']);
Route::get('/Reserver_site_touristique', [UserController::class, 'reserver_site_touristique']);
Route::get('/Historique', [UserController::class, 'historique']);

// Routes de l'Admin debut

Route::get('/Admin', [AdminController::class, 'dashboard'])-> name('Admin');
Route::get('/button', [AdminController::class, 'button'])-> name('button');

// fin routes de l'Admin
