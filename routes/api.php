<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\ScoreController;


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
// public routes

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('users', [AuthController::class, 'users']);
Route::post('/payment', [PaymentController::class, 'paymentMethod']);
Route::get('/questions', [QuestionController::class, 'index']);

// protected routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('updateUser/{user}', [AuthController::class, 'updateUser']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get questions
Route::get('/questions', [QuestionController::class, 'index']);

// email verification 
Route::get('/verify/{token}', [VerifyController::class, 'verifyEmail']);
// Route::post('/verify/{token}', 'VerifyController@verifyEmail')->name('verify');

//Get Users' scores
Route::g('/scores', [ScoreController::class, 'getUserScore']);