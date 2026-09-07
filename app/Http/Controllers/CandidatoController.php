<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Candidato::with('cargo')->orderBy('created_at', 'desc');
        
        if ($request->filled('busca')) {
            $query->where(function($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->busca . '%')
                  ->orWhere('email', 'like', '%' . $request->busca . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $candidatos = $query->paginate(10);
        
        return view('dashboard', compact('candidatos'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::where('ativo', true)->get();
        return view('recrutamento', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|string|max:14|unique:candidatos',
            'telefone' => 'required|string|max:20',
            'cargo_id' => 'required|exists:cargos,id',
            'data_teste_aptidao' => 'required|date',
        ]);

        Candidato::create($dadosValidados);
        return back()->with('sucesso', 'Inscrição realizada com sucesso! Prepare-se para o lançamento.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidato $candidato)
    {
        //
    }

    public function updateStatus(Request $request, Candidato $candidato){
        $request->validate([
            'status' => 'required|in:confirmado,cancelado'
        ]);

        $candidato->update(['status' => $request->status]);
        return back()->with('sucesso', 'Status do recruta atualizado com sucesso!');
    }
}
