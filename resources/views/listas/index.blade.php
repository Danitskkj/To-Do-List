@extends('layouts.app')

@section('titulo')
    <i class="bi bi-list-ul me-2"></i>Listas
@endsection

@section('conteudo')
    <div class="mt-5 mb-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div></div>
            <a href="{{ route('listas.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Nova Lista
            </a>
        </div>
    </div>

    @if($listas->count() > 0)
        <div class="d-flex flex-column gap-3">
            @foreach($listas as $lista)
                <div class="card shadow-sm position-relative" onclick="window.location.href='{{ route('listas.show', $lista) }}'">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0 text-white">{{ $lista->titulo }}</h5>
                                @if($lista->descricao)
                                    <p class="card-text text-muted mb-0 small mt-2">{{ Str::limit($lista->descricao, 100) }}</p>
                                @endif
                            </div>
                            <div class="d-flex gap-2 ms-3" onclick="event.stopPropagation();">
                                <a href="{{ route('listas.edit', $lista) }}" class="btn btn-outline-primary btn-sm" title="Editar lista">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('listas.destroy', $lista) }}" class="d-inline" 
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta lista e todas as suas tarefas?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Excluir lista">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-journal-plus display-4 text-muted opacity-50"></i>
            </div>
            <h5 class="text-muted">Nenhuma lista criada ainda</h5>
        </div>
    @endif
@endsection
