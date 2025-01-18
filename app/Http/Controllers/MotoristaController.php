<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{

    public function index()
    {
        $motoristas = Motorista::orderBy('created_at', 'desc')->get();

        return view('motoristas.index', ["motoristas" => $motoristas]);
    }

    public function create()
    {
        return view('motoristas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before:' . now()->subYears(18)->toDateString(),
            'numero_cnh' => 'required|string|unique:motoristas,numero_cnh|min:11|max:11',
        ]);

        Motorista::create($validated);

        return redirect()->route('motoristas.index');
    }

    public function destroy($id)
    {

        $motorista = Motorista::findOrFail($id);
        $motorista->delete();


        return redirect()->route('motoristas.index');
    }

    public function edit($id)
    {

        $motorista = Motorista::findOrFail($id);

        return view('motoristas.edit', ["motorista" => $motorista]);
    }
    public function modify(Request $request, $id)
    {

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before:' . now()->subYears(18)->toDateString(),
            'numero_cnh' => 'required|string|min:11|max:11|unique:motoristas,numero_cnh,' . $id,
        ]);

        // Motorista::where('id', $id)->update([ 'nome' => request.Name]);
        $motorista = Motorista::findOrFail($id);
        $motorista->update($validated);

        return redirect()->route('motoristas.index');
    }
}
