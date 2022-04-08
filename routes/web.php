<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
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
Route::get('/profile', [ProfileController::class, 'view_profile'])->name('profile.view');
Route::get('/settings', [ProfileController::class, 'edit_profile'])->name('profile.edit');
Route::post('logout',[SessionController::class, 'destroy']);

//Tables Controllers


Route::get('/production', [ProductionController::class, 'get_production'])->name('production');
Route::get('/clients', [ClientsController::class, 'get_clients'])->name('clients');
Route::get('/fournisseurs', [FournisseursController::class, 'get_fournisseurs'])->name('fournisseurs');

Route::get('/users', [AdminController::class, 'get_users'])->name('users');

//materials
Route::get('/materials', [MaterialsController::class, 'get_materials'])->name('materials');
Route::post('/new_material', [MaterialsController::class, 'new_material'])->name('new_material');
Route::get('/materials/{id}', [MaterialsController::class, 'show_material'])->name('materials.show');
Route::get('/materials/{id}', [MaterialsController::class, 'edit_material'])->name('materials.edit');
Route::delete('/materials/{id}', [MaterialsController::class, 'delete_material'])->name('materials.delete');

//sales
Route::get('/sales', [SalesController::class, 'get_sales'])->name('sales');
Route::post('/new_sale', [SalesController::class, 'new_sale'])->name('new_sale');

//purchases
Route::get('/purchases', [PurchasesController::class, 'get_purchases'])->name('purchases');
Route::post('/new_purchase', [PurchasesController::class, 'new_purchase'])->name('new_purchase');

//employees
Route::get('/employees', [EmployeeController::class, 'get_employees'])->name('employees');
Route::post('/new_employee', [EmployeeController::class, 'new_employee'])->name('new_employee');

//products
Route::get('/products', [ProductController::class, 'get_products'])->name('products');
Route::post('/new_product', [ProductController::class, 'new_product'])->name('new_product');


//Froms Controllers
Route::get('/material-form', [MaterialsController::class, 'materials_form'])->name('materials_form');

//session
Route::post('logout',[SessionController::class, 'destroy']);


//Voyager

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });
