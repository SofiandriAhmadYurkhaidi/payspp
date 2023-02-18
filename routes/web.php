<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\HomeController;
use Iluminate\Support\Facades\Hash;


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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/data-siswa', SiswaController::class);

// Route::get('/data-siswa', [SiswaController::class, 'index'])->name('siswa.index');
