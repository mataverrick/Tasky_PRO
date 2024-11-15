<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function register(Request $request){
        //validar los datos
        $user = new User();

        $user->name= $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect(route('privada'));
    }

    public function login(Request $request){
        //necesitamos tener las credenciales
        $credentials = [
            "email"=> $request->email,
            "password"=>$request->password,

        ];

        //mantener iniciada la sesion
        $remember  = ($request->has('remember') ? true : false);

        //intento de inicio de sesion
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();

            return redirect()->intended('privada');
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();//aqui cerramos la sesion nene :) :(

        //es aconsejable darle reset a la sesion
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }

}
