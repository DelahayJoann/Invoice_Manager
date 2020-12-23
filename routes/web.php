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

// Client index: Display all factures for a client
Route::get('/clients/clientinvoices/{id}',[ClientController::class,'clientInvoices']);

// Client index: Display all factures for a client
Route::get('/clients/{id}',[ClientController::class,'show']);