<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargos', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cargo' => 'required|string|max:255|unique:cargos,cargo',
        ]);

        Cargo::create([
            'cargo' => $request->cargo,
            'ativo' => true 
        ]);

        return back()->with('sucesso', 'Nova vaga espacial adicionada ao sistema!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function toggle(Cargo $cargo)
    {
        $cargo->update(['ativo' => !$cargo->ativo]);
        
        $mensagem = $cargo->ativo ? 'Vaga ativada com sucesso!' : 'Vaga desativada (foi removida do formulário público).';
        return back()->with('sucesso', $mensagem);
    }

}


