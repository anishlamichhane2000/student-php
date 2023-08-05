<?php
use App\Http\Controllers\ChildController;
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





Route::get('/', [ChildController::class, 'index'])->name('child.index');
Route::post('/save', [ChildController::class, 'save'])->name('child.save');

