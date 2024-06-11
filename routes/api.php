<?php

use App\Http\Controllers\backend\ProductsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\backend\CompanyInformationController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\VehicleController;
use App\Http\Controllers\backend\WarehouseController;
use App\Http\Controllers\backend\WebContentController;
use App\Http\Controllers\backend\WebsiteOrderController;
use App\Http\Controllers\FuelController;
use App\Models\backend\Warehouse;
use App\Models\backend\Webcontent;
use App\Models\backend\WebsiteOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// with authentication 
Route::group(['middleware' => 'auth:sanctum' , 'prefix' => 'api'], function () {
    Route::get('/products',         [ProductsController::class, 'productApi']);

    Route::get('/vehicles',         [VehicleController::class, 'vehiclesApi']);

    Route::get('/warehouse',        [WarehouseController::class, 'warehouseApi']);

    Route::get('/users',            [UserController::class, 'userApi']);

    Route::post('/order',           [WebsiteOrderController::class, 'orderApi']);

    Route::get('/webcontent',       [WebContentController::class, 'webcontentApi']);

    Route::get('/about',            [FuelController::class, 'aboutApi']);

    Route::get('/privacy',          [FuelController::class, 'privacyApi']);

    Route::get('/returnpolicy',     [FuelController::class, 'returnpolicyApi']);

    Route::get('/terms',            [FuelController::class, 'termsApi']);

    Route::get('/companyinformation', [CompanyInformationController::class, 'CompanyInformationApi']);

});

// Route::get('/products', [ProductsController::class, 'productApi']);

Route::group([ 'prefix' => 'api'], function () {
Route::post('/login', [AuthenticatedSessionController::class, 'loginApi']);
Route::post('/register', [RegisteredUserController::class, 'registerApi']);
});