<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;

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

Route::get('/', function () {
    return view('index');
});

// Client index: Display all clients
Route::get('/clients',[ClientController::class,'index']);

// Invoice index: Display all invoices
Route::get('/invoices',[InvoiceController::class,'index']);



// Client invoices: Display all factures for a client
Route::get('/clients/clientinvoices/{id}',[ClientController::class,'clientInvoices']);

// Client show: Display a client by id
Route::get('/clients/show/{id}',[ClientController::class,'show']);

// Client create: Display form to create client
Route::get('/clients/create',[ClientController::class,'create']);

Route::post('/clients/create',[ClientController::class,'store']);

Route::get('/clients/edit/{id}',[ClientController::class,'edit']);
Route::patch('/clients/edit/{id}',[ClientController::class,'update']);

Route::get('/clients/destroy/{id}',[ClientController::class,'destroy']);



// Invoice show: Display a invoice by id
Route::get('/invoices/show/{id}',[InvoiceController::class,'show']);

// Invoice create: Display form to create invoice
Route::get('/invoices/create',[InvoiceController::class,'create']);

Route::post('/invoices/create',[InvoiceController::class,'store']);

Route::get('/invoices/edit/{id}',[InvoiceController::class,'edit']);
Route::patch('/invoices/edit/{id}',[InvoiceController::class,'update']);

Route::get('/invoices/destroy/{id}',[InvoiceController::class,'destroy']);



Route::get('/clear', function() {
    Artisan::call('optimize:clear');
    dd("Cache Clear All");
});