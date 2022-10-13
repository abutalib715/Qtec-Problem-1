<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SearchHistoryController;

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
    return view('welcome');
});
Route::get('/initialize-filters-data', [SearchHistoryController::class, 'initializeFiltersData']);
Route::get('/filter-search-history', [SearchHistoryController::class, 'index']);
