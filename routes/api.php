<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\NotiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Manage\DashboardController;
use App\Http\Controllers\Manage\NotiAdminController;
use App\Http\Controllers\Manage\PostAdminController;
use App\Http\Controllers\Manage\SignalAdminController;
use App\Http\Controllers\Manage\InsightAdminController;
use App\Http\Controllers\Manage\CategoryAdminController;
use App\Http\Controllers\Manage\EducationAdminController;

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

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/signals', [SignalController::class, 'signals']);
Route::get('/signals/{signal}', [SignalController::class, 'signal']);
Route::get('/insights', [InsightController::class, 'insights']);
Route::get('/insight/{coin}', [InsightController::class, 'insight']);
Route::get('/insight/latest/featured', [InsightController::class, 'latest']);
Route::get('/education', [EducationController::class, 'index']);
Route::get('/education/{education}', [EducationController::class, 'show']);
Route::get('/coins', [CoinController::class, 'cryptos']);
Route::get('/coin/projects', [CoinController::class, 'projects']);
Route::get('/top/header/notify', NotiController::class);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    // PORTFOLIO
    Route::apiResource('/portfolio', PortfolioController::class);

    // CRYPTO NEWS
    Route::apiResource('/admin/posts', PostAdminController::class);

    // INSIGHT
    Route::apiResource('/admin/insight', InsightAdminController::class);

    // SIGNAL
    Route::apiResource('/admin/signals', SignalAdminController::class);
    
    // TOP HEADER NOTIFICATION
    Route::apiResource('/admin/notify', NotiAdminController::class);

    // CRYPTO EDUCATION
    Route::apiResource('/admin/categories', CategoryAdminController::class);
    Route::apiResource('/admin/education', EducationAdminController::class);
});