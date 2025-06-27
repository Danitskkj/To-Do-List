@extends('layouts.app')

@section('titulo')
    <i class="bi bi-plus-circle me-2"></i>Nova Tarefa
@endsection

@section('conteudo')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-bottom">
                    <h5 class="mb-0">
                        <i class="bi bi-check2-square me-2 text-primary"></i>Criar Nova Tarefa
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('tarefas.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-semibold">
                                <i class="bi bi-type me-1"></i>Título
                            </label>
                            <input 
                                type="text" 
                                name="titulo" 
                                id="titulo"
                                class="form-control @error('titulo') is-invalid @enderror" 
                                placeholder="Ex: Comprar leite, Terminar relatório..." 
                                value="{{ old('titulo') }}"
                                required
                                autofocus
                            >
                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label fw-semibold">
                                <i class="bi bi-text-paragraph me-1"></i>Descrição
                            </label>
                            <textarea 
                                name="descricao" 
                                id="descricao"
                                class="form-control @error('descricao') is-invalid @enderror" 
                                rows="3"
                                placeholder="Opcional - Adicione detalhes sobre esta tarefa"
                            >{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($lista_id)
                            <input type="hidden" name="lista_id" value="{{ $lista_id }}">
                            <div class="alert alert-info d-flex align-items-center mb-3">
                                <i class="bi bi-info-circle me-2"></i>
                                <span>Esta tarefa será adicionada à lista atual</span>
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="lista_id" class="form-label fw-semibold">
                                    <i class="bi bi-journal-text me-1"></i>Lista
                                </label>
                                <select 
                                    name="lista_id" 
                                    id="lista_id"
                                    class="form-select @error('lista_id') is-invalid @enderror" 
                                    required
                                >
                                    <option value="">Selecione uma lista</option>
                                    @foreach($listas as $lista)
                                        <option value="{{ $lista->id }}" {{ old('lista_id') == $lista->id ? 'selected' : '' }}>
                                            {{ $lista->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('lista_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="hidden" name="concluida" value="0">
                                <input 
                                    type="checkbox" 
                                    name="concluida" 
                                    value="1" 
                                    id="concluida"
                                    class="form-check-input"
                                    {{ old('concluida') ? 'checked' : '' }}
                                >
                                <label for="concluida" class="form-check-label">
                                    <i class="bi bi-check-circle me-1"></i>Marcar como concluída
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ $lista_id ? route('listas.show', $lista_id) : route('listas.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-lg me-1"></i>Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-plus-lg me-1"></i>Criar Tarefa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
