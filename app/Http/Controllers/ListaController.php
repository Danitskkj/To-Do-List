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
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        Lista::create($request->all());
        return redirect()->route('listas.index')->with('success', 'Lista criada com sucesso!');
    }

    public function show(Lista $lista)
    {
        return view('listas.show', compact('lista'));
    }

    public function edit(Lista $lista)
    {
        return view('listas.edit', compact('lista'));
    }

    public function update(Request $request, Lista $lista)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        $lista->update($request->all());
        return redirect()->route('listas.index')->with('success', 'Lista atualizada com sucesso!');
    }

    public function destroy(Lista $lista)
    {
        $lista->delete();
        return redirect()->route('listas.index')->with('success', 'Lista excluída com sucesso!');
    }
}
