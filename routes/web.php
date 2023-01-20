<?php

use App\Http\Controllers\CobroController;
use App\Http\Controllers\ConsolidadoController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\DiferidoController;
use App\Http\Controllers\PagoController;

use App\Http\Controllers\ProfileController;
use App\Models\Consolidado;
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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//      return view('dashboard');
//  })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [EmpresaController::class, 'empresa'], function () {
    return view('empresa');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/empresa', [EmpresaController::class, 'empresa'])->name('empresa');
    Route::resource('consolidado', ConsolidadoController::class)->names('consolidado');
    Route::post('consolidados/cierre', [ConsolidadoController::class, 'cierre'])->name('consolidados.cierre');
    Route::resource('empresas', EmpresaController::class)->names('empresas');
    Route::resource('cuentas', CuentaController::class)->names('cuentas');
    Route::resource('diferidos', DiferidoController::class)->names('diferidos');
    Route::resource('cobros', CobroController::class)->names('cobros');
    Route::resource('pagos', PagoController::class)->names('pagos');
    Route::resource('creditos', CreditoController::class)->names('creditos');
});

require __DIR__.'/auth.php';


