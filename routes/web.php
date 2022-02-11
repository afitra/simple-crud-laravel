<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'create'])->name('register.create');

// Route::resource('foods', FoodController::class);


Auth::routes(['register' => false]);

 
Route::get('admin', [AdminController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('admin/foods', [AdminController::class, 'adminFoods'])->name('admin.foods')->middleware('is_admin');
 