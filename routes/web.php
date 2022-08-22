<?php

use App\Http\Controllers\ListingController;
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
Route::get( '/listings/create', [ListingController::class, 'create'] );

//store single listings
Route::post( '/listings', [ListingController::class, 'storeListing'] );

//common resource route
// index - show all listings
// show - show single listings
// create - show form to create new listings
// store - store new listings
// edit - show form to edit listings
// update - update listings
// delete - delete listings


//get single listings
Route::get( '/listings/{listing}', [ListingController::class, 'show'] );

