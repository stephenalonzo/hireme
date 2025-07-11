<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ListingController::class, 'index']);
Route::get('/job', [ListingController::class, 'show']);
Route::get('/post-job', [ListingController::class, 'create']);
Route::post('/post-job/company-details', [ListingController::class, 'create_companyDetails']);
Route::get('/post-job/company-details/job-details', [ListingController::class, 'create_jobDetails']);
Route::post('/post-job/store', [ListingController::class, 'store']);
