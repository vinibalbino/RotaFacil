<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{

    public function index()
    {
        $veiculos = Veiculo::all();

        return view('veiculos.index', ["veiculos" => $veiculos]);
    }

    public function show($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        return view('veiculos.show', ["veiculo" => $veiculo]);
    }


    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        return view('veiculos.edit', ["veiculo" => $veiculo]);
    }

    public function modify(Request $request, $id)
    {

        $validated = $request->validate([
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . now()->year,
            'data_aquisicao' => 'required|date',
            'km_aquisicao' => 'required|integer|min:0',
            'renavam' => "required|string|unique:veiculos,renavam,$id",
            'placa' => "required|string|unique:veiculos,placa,$id",
        ]);

        // Usando Carbon para tratar a validade da data de aquisição e do ano do veiculo
        // Ex: Não tem como comprar um veiculo do ano de 2004 se estamos em 2002
        if (Carbon::parse($validated['data_aquisicao'])->year < $validated['ano']) {
            return back()->withErrors(['data_aquisicao' => 'O ano de aquisição não pode ser menor que o ano do veículo.']);
        }

        $veiculo = Veiculo::findOrFail($id);

        $veiculo->update([
            'modelo' => $validated['modelo'],
            'ano' => $validated['ano'],
            'data_aquisicao' => $validated['data_aquisicao'],
            'km_aquisicao' => $validated['km_aquisicao'],
            'renavam' => $validated['renavam'],
            'placa' => $validated['placa'],
        ]);


        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'placa' => 'required|string|max:7|unique:veiculos,placa',
            'renavam' => 'required|string|max:11|unique:veiculos,renavam',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . now()->year,
            'data_aquisicao' => 'required|date',
            'km_aquisicao' => 'required|integer|min:0',
        ]);
        Veiculo::create($validated);

        return redirect()->route('veiculos.index');
    }

    public function destroy($id)
    {

        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();


        return redirect()->route('veiculos.index');
    }
}
