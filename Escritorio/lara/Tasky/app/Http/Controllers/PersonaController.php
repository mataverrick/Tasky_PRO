<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();
        return view('Personas.index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Personas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $bueno= $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:personas,email',
            'telefono' => 'nullable|string|max:15'        
        ]);
        
        Persona::create($bueno);

        return redirect()->route('personas.index');
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
    public function edit(Persona $persona)
    {
        return view('Personas.edit', compact('persona'));
    }

    // Método para actualizar un registro existente
    public function update(Request $request, Persona $persona)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:personas,email,' . $persona->id,
            'telefono' => 'nullable|string|max:15',
        ]);

        // Actualizar los datos en la base de datos
        $persona->update($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
