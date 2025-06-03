<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Rooms\roomManagementController;
use App\Http\Controllers\tenant\tenantManagementController;
use App\Http\Controllers\payment\paymentManagementController;
use App\Http\Controllers\expense\expenseManagementController;
use App\Http\Controllers\Report\dashboardReport;

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



Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/login', [loginController::class, 'login']);


Route::prefix('room')->group(function(){
 Route::POST('/save',[roomManagementController::class,'Store']);
 Route::GET('/get',[roomManagementController::class,'Index']);
 Route::GET('/getAll',[roomManagementController::class,'IndexAll']);
 Route::GET('/get/{id}',[roomManagementController::class,'Show']);
 Route::PUT('/update/{id}',[roomManagementController::class,'Update']);
 Route::PUT('/updatestatus/{id}',[roomManagementController::class,'updateStatus']);
 Route::DELETE('/delete/{id}',[roomManagementController::class,'Destroy']);
});


Route::prefix('tenant')->group(function(){
    Route::POST('/save',[tenantManagementController::class,'Store']);
    Route::GET('/get',[tenantManagementController::class,'Index']);
    Route::GET('/getAll',[tenantManagementController::class,'IndexAll']);
    Route::GET('/get/{id}',[tenantManagementController::class,'Show']);
    Route::PUT('/update/{id}',[tenantManagementController::class,'Update']);
    Route::DELETE('/delete/{id}',[tenantManagementController::class,'Destroy']);
   });


   Route::prefix('payment')->group(function(){
    Route::POST('/save',[paymentManagementController::class,'Store']);
    Route::GET('/get',[paymentManagementController::class,'Index']);
    Route::GET('/get/{id}',[paymentManagementController::class,'Show']);
    Route::PUT('/update/{id}',[paymentManagementController::class,'Update']);
    Route::DELETE('/delete/{id}',[paymentManagementController::class,'Destroy']);
    Route::get('/receipt/{id}', [paymentManagementController::class,'generateReceipt'])->name('payment.receipt');

   });


   
   Route::prefix('expense')->group(function(){
    Route::POST('/save',[expenseManagementController::class,'Store']);
    Route::GET('/get',[expenseManagementController::class,'Index']);
    Route::GET('/receipt/{id?}',[expenseManagementController::class,'generateReceiptExpense']);
   // Route::GET('/receipt',[expenseManagementController::class,'generateReceiptEaxpensesAll']);
    Route::GET('/getAll',[expenseManagementController::class,'IndexAll']);
    Route::GET('/get/{id}',[expenseManagementController::class,'Show']);
    Route::PUT('/update/{id}',[expenseManagementController::class,'Update']);
    Route::DELETE('/delete/{id}',[expenseManagementController::class,'Destroy']);

   });



   Route::prefix('report')->group(function(){
    Route::GET('/getRoomCounts',[dashboardReport::class,'getRoomCounts']);
    Route::GET('/getUnpaidTenants',[dashboardReport::class,'getUnpaidTenants']);
    Route::GET('/getTenantCounts',[dashboardReport::class,'getTenantCounts']);
    Route::GET('/getTotalPaymentExpenses',[dashboardReport::class,'getTotalPaymentExpenses']);
     Route::GET('/receipt',[dashboardReport::class,'generateReceiptExpense']);

   });