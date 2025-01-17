<?php

namespace App\Http\Controllers;

use App\Models\Viagem;
use Illuminate\Http\Request;

class ViagensController extends Controller
{
    public function index()
    {
        $viagens = Viagem::with('motoristas', 'veiculo')->get();
        return view('viagens.index', ["viagens" => $viagens]);
    }

    public function show($id)
    {

        $viagem = Viagem::findOrFail($id);

        return view($viagem->load('motoristas', 'veiculo'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'km_inicial' => 'required|integer|min:0',
            'km_final' => 'required|integer|gt:km_inicial',
            'motoristas' => 'required|array',
            'motoristas.*' => 'exists:motoristas,id',
        ]);

        $viagem = Viagem::create([
            'veiculo_id' => $validated['veiculo_id'],
            'km_inicial' => $validated['km_inicial'],
            'km_final' => $validated['km_final'],
        ]);

        $viagem->motoristas()->attach($validated['motoristas']);

        // retorna a pagina visualizar
    }

    public function create()
    {
        // retorna pagina para criar viagem
    }

    public function destroy($id)
    {
        $viagem = Viagem::findOrFail($id);

        $viagem->motoristas()->detach();
        $viagem->delete();
    }
}
