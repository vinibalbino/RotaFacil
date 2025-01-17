<?php

namespace App\Http\Controllers;

use App\Models\Viagem;
use Illuminate\Http\Request;

class ViagensController extends Controller
{
    public function index()
    {
        $viagens = Viagem::all();

        return view('viagens.index', ["viagens" => $viagens]);
    }

    public function show($id) {}

    public function store() {}

    public function create() {}
}
