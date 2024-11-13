<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/taller/{post}',function($post){//recibe una variable que toma el parametro de ruta
    return "{$post}";
});

Route::get('/home',[HomeController::class,'index']);



Route::view('/login',"login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::view('/privada', "secret")->middleware('auth')->name('privada'); //vamos a anadir un middleware para validar 
//lo que hace es buscar si las credenciales del usuario son correctas, si no pss vas pal login

Route::post('/validar-registro', [LoginController::class, 'register'])-> name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

