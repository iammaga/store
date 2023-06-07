<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MarketplaceController;
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
// Home
Route::get('/', function () {
    return view('home');
});

// Companies
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('company-create');
Route::post('/companies/store', [CompanyController::class, 'store'])->name('company-store');
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('company-edit');
Route::patch('/companies/{company}/update', [CompanyController::class, 'update'])->name('company-update');
Route::get('/companies/{company}/delete', [CompanyController::class, 'destroy']);
Route::get('/companies/{company}', [CompanyController::class, 'show']);

// Marketplace
Route::get('/marketplaces', [MarketplaceController::class, 'index'])->name('marketplaces');
Route::get('/marketplaces/create', [MarketplaceController::class, 'create'])->name('product-create');
Route::post('/marketplaces/store', [MarketplaceController::class, 'store'])->name('product-store');
Route::get('/marketplaces/{product}/edit', [MarketplaceController::class, 'edit'])->name('product-edit');
Route::patch('/marketplaces/{product}/update', [MarketplaceController::class, 'update'])->name('product-update');
Route::get('/marketplaces/{product}/delete', [MarketplaceController::class, 'destroy']);
Route::get('/marketplaces/{product}', [MarketplaceController::class, 'show']);
