<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('asignar', function(){
    return view('asignacion');
})->name('asignar');

Route::get('asignarGeneral', function(){
    return view('asignacionBoletasSinUbicacion');
})->name('asignarGeneral');

