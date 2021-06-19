<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\StatusController;


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


Route::middleware(['auth:sanctum', 'verified'])->get('/al', [ApplyController::class, 'apply']);

Route::middleware(['auth:sanctum', 'verified'])->post('/apply', [ApplyController::class, 'store'])->name('store');

//Route::middleware(['auth:sanctum', 'verified'])->post('/al', [ApplyController::class, 'apply'])->name('apply');


Route::middleware(['auth:sanctum', 'verified'])->post('/al', [ApplyController::class, 'apply'])->name('apply');

Route::middleware(['auth:sanctum', 'verified'])->get('/leave','App\Http\Controllers\LeaveController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/status','App\Http\Controllers\StatusController@index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
