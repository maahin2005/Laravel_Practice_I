<?php
// routes/api.php
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserCommentController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Mail;


// use App\Http\Controllers\PostController;
// use App\Http\Controllers\CommentController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');
Route::post('/register', [AuthController::class, 'register']);

// use App\Http\Controllers\DummyAPI;

// Route::get('/dummy-data',[DummyAPI::class,"getDummyData"]);


// use App\Http\Controllers\AuthController;

// Route::post('/register', [AuthController::class, 'register']);


// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
// Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');


Route::apiResource('posts', PostController::class);


// Route::apiResource('posts', PostController::class);
// Route::apiResource('comments', CommentController::class);



// Route::apiResource('posts', UserPostController::class);
// Route::apiResource('comments', UserCommentController::class);

