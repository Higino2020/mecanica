<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ConcertarController,
    FuncionarioController,
    ManutencaoController,
    MotoristaController,
    RealizarManutencaoController,
    VeiculoController
};

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return view('pages.index');
    })->name('inicio');

    Route::resource('user', UserController::class);
    Route::resource('concertar', ConcertarController::class);
    Route::resource('funcio', FuncionarioController::class);
    Route::resource('manutecao', ManutencaoController::class);
    Route::resource('realizar',RealizarManutencaoController::class);
    Route::resource('veiculo',VeiculoController::class);
    Route::resource('motorista',MotoristaController::class);
    Route::resource('concerto',ConcertarController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
