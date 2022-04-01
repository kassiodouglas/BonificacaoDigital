<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth')->group(function () {

    #insercao
    Route::prefix('insert')->group(function(){
        Route::put('/user', [ControllerUser::class,'insert'])->name('insert.user');
        Route::put('/movement',[ControllerMovimentacao::class,'insert'])->name('insert.movement');
    });

    #update
    Route::prefix('update')->group(function(){
        Route::post('/user/{id}', [ControllerUser::class,'update'])->name('update.user');
        Route::post('/movement/{id}',[ControllerMovimentacao::class,'update'])->name('update.movement');
    });


    #exibe um registro
    Route::prefix('show')->group(function(){
        Route::get('/user',[ControllerUser::class,'index'])->name('index.user');
        Route::get('/user/{id}',[ControllerUser::class,'show'])->name('show.user');

        Route::get('/movement',[ControllerMovimentacao::class,'index'])->name('index.movement');
        Route::get('/movement/{id}',[ControllerMovimentacao::class,'show'])->name('show.movement');

        Route::get('/types_movement',[ControllerTiposMovimentacao::class,'index'])->name('index.types_movement');
    });

});
