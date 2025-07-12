<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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
Route::post('/job/apply/submit', [ApplicantController::class, 'store']);
Route::get('/job/{listing}/apply', [ApplicantController::class, 'index']);
Route::get('/job/{listing}', [ListingController::class, 'show']);
Route::get('/post-job', [ListingController::class, 'create']);
Route::post('/post-job/company-details', [ListingController::class, 'createCompanyDetails']);
Route::get('/post-job/company-details/job-details', [ListingController::class, 'createJobDetails']);
Route::post('/post-job/store', [ListingController::class, 'store']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/login/authenticate', [UserController::class, 'authenticate']);
Route::get('/login', [UserController::class, 'index'])->name('Login');
Route::get('/register', [UserController::class, 'create'])->name('Register');
Route::post('/user/register', [UserController::class, 'store']);
Route::get('/logout', [UserController::class, 'destroy']);
