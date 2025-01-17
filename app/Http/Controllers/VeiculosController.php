<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{

    public function index()
    {
        $veiculos = Veiculo::all();

        return view('veiculos.index', ["veiculos" => $veiculos]);
    }

    public function show($id) {}

    public function store() {}

    public function create() {}
}
