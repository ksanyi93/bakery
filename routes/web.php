<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SpecialProductsController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\OrderCalculationController;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/last-week-revenue', [SalesController::class, 'lastWeekRevenue'])->name('last-week-revenue');
Route::get('/special-products', [SpecialProductsController::class, 'specialProducts'])->name('special-products');
Route::get('/last-week-profit', [SalesController::class, 'lastWeekProfit'])->name('last-week-profit');
Route::get('/maximum-production', [ProductionController::class, 'maximumProduction'])->name('maximum-production');
Route::get('/order-specified-cakes', [OrderCalculationController::class, 'calculateSpecifiedCakes'])->name('order-specified-cakes');