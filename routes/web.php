<?php

use App\Http\Controllers\PasienController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/pendaftaran', [PasienController::class, 'index']);
Route::get('/form-pendaftaran', [PasienController::class, 'create']);
Route::post('/save-pendaftaran', [PasienController::class, 'store']);
Route::get('/read-pendaftaran/{id}', [PasienController::class, 'read']);
Route::get('/edit-pendaftaran/{id}', [PasienController::class, 'edit']);
Route::post('/update-pendaftaran/{id}', [PasienController::class, 'update']);
Route::get('/delete-pendaftaran/{id}', [PasienController::class, 'destroy']);
