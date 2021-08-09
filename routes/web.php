<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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
    return view('overview');
});

Route::get('/customers/create', function () {
    return view("create");
});

Route::post('/customers/create', [CustomerController::class, 'createCustomer']);

Route::get("/customers",[CustomerController::class, "overview"]);


Route::post("/customers",[CustomerController::class, "search"])->name("search");
