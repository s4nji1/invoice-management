<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Middleware\VerifyApiKey;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware([VerifyApiKey::class])->group(function () {
    Route::get('invoices/search', [InvoiceController::class, 'search']);
    Route::patch('invoices/{id}/pay', [InvoiceController::class, 'markAsPaid']);
});
