<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\Veiculo;
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
        $viagem->load('motoristas', 'veiculo');

        return view('viagens.show', ['viagem' => $viagem]);
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

        return redirect()->route('viagens.index');
    }


    public function create()
    {
        $veiculosDisponiveis = Veiculo::whereDoesntHave('viagens', function ($query) {
            $query->where('finished', false);
        })->get();


        $motoristasDisponiveis = Motorista::whereDoesntHave('viagens', function ($query) {
            $query->where('finished', false);
        })->get();


        return view('viagens.create', compact('veiculosDisponiveis', 'motoristasDisponiveis'));
    }

    public function destroy($id)
    {
        $viagem = Viagem::findOrFail($id);

        $viagem->motoristas()->detach();
        $viagem->delete();

        return redirect()->route('viagens.index');
    }

    public function edit($id)
    {

        $viagem = Viagem::with('motoristas', 'veiculo')->findOrFail($id);

        $motoristasDisponiveis = Motorista::whereDoesntHave('viagens', function ($query) {
            $query->where('finished', false);
        })->get();

        $veiculosDisponiveis = Veiculo::whereDoesntHave('viagens', function ($query) {
            $query->where('finished', false);
        })->get();


        return view('viagens.edit', compact('viagem', 'motoristasDisponiveis', 'veiculosDisponiveis'));
    }

    public function modify(Request $request, $id)
    {

        // Validação dos dados recebidos
        $validated = $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'km_inicial' => 'required|integer|min:0',
            'km_final' => 'required|integer|gt:km_inicial',
            'motoristas' => 'required|array',
            'motoristas.*' => 'exists:motoristas,id',
            'finished' => 'nullable|boolean',  // Campo para verificar se a viagem já terminou
        ]);

        // Encontrar a viagem
        $viagem = Viagem::findOrFail($id);

        // Atualizar os dados da viagem
        $viagem->update([
            'veiculo_id' => $validated['veiculo_id'],
            'km_inicial' => $validated['km_inicial'],
            'km_final' => $validated['km_final'],
            'finished' => $validated['finished'] ?? false,  // Definir como false se não for marcado
        ]);

        // Atualizar os motoristas associados à viagem
        $viagem->motoristas()->sync($validated['motoristas']);

        return redirect()->route('viagens.index');
    }
}
