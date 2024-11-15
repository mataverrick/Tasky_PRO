<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PeopleController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('People.index',compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('People.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $bueno= $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15'        
        ]);
        
        Person::create($bueno);

        return redirect()->route('people.index');
    }
}
