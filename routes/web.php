<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/movimentacoes', function () {
    return view('pages.movements.index');
})->middleware(['auth'])->name('movements');


Route::get('/funcionarios', function () {
    return view('pages.employees.index');
})->middleware(['auth'])->name('employees');




require __DIR__.'/auth.php';
