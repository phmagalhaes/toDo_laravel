<?php

use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
Route::get('/tarefas/cadastro', [TarefaController::class, 'create'])->name('tarefas.create');
Route::post('/tarefas/cadastro', [TarefaController::class, 'store'])->name('tarefas.store');
Route::get('/tarefas/excluir/{id}', [TarefaController::class, 'delete'])->name('tarefas.delete');
Route::put('/tarefas/status/{id}', [TarefaController::class, 'status'])->name('tarefas.status');
Route::get('/tarefas/edit/{id}', [TarefaController::class, 'edit'])->name('tarefas.edit');
Route::put('/tarefas/edit/{id}', [TarefaController::class, 'update'])->name('tarefas.update');

Route::get('/cadastro', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/cadastro', [UsuarioController::class, 'store'])->name('usuarios.store');
