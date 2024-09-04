<?php

use App\Enums\UserRole;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\SiteTouristiqueController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
 //route de l'authentification

Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])
//    ->middleware([('role:' . UserRole::ADMIN), auth::sanctum]);
    ->middleware(['auth:sanctum', 'role:' . UserRole::ADMIN]);
//    ->middleware('auth:sanctum');


//routes du crud users

Route::get('/users', [ UserController::class, 'index']);
Route::post('users/create', [ UserController::class, 'create']);
Route::get('users/{id}', [ UserController::class, 'show']);
Route::put('users/{id}/update', [ UserController::class, 'update']);
Route::delete('users/{id}', [ UserController::class, 'destroy']);

//routes de Hotel

Route::get('/hotel', [HotelController::class, 'index']);
Route::post('hotel/create', [HotelController::class, 'create']);
Route::get('hotel/{id}', [HotelController::class, 'show']);
Route::put('hotel/{id}/update', [HotelController::class, 'update']);
Route::delete('hotel/{id}', [HotelController::class, 'destroy']);


//routes des pieces

Route::get('/pieces', [PieceController::class, 'index']);
Route::post('pieces/create', [PieceController::class, 'create']);
Route::get('pieces/{id}', [PieceController::class, 'show']);
Route::put('pieces/{id}/update', [PieceController::class, 'update']);
Route::delete('pieces/{id}', [PieceController::class, 'destroy']);


//route du site touristique

Route::get('/SiteTouristique', [SiteTouristiqueController::class, 'index']);
Route::post('SiteTouristique/create', [SiteTouristiqueController::class, 'create']);
Route::get('SiteTouristique/{id}', [SiteTouristiqueController::class, 'show']);
Route::put('SiteTouristique/{id}/update', [SiteTouristiqueController::class, 'update']);
Route::delete('SiteTouristique/{id}', [SiteTouristiqueController::class, 'destroy']);


//routes des photos

Route::get('/photos', [PhotosController::class, 'index']);
Route::post('photos/create', [PhotosController::class, 'create']);
Route::get('photos/{id}', [PhotosController::class, 'show']);
Route::put('photos/{id}/update', [PhotosController::class, 'update']);
Route::delete('photos/{id}', [PhotosController::class, 'destroy']);

//routes des evaluations

Route::get('/evaluations', [ EvaluationController::class, 'index']);
Route::post('evaluations/create', [ EvaluationController::class, 'create']);
Route::get('evaluations/{id}', [ EvaluationController::class, 'show']);
Route::put('evaluations/{id}/update', [ EvaluationController::class, 'update']);
Route::delete('evaluations/{id}', [ EvaluationController::class, 'destroy']);

