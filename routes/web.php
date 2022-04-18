<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\InvoiceController;
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

//Production
Route::get('/production', [ProductionController::class, 'get_production'])->name('production');
Route::post('/new_production', [ProductionController::class, 'new_production'])->name('productions.new');
Route::get('/productions/{id}', [ProductionController::class, 'view_production'])->name('productions.view');
Route::delete('/productions/{id}', [ProductionController::class, 'delete_production'])->name('productions.delete');
Route::post('/production/{id}/{action}', [ProductionController::class, 'validate_production'])->name('production.validate');
Route::post('/production/{id}', [ProductionController::class, 'complete_production'])->name('production.complete');

//clients
Route::get('/clients', [ClientsController::class, 'get_clients'])->name('clients');
Route::post('/new_client', [ClientsController::class, 'new_client'])->name('new_client');



Route::get('/clients', [ClientsController::class, 'get_clients'])->name('clients');
Route::get('/fournisseurs', [FournisseursController::class, 'get_fournisseurs'])->name('fournisseurs');

Route::get('/users', [AdminController::class, 'get_users'])->name('users');

Route::get('/users', [AdminController::class, 'get_users'])->name('users');


//employees
Route::get('/employees', [EmployeeController::class, 'get_employees'])->name('employees');
Route::post('/new_employee', [EmployeeController::class, 'new_employee'])->name('new_employee');

//products
Route::get('/products', [ProductController::class, 'get_products'])->name('products');
Route::post('/new_product', [ProductController::class, 'new_product'])->name('new_product');
Route::get('/products/{id}', [ProductController::class, 'edit_product'])->name('products.edit');
Route::post('/products',[ProductController::class,'store']);
Route::delete('/products/{id}', [ProductController::class, 'delete_product'])->name('products.delete');

//materials
Route::get('/materials', [MaterialsController::class, 'get_materials'])->name('materials');
Route::post('/new_material', [MaterialsController::class, 'new_material'])->name('new_material');
Route::get('/materials/{id}', [MaterialsController::class, 'show_material'])->name('materials.show');
Route::post('/materials',[MaterialsController::class,'store']);
Route::get('/materials/{id}', [MaterialsController::class, 'edit_material'])->name('materials.edit');
Route::delete('/materials/{id}', [MaterialsController::class, 'delete_material'])->name('materials.delete');

//sales
Route::get('/sales', [SalesController::class, 'get_sales'])->name('sales');
Route::post('/new_sale', [SalesController::class, 'new_sale'])->name('sales.new');
Route::get('/sales/{id}', [SalesController::class, 'view_sale'])->name('sales.view');
Route::delete('/sales/{id}', [SalesController::class, 'delete_sale'])->name('sales.delete');
Route::post('/sale/{id}/{action}', [SalesController::class, 'validate_sale'])->name('sale.validate');



//purchases
Route::get('/purchases', [PurchasesController::class, 'get_purchases'])->name('purchases');
Route::post('/new_purchase', [PurchasesController::class, 'new_purchase'])->name('purchases.new');
Route::get('/purchases/{id}', [PurchasesController::class, 'view_purchase'])->name('purchases.view');
Route::delete('/purchases/{id}', [PurchasesController::class, 'delete_purchase'])->name('purchases.delete');
Route::post('/purchase/{id}/{action}', [PurchasesController::class, 'validate_purchase'])->name('purchase.validate');


//employees
Route::get('/employees', [EmployeeController::class, 'get_employees'])->name('employees');
Route::post('/new_employee', [EmployeeController::class, 'new_employee'])->name('new_employee');

//invoices
Route::get('/invoices', [InvoiceController::class, 'get_invoices'])->name('invoices');

//session
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');


//session
Route::post('logout',[SessionController::class, 'destroy']);

//Supplier
Route::get('/fournisseurs', [FournisseursController::class, 'get_fournisseurs'])->name('fournisseurs');
Route::post('/new_supplier', [FournisseursController::class, 'new_supplier'])->name('new_supplier');


//Voyager

//Route::group(['prefix' => 'admin'], function () {
   // Voyager::routes();
//});
