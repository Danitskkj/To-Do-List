<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\TarefaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::resource('listas', ListaController::class);
Route::resource('tarefas', TarefaController::class);
Route::patch('tarefas/{tarefa}/toggle', [TarefaController::class, 'toggle'])->name('tarefas.toggle');