<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductLineController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Data2RetrieveController;
use App\Http\Controllers\Data3RetrieveController;
use App\Http\Controllers\Data4RetrieveController;
use App\Http\Controllers\Data5RetrieveController;
use App\Http\Controllers\Data6RetrieveController;
use App\Http\Controllers\Data7RetrieveController;
use App\Http\Controllers\Data8RetrieveController;
use App\Http\Controllers\Data9RetrieveController;
use App\Http\Controllers\DataRetrieveController;
use App\Http\Controllers\FileUploadController;
use App\Services\Employer;
use Illuminate\Http\Request;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/contact', [ContactController::class, 'sendEmail']);

Route::group(['prefix'=>'web'],function (){
    Route::get('products',[DataRetrieveController::class,'index']);
    Route::get('users',[Data2RetrieveController::class,'index']);
    Route::get('comments',[Data3RetrieveController::class,'index']);
    Route::get('todos', [Data4RetrieveController::class,'index']);
    Route::get('images',[Data5RetrieveController::class,'index']);
    Route::get('carts',[Data6RetrieveController::class,'index']);
    Route::get('posts',[Data7RetrieveController::class,'index']);
    Route::get('quotes',[Data8RetrieveController::class,'index']);
    Route::get('recipes',[Data9RetrieveController::class,'index']);

});

Route::post('/upload', [FileUploadController::class, 'uploadFile']);

// apiResource kimi yox router kimi
Route::group(['prefix'=>'customers','middleware'=>\App\Http\Middleware\Api\DenyAccessMiddleware::class],function(){
    Route::get('/', [CustomerController::class, 'index']);
    Route::post('/', [CustomerController::class, 'store']);
    Route::get('{customer}', [CustomerController::class, 'show']);
    Route::put('{customer}', [CustomerController::class, 'update']);
    Route::patch('{customer}', [CustomerController::class, 'update']);
    Route::delete('{customer}', [CustomerController::class, 'destroy']);
});

// Route::apiResource('customers', CustomerController::class);


// apiResource kimi yox router kimi
Route::group(['prefix'=>'employees'],function (){
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/', [EmployeeController::class, 'store']);
    Route::get('{employee}', [EmployeeController::class, 'show']);
    Route::put('{employee}', [EmployeeController::class, 'update']);
    Route::patch('{employee}', [EmployeeController::class, 'update']);
    Route::delete('{employee}', [EmployeeController::class, 'destroy']);
});

//Route::apiResource('employees', EmployeeController::class);

// apiResource kimi yox router kimi
Route::group(['prefix'=>'offices'],function (){
    Route::get('/', [OfficeController::class, 'index']);
    Route::post('/', [OfficeController::class, 'store']);
    Route::get('{office}', [OfficeController::class, 'show']);
    Route::put('{office}', [OfficeController::class, 'update']);
    Route::patch('{office}', [OfficeController::class, 'update']);
    Route::delete('{office}', [OfficeController::class, 'destroy']);
});

//Route::apiResource('offices', OfficeController::class);


// apiResource kimi yox router kimi
Route::group(['prefix'=>'orderdetails'],function (){
    Route::get('/', [OrderDetailController::class, 'index']);
    Route::post('/', [OrderDetailController::class, 'store']);
    Route::get('{orderdetail}', [OrderDetailController::class, 'show']);
    Route::put('{orderdetail}', [OrderDetailController::class, 'update']);
    Route::patch('{orderdetail}', [OrderDetailController::class, 'update']);
    Route::delete('{orderdetail}', [OrderDetailController::class, 'destroy']);
});

//Route::apiResource('orderdetails', OrderDetailController::class);

// apiResource kimi yox router kimi
Route::group(['prefix'=>'orders'],function (){
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
    Route::get('{order}', [OrderController::class, 'show']);
    Route::put('{order}', [OrderController::class, 'update']);
    Route::patch('{order}', [OrderController::class, 'update']);
    Route::delete('{order}', [OrderController::class, 'destroy']);
});

// Route::apiResource('orders', OrderController::class);

// apiResource kimi yox router kimi
Route::group(['prefix'=>'payments'],function (){
    Route::get('/', [PaymentController::class, 'index']);
    Route::post('/', [PaymentController::class, 'store']);
    Route::get('{payment}', [PaymentController::class, 'show']);
    Route::put('{payment}', [PaymentController::class, 'update']);
    Route::patch('{payment}', [PaymentController::class, 'update']);
    Route::delete('{payment}', [PaymentController::class, 'destroy']);
});

//Route::apiResource('payments', PaymentController::class);

// apiResource kimi yox router kimi
Route::group(['prefix'=>'productlines'],function (){
    Route::get('/', [ProductLineController::class, 'index']);
    Route::post('/', [ProductLineController::class, 'store']);
    Route::get('{productline}', [ProductLineController::class, 'show']);
    Route::put('{productline}', [ProductLineController::class, 'update']);
    Route::patch('{productline}', [ProductLineController::class, 'update']);
    Route::delete('{productline}', [ProductLineController::class, 'destroy']);
});

// Route::apiResource('productlines', ProductLineController::class);

// apiResource kimi yox router kimi
Route::group(['prefix'=>'products'],function (){
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('{product}', [ProductController::class, 'show']);
    Route::put('{product}', [ProductController::class, 'update']);
    Route::patch('{product}', [ProductController::class, 'update']);
    Route::delete('{product}', [ProductController::class, 'destroy']);
});

// Route::apiResource('products', ProductController::class);


Route::get("/for-testing",function (){
    $employer1 = new Employer();

    $employer1->setName("Farhad");
    $employer1->setSalary(2000);

    return $employer1->getSalaryAfterTaxes();
});
