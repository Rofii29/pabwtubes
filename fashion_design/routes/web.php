<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignController;

Route::resource('designs', DesignController::class);

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

// Route untuk halaman welcome
Route::get('fashion', function () {
    return view('welcome');
});

// Route untuk halaman daftar designs
Route::get('/designs', [DesignController::class, 'index'])->name('designs.index');

// Route untuk halaman create design
Route::get('/designs/create', [DesignController::class, 'create'])->name('designs.create');

// Route untuk halaman show design berdasarkan ID
Route::get('/designs/{id}', [DesignController::class, 'show'])->name('designs.show');
// Route untuk halaman edit design berdasarkan ID
Route::patch('/designs/{id}/updateSize', [DesignController::class, 'updateSize'])->name('designs.updateSize');
Route::get('/designs/{id}/edit', 'DesignController@edit')->name('designs.edit');
