<?php

use App\Http\Controllers\HakAksesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PeranController;
use Illuminate\Support\Facades\Auth;

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
    return redirect('/login');
});

Auth::routes();


Route::middleware('auth')->group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // RBAC Pengguna
    Route::get('/rbac/pengguna', [PenggunaController::class, 'index'])->name('rbac.pengguna.index');

    // RBAC Hak Akses
    Route::get('/rbac/hak-akses', [HakAksesController::class, 'index'])->name('rbac.hakakses.index');

    // RBAC Peran
    Route::get('/rbac/peran', [PeranController::class, 'index'])->name('rbac.peran.index');
    Route::get('/rbac/peran/{name}', [PeranController::class, 'view'])->name('rbac.peran.view');
    Route::put('/rbac/peran/{name}/ubah', [PeranController::class, 'update'])->name('rbac.peran.update');
    Route::delete('rbac/peran/{name}/delete', [PeranController::class, 'delete'])->name('rbac.peran.delete');
});
