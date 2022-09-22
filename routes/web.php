<?php

use App\Http\Controllers\FuncionariosController;
use Illuminate\Support\Facades\Route;




// Rota apenas para facilitar o acesso ao abrir o projeto
Route::get('/', function(){
    return redirect()->route('funcionarios-index');
});

// Criação de grupo para padronização das rotas
Route::prefix('funcionarios')->group(function(){
    // Index
    Route::get('/', [FuncionariosController::class, 'index'])->name('funcionarios-index');

    // Criação de funcionários
    Route::get('/create', [FuncionariosController::class, 'create'])->name('funcionarios-create');

    // Armazenamento do funcionário
    Route::post('/', [FuncionariosController::class, 'store'])->name('funcionarios-store');

    // Edição do funcionário passando o id pelo url
    Route::get('/{id}/edit', [FuncionariosController::class, 'edit'])->where('id', '[0-9]+')->name('funcionarios-edit');

    // Atualização dos dados do funcionário
    Route::put('/{id}', [FuncionariosController::class, 'update'])->where('id', '[0-9]+')->name('funcionarios-update');

    // Remoção do funcionário
    Route::delete('/{id}', [FuncionariosController::class, 'destroy'])->where('id', '[0-9]+')->name('funcionarios-destroy');

    // Página de sobre
    Route::get('/sobre', [FuncionariosController::class, 'sobre'])->name('funcionarios-sobre');

    // Página de busca
    Route::get('/busca', [FuncionariosController::class, 'busca'])->name('funcionarios-busca');

    // Login
    Route::get('/login', [FuncionariosController::class, 'login'])->name('funcionarios-login');

    // Logout
    Route::get('/logout', [FuncionariosController::class, 'logout'])->name('funcionarios-logout');

    // Autendicação do usuário
    Route::post('/login/auth', [FuncionariosController::class, 'auth'])->name('funcionarios-login-auth');
    
    //Increver-se
    Route::get('/login/signup', [FuncionariosController::class, 'signup'])->name('funcionarios-login-signup');

    // Armazenamento do usuário
    Route::post('/login/signup', [FuncionariosController::class, 'signup_store'])->name('funcionarios-login-store');

    // Edição dos dados do usuário
    Route::get('/user-edit', [FuncionariosController::class, 'user_edit'])->name('funcionarios-user-edit');

    // Atualização dos dados do usuário
    Route::put('/user', [FuncionariosController::class, 'user_update'])->name('funcionarios-user-update');

    // Edição da senha do usuário
    Route::get('/password-edit', [FuncionariosController::class, 'password_edit'])->name('funcionarios-password-edit');

    // Atualização da senha do usuário
    Route::put('/password', [FuncionariosController::class, 'password_update'])->name('funcionarios-password-update');
});

// Mensagem de erro para caso de ocorrer um erro de rota
Route::fallback(function(){
    return "Erro na rota!";
});