<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
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

Route::get( '/', [ListingController::class, 'index'] );

//show create listing form
Route::get( '/listings/create', [ListingController::class, 'create'] )->middleware('auth');

//store single listings
Route::post( '/listings', [ListingController::class, 'storeListing'] )->middleware('auth');

//show edit form
Route::get( '/listings/{listing}/edit', [ListingController::class, 'edit'] )->middleware('auth');

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'updateListing'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'deleteListing'])->middleware('auth');

//common resource route
// index - show all listings
// show - show single listings
// create - show form to create new listings
// store - store new listings
// edit - show form to edit listings
// update - update listings
// delete - delete listings

//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//get single listings
Route::get( '/listings/{listing}', [ListingController::class, 'show'] );




//show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


//create new user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/login', [UserController::class, 'loginUser']);





