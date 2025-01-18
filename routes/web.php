<?php

use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ViagensController;
use App\Models\Viagem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/motoristas', [MotoristaController::class, 'index'])->name('motoristas.index');
Route::get('/motoristas/adicionar', [MotoristaController::class, 'create'])->name('motoristas.create');
Route::get('/motoristas/{id}/editar', [MotoristaController::class, 'edit'])->name('motoristas.edit');

Route::put('/motoristas/{id}', [MotoristaController::class, 'modify'])->name('motoristas.modify');
Route::post('/motoristas', [MotoristaController::class, 'store'])->name('motoristas.store');
Route::delete('/motoristas/{id}/deletar', [MotoristaController::class, 'destroy'])->name('motoristas.destroy');


Route::get('/veiculos', [VeiculosController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/adicionar', [VeiculosController::class, 'create'])->name('veiculos.create');
Route::get('/veiculos/{id}', [VeiculosController::class, 'show'])->name('veiculos.show');
Route::get('/veiculos/{id}/editar', [VeiculosController::class, 'edit'])->name('veiculos.edit');

Route::put('/veiculos/{id}', [VeiculosController::class, 'modify'])->name('veiculos.modify');
Route::delete('/veiculos/{id}/deletar', [VeiculosController::class, 'destroy'])->name('veiculos.destroy');
Route::post('/veiculos', [VeiculosController::class, 'store'])->name('veiculos.store');

Route::get('/viagens', [ViagensController::class, 'index'])->name('viagens.index');
Route::get('/viagens/adicionar', [ViagensController::class, 'create'])->name('viagens.create');
Route::get('/viagens/{id}', [ViagensController::class, 'show'])->name('viagens.show');
Route::get('/viagens/{id}/editar', [ViagensController::class, 'edit'])->name('viagens.edit');

Route::post('/viagens', [ViagensController::class, 'store'])->name('viagens.store');
Route::delete('/viagens/{id}/deletar', [ViagensController::class, 'destroy'])->name('viagens.destroy');
Route::put('/viagens/{id}', [ViagensController::class, 'modify'])->name('viagens.modify');
