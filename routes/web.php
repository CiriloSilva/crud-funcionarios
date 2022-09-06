<?php

use App\Http\Controllers\FuncionariosController;
use Illuminate\Support\Facades\Route;





Route::get('/', function(){
    return redirect()->route('funcionarios-index');
});

Route::prefix('funcionarios')->group(function(){
    Route::get('/', [FuncionariosController::class, 'index'])->name('funcionarios-index');
    Route::get('/create', [FuncionariosController::class, 'create'])->name('funcionarios-create');
    Route::post('/', [FuncionariosController::class, 'store'])->name('funcionarios-store');
    Route::get('/{id}/edit', [FuncionariosController::class, 'edit'])->where('id', '[0-9]+')->name('funcionarios-edit');
    Route::put('/{id}', [FuncionariosController::class, 'update'])->where('id', '[0-9]+')->name('funcionarios-update');
    Route::delete('/{id}', [FuncionariosController::class, 'destroy'])->where('id', '[0-9]+')->name('funcionarios-destroy');
    Route::get('/sobre', [FuncionariosController::class, 'sobre'])->name('funcionarios-sobre');
    Route::get('/busca', [FuncionariosController::class, 'busca'])->name('funcionarios-busca');
    // Login
    Route::get('/login', [FuncionariosController::class, 'login'])->name('funcionarios-login');
    Route::get('/logout', [FuncionariosController::class, 'logout'])->name('funcionarios-logout');
    Route::post('/login/auth', [FuncionariosController::class, 'auth'])->name('funcionarios-login-auth');
    //Increver-se
    Route::get('/login/signup', [FuncionariosController::class, 'signup'])->name('funcionarios-login-signup');
    Route::post('/login/signup', [FuncionariosController::class, 'signup_store'])->name('funcionarios-login-store');
    Route::get('/user-edit', [FuncionariosController::class, 'user_edit'])->name('funcionarios-user-edit');
    Route::put('/user', [FuncionariosController::class, 'user_update'])->name('funcionarios-user-update');
    Route::get('/password-edit', [FuncionariosController::class, 'password_edit'])->name('funcionarios-password-edit');
    Route::put('/password', [FuncionariosController::class, 'password_update'])->name('funcionarios-password-update');
});

Route::fallback(function(){
    return "Erro na rota!";
});