<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function index(){
        return view('Pruebas.index',[
            'post'=>'erick' 
        ]);    
    }
}
