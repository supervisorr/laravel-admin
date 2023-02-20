<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\PostsController;

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

// Users

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Posts

Route::prefix('posts')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('getAllPosts');
});

// Route::get('/', [JuegoController::class, 'index'])->name('getAllJuegos');
// Route::post('/', [JuegoController::class, 'store'])->name('addJuego')->middleware('auth:sanctum');

Route::prefix('posts')->group(function () {
    Route::post('/', [PostsController::class, 'store'])->name('addPost');
});

