<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Lista;

class TarefaController extends Controller
{
    public function create(Request $request)
    {
        $lista_id = $request->query('lista_id');
        $listas = Lista::all();
        return view('tarefas.create', compact('lista_id', 'listas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'lista_id' => 'required|exists:listas,id',
            'concluida' => 'boolean'
        ]);

        Tarefa::create($request->all());
        return redirect()->route('listas.show', $request->lista_id)->with('success', 'Tarefa criada com sucesso!');
    }

    public function destroy(Tarefa $tarefa)
    {
        $lista_id = $tarefa->lista_id;
        $tarefa->delete();
        return redirect()->route('listas.show', $lista_id)->with('success', 'Tarefa excluída com sucesso!');
    }

    public function toggle(Tarefa $tarefa)
    {
        $tarefa->update(['concluida' => !$tarefa->concluida]);
        return response()->json(['success' => true, 'concluida' => $tarefa->concluida]);
    }

    public function edit(Tarefa $tarefa)
    {
        $listas = Lista::all();
        return view('tarefas.edit', compact('tarefa', 'listas'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'lista_id' => 'required|exists:listas,id',
            'concluida' => 'boolean'
        ]);

        $tarefa->update($request->all());
        return redirect()->route('listas.show', $tarefa->lista_id)->with('success', 'Tarefa atualizada com sucesso!');
    }
}
