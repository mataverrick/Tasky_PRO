<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotasController extends Controller
{
    
    public function index()
    {
        $mascotas = Mascota::all();
        return view('Mascotas.index',compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'apodo' => 'required|string|max:255'
        ]);

        Mascota::create($validate);

        return redirect()->route('mascotas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('Personas.edit', compact('persona'));
    }

    // Método para actualizar un registro existente
    public function update(Request $request)
    {
        
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
