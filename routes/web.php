<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\viewFormController;

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

Route::get('/form', [formController::class, 'create']);

Route::get('/view', [formController::class, 'index']);
Route::post('/view_form', [formController::class, 'store']);

Route::get('/form/edit/{pos}', [formController::class, 'edit']);
Route::put('/form/update/{pos}', [formController::class, 'update']);

Route::get('/form/delete/{pos}', [formController::class, 'delete']);

Route::get('/form/destroy', [formController::class, 'destroy']);

