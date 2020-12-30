<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cors']], function() {
       
    Route::resource('sistemareservasboletasclientes','UserController');
    
    Route::resource('sistemareservasboletasdisponibles','BoletaController');
    
    Route::resource('sistemareservasboletasdisponiblestage','BoletaEscenarioController');
    
});