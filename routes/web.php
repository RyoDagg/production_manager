<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index']);

//Admin Controller GET

Route::get('/products', [AdminController::class, 'get_products']);
Route::get('/purchases', [AdminController::class, 'get_purchases']);
Route::get('/materials', [AdminController::class, 'get_materials']);
Route::get('/sales', [AdminController::class, 'get_sales']);
Route::get('/production', [AdminController::class, 'get_production']);
Route::get('/users', [AdminController::class, 'get_users']);
