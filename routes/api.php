<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaymentController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('payments',[PaymentController::class, 'index']);
Route::post('payments',[PaymentController::class, 'store']);
Route::get('payments/{id}',[PaymentController::class, 'show']);
Route::get('payments/{id}/edit',[PaymentController::class, 'edit']);
Route::put('payments/{id}/edit', [PaymentController::class,'update'])->name("payment.update");
Route::delete('payments/{id}/delete',[PaymentController::class, 'destroy']);




// php artisan serve