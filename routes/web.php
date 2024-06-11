<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ProductsController;
use App\Http\Controllers\backend\DeliveryController;
use App\Http\Controllers\backend\PrivacyController;
use App\Http\Controllers\backend\TermsAndConditionController;
use App\Http\Controllers\backend\RefundController;
use App\Http\Controllers\backend\CompanyInformationController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\VehicleController;
use App\Http\Controllers\backend\WarehouseController;
use App\Http\Controllers\backend\DriverController;
use App\Http\Controllers\backend\VehiclesAssignController;
use App\Http\Controllers\backend\ShiftController;
use App\Http\Controllers\backend\WebsiteOrderController;
use App\Http\Controllers\backend\WebContentController;
use App\Http\Controllers\backend\SmsController;
use App\Http\Controllers\backend\PromotionController;
use App\Http\Controllers\backend\MoreServiceController;
use App\Http\Controllers\backend\OrderPageSelectColumnControlle;
use App\Http\Controllers\backend\OrderCategoryController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\PurchaseController;
use App\Http\Controllers\backend\OrderStatusController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AmarpayController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\backend\AdjustmentController;
use App\Models\backend\ProductModel;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ItemledgerController;
use App\Http\Controllers\backend\UserController;
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



// Route::get('/admin', function () {
//     return view('auth.login');
// });

Route::get('/dashboard', function () {
    return view('backend.page.dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/dashboard',[DashboardController::class, "Dashboard"])->name("dashboard")->middleware("AdminLogin");

//user


// Route::group(['middlewre'=> 'guest'], function(){
// Route::get('/login',[UserController::class, "LoginForm"])->name("login");
// Route::post('/login',[UserController::class, "Login"]);
// Route::post('/register',[CustomerController::class, "register"])->name("register");

// });

Route::get('adminlogin', [AdminLoginController::class, 'showLoginForm'])->name('adminlogin');
// Route::post('adminlogin', [AdminLoginController::class, 'login']);


Route::get('/logout', [UserController::class, "Logout"]);

Route::group(['midleware' => 'auth'], function () {
    Route::get('/user', [UserController::class, 'User'])->name('user');
    Route::get('/createUserForm', [UserController::class, "CreateUserForm"])->name("createUserForm");
    Route::post('/createUser', [UserController::class, "CreateUser"])->name("createUser");
    Route::get('/editUserForm/{id}', [UserController::class, "EditUserForm"])->name("editUserFrom");
    Route::post('/updateUser', [UserController::class, "UserUpdate"])->name("userUpdate");
    Route::get('/userDelete/{id}', [UserController::class, "UserDelete"])->name("deleteUser");

    //product
    Route::resource('products', ProductsController::class);
    Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
    // web.php (Routes file)
    Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');

    Route::get('/information',                 [AuthController::class, 'user'])->name('userdeshboard');
    Route::get('/driverstatus/{id}',           [AuthController::class, 'driverstatus'])->name('driverstatus.edit');
    Route::post('/driverupdatestatus/{id}',    [AuthController::class, 'driverstatusUpdate'])->name('driverstatus.update');

   // order Status

   Route::resource('status', OrderStatusController::class);



    //category
    Route::resource('categories', CategoryController::class);

    //deliveries
    // Route::get('deliveries', [DeliveryController::class, 'index'])->name('backend.page.deliveries.index');

    Route::resource('delivery', DeliveryController::class);
    Route::get('delivery/{delivery}/edit', [DeliveryController::class, 'edit'])->name('delivery.edit');


    //customer
    Route::resource('customer', CustomerController::class);

    //WarehouseController
    Route::resource('warehouses', WarehouseController::class);

    //adjustment
    Route::resource('adjustment', AdjustmentController::class);

    // item ledger
    Route::resource('itemledger', ItemledgerController::class);
    Route::get('/item-ledger/search', [ItemledgerController::class, 'showItemLedger'])->name('item_ledger.search');




    //vehicles
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::get('vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('vehicles/{vehicle}/update', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('vehicles/{vehicle}/destroy', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

    // About

    Route::resource('about', AboutController::class);
    Route::post('about/stroreupdate', [AboutController::class, 'storeOrUpdate'])->name('about.storeOrUpdate');

    // Privacy Policy

    Route::resource('privacy', PrivacyController::class);
    Route::post('privacy/stroreupdate', [PrivacyController::class, 'storeOrUpdate'])->name('privacy.storeOrUpdate');

    // Terms and Condition

    Route::resource('terms', TermsAndConditionController::class);
    Route::post('terms/stroreupdate', [TermsAndConditionController::class, 'storeOrUpdate'])->name('terms.storeOrUpdate');

    // Refund Policy

    Route::resource('refund', RefundController::class);
    Route::post('refund/stroreupdate', [RefundController::class, 'storeOrUpdate'])->name('refund.storeOrUpdate');

    // Company Information

    Route::resource('company', CompanyInformationController::class);
    Route::post('company/stroreupdate', [CompanyInformationController::class, 'storeOrUpdate'])->name('company.storeOrUpdate');
    Route::get('/index', [CompanyInformationController::class, 'index'])->name('index');


    // Driver

    Route::resource('driver', DriverController::class);
    // Route::post('driver/delete/{driver_id}', [DriverController::class, 'destroy'])->name('driver.destroy');


    // Shift

    Route::resource('shift', ShiftController::class);

    // Vehicles Assign

    Route::resource('vassign', VehiclesAssignController::class);
});
Route::resource('terms', TermsAndConditionController::class);
Route::post('terms/stroreupdate', [TermsAndConditionController::class, 'storeOrUpdate'])->name('terms.storeOrUpdate');

// Refund Policy

Route::resource('refund', RefundController::class);
Route::post('refund/stroreupdate', [RefundController::class, 'storeOrUpdate'])->name('refund.storeOrUpdate');

// Company Information

Route::resource('company',             CompanyInformationController::class);
Route::post('company/stroreupdate',    [CompanyInformationController::class, 'storeOrUpdate'])->name('company.storeOrUpdate');

// Website Content

Route::resource('webcontent',          WebContentController::class);
Route::post('webcontent/stroreupdate', [WebContentController::class, 'storeOrUpdate'])->name('webcontent.storeOrUpdate');

// Driver

Route::resource('driver',            DriverController::class);
// Route::post('driver/delete/{driver_id}', [DriverController::class, 'destroy'])->name('driver.destroy');


// Shift

Route::resource('shift',             ShiftController::class);

// Vehicles Assign

Route::resource('vassign',           VehiclesAssignController::class);

// Website Order

Route::middleware(['web'])->group(function () {
    Route::post('/store-order',          [WebsiteOrderController::class, 'store'])->name('weborder.store');
});


Route::resource('weborder',          WebsiteOrderController::class);
// Route::post('/store-order',          [WebsiteOrderController::class, 'store'])->name('weborder.store');
Route::get('/order',                 [WebsiteOrderController::class, 'order'])->name('order');
Route::get('/orderstatusview',       [WebsiteOrderController::class, 'orderStatusView'])->name('weborder.orderStatusView');
Route::post('/orderstatus',          [WebsiteOrderController::class, 'orderStatus'])->name('weborder.orderStatus');

// OrderPageSelectColumnController

Route::resource('select',          OrderCategoryController::class);


// SMS

Route::resource('sms',               SmsController::class);
Route::post('/send-otp-to-phone',    [SmsController::class, 'sendOtpToPhone'])->name('send-otp-to-phone');

// cupon

Route::resource('cupon',              PromotionController::class);

// Amar Pay

Route::resource('pay',                    AmarpayController::class);
Route::post('/paySuccess',               [AmarpayController::class, 'success'])->name('paySuccess');
Route::post('/payCancel',                [FuelController::class, 'cancel'])->name('payCancel');
Route::post('/payFail',                  [FuelController::class, 'fail'])->name('payFail');


// More Service

Route::resource('more',                    MoreServiceController::class);


// Supplier

Route::resource('supplier',                    SupplierController::class);

// Purchase

Route::resource('purchase',                    PurchaseController::class);



// Language

Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');


//Frontend

Route::get('/', function () {
    $products = App\Models\backend\ProductModel::all();
    return view('frontend/home/index', compact('products'));
});

Route::get('/index',                 [FuelController::class, 'index'])->name('index');
Route::get('/frontendabout',         [FuelController::class, 'about'])->name('about');
Route::get('/frontendprivacy',       [FuelController::class, 'privacy'])->name('privacy');
Route::get('/frontendreturnpolicy',  [FuelController::class, 'returnpolicy'])->name('returnpolicy');
Route::get('/frontendterms',         [FuelController::class, 'terms'])->name('terms');
Route::get('/frontendcontact',       [FuelController::class, 'contract'])->name('contact');
Route::get('/energy',                [FuelController::class, 'card'])->name('card');
Route::get('/footer',                [FuelController::class, 'footer'])->name('footer');
// Route::get('/showcard',              [  FuelController::class,'showcard'])->name('showcard');
// Route::get('/order',                 [  FuelController::class,'order'])->name('order');

// login, registration
//  Route::get('/customerr',                 [  AuthController::class,'user'])->name('userdeshboard');
Route::post('/update-personal-info', [UserController::class, 'updatePersonalInfo'])->name('update.personal.info');

//  Route::get('/personal-info', [RegisteredUserController::class, 'personalInfo'])->name('personal-info');

// Route::get('/userregistration',          [  AuthController::class,'registration'])->name('userregistration');
// Route::post('/customer-login',           [AuthController::class,    'login'])->name('frontend-login-or-register');




//End Frontend

require __DIR__ . '/auth.php';
