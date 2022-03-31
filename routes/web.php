<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

//Tables Controllers

Route::get('/products', [ProductController::class, 'get_products'])->name('products');
Route::get('/purchases', [PurchasesController::class, 'get_purchases'])->name('purchases');
Route::get('/materials', [MaterialsController::class, 'get_materials'])->name('materials');
Route::get('/sales', [SalesController::class, 'get_sales'])->name('sales');
Route::get('/production', [ProductionController::class, 'get_production'])->name('production');
Route::get('/users', [AdminController::class, 'get_users'])->name('users');


//Froms Controllers
Route::get('/material-form', [MaterialsController::class, 'materials_form'])->name('materials_form');
