<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerMovement;
use App\Http\Controllers\ControllerUser;

Route::middleware('auth')->group(function () {

    Route::get('/', [ControllerMovement::class, 'index'])->name('home');
    Route::get('/movimentacoes', [ControllerMovement::class, 'index'])->name('movements');
    Route::get('/funcionarios', [ControllerUser::class, 'index'])->name('employees');


    #insercao
    Route::prefix('insert')->group(function(){
        Route::put('/user', [ControllerUser::class,'insert'])->name('insert.user');
        Route::put('/movement',[ControllerMovement::class,'insert'])->name('insert.movement');
    });

    #exclusao
    Route::prefix('destroy')->group(function(){
        Route::delete('/user/{id}', [ControllerUser::class,'destroy'])->name('destroy.user');
    });


    #update
    Route::prefix('update')->group(function(){
        Route::post('/user/{id}', [ControllerUser::class,'update'])->name('update.user');
    });

});


require __DIR__.'/auth.php';
