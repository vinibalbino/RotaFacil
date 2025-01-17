<?php

use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ViagensController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/motoristas', [MotoristaController::class, 'index'])->name('motoristas.index');
Route::get('/motoristas/adicionar', [MotoristaController::class, 'create'])->name('motoristas.create');
Route::put('/motoristas/{id}', [MotoristaController::class, 'modify'])->name('motoristas.modify');
Route::get('/motoristas/{id}/editar', [MotoristaController::class, 'edit'])->name('motoristas.edit');

Route::post('/motoristas', [MotoristaController::class, 'store'])->name('motoristas.store');
Route::delete('/motoristas/{id}/deletar', [MotoristaController::class, 'destroy'])->name('motoristas.destroy');


Route::get('/veiculos', [VeiculosController::class, 'index'])->name('veiculos.index');
Route::get('/viagens', [ViagensController::class, 'index'])->name('viagens.index');
