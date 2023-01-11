<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LogoutController;

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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', LogoutController::class, 'perform')->name('logout.perform');
 });

Route::get('/dashboard/listings/{id}', [ListingController::class, 'index'])->name('listing');
Route::get('/dashboard/listings', [ListingController::class, 'collection'])->name('listings');
Route::post('/dashboard/listings/create', [ListingController::class, 'create'])->name('create.listing');
Route::get('/dashboard/listings/{id}/edit', [ListingController::class, 'edit'])->name('edit.listing');
Route::post('/dashboard/listings/{id}/update', [ListingController::class, 'update'])->name('update.listing');
Route::get('/dashboard/listings/{id}/delete', [ListingController::class, 'delete'])->name('delete.listing');

Route::get('/dashboard/recipes/{id}', [RecipeController::class, 'index'])->name('recipe');
Route::post('/dashboard/recipes/create', [RecipeController::class, 'create'])->name('create.recipe');
Route::get('/dashboard/recipes/{id}/delete', [RecipeController::class, 'delete'])->name('delete.recipe');


require __DIR__.'/auth.php';
