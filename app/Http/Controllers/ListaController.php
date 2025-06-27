<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista;

class ListaController extends Controller
{
    public function index()
    {
        $listas = Lista::all();
        return view('listas.index', compact('listas'));
    }

    public function create()
    {
        return view('listas.create');
    }

    public function store(Request $request)
    {
        Lista::create($request->all());
        return redirect()->route('listas.index');
    }

    public function show(Lista $lista)
    {
        return view('listas.show', compact('lista'));
    }

    public function destroy(Lista $lista)
    {
        $lista->delete();
        return redirect()->route('listas.index')->with('success', 'Lista excluída com sucesso!');
    }
}
