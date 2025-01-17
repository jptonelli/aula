<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\JogadoresController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\paypalController;

Route::get("/", function() {
    return view ("admin_layout.index");
});

Route::middleware('auth')->group(function (){
    Route::get("/categoria/exc/{id}", [CategoriaController::class, 'excluirCategoria'])->name('categoria_exc');
    Route::get("/categoria/upd/{id}", [CategoriaController::class, 'buscarAlteracao'])->name('categoria_upd');
    Route::post("/categoria", [CategoriaController::class, 'incluirCategoria']);
    Route::post("/categoria/upd", [CategoriaController::class, 'executaAlteracao']);
    
    Route::get("/timeCadastrar", function(){
        return view("time.cadastrar");
    });
    
    Route::post("/time", [TimeController::class, 'incluirTime'])->name('timeCadastrar');
    Route::get("/time/exc/{id}", [TimeController::class, 'excluirTime'])->name('time_exc');
    Route::get("/time/upd/{id}", [TimeController::class, 'buscarAlteracao'])->name('time_upd');
    Route::post("/time/upd", [TimeController::class, 'executaAlteracao']);
    
    Route::post("/jogadores", [JogadoresController::class, 'incluirJogador']);
    Route::get("/jogadores/exc/{id}", [JogadoresController::class, 'excluirJogador'])->name('jogador_exc');
    Route::get("/jogadores/upd/{id}", [JogadoresController::class, 'buscarAlteracao'])->name('jogador_upd');
    Route::post("/jogadores/upd", [JogadoresController::class, 'executaAlteracao']);
});

Route::get("/categoria", [CategoriaController::class, 'index']);
Route::get("/jogadores", [JogadoresController::class, 'index'])->name('jogadores');
Route::get("/time", [TimeController::class, 'index']);

Route::get("/registrar", function(){
    return view("admin_layout.registrar");
})->name('registrar');
Route::post("/registrar", [AuthController::class, 'register']);

Route::get("/login", function(){
    return view("admin_layout.login");
})->name('login');
Route::post("/login", [AuthController::class, 'login']);

Route::post('/checkout', '\App\Http\Controllers\paypalController@index')->name('checkout');
Route::get('/create/{amount}', '\App\Http\Controllers\paypalController@create');
Route::post('/complete', '\App\Http\Controllers\paypalController@complete');

