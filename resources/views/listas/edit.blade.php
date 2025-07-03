@extends('layouts.app')

@section('titulo')
    <i class="bi bi-pencil-square me-2"></i>Editar Lista
@endsection

@section('conteudo')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-bottom">
                    <h5 class="mb-0">
                        <i class="bi bi-pencil-square me-2 text-white"></i>Editar Lista
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('listas.update', $lista) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-semibold">
                                <i class="bi bi-type me-1"></i>Título
                            </label>
                            <input 
                                type="text" 
                                name="titulo" 
                                id="titulo"
                                class="form-control @error('titulo') is-invalid @enderror" 
                                placeholder="Ex: Lista de Compras, Tarefas do Trabalho..." 
                                value="{{ old('titulo', $lista->titulo) }}"
                                required
                                autofocus
                            >
                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="descricao" class="form-label fw-semibold">
                                <i class="bi bi-text-paragraph me-1"></i>Descrição
                            </label>
                            <textarea 
                                name="descricao" 
                                id="descricao"
                                class="form-control @error('descricao') is-invalid @enderror" 
                                rows="3"
                                placeholder="Opcional - Descreva brevemente o propósito desta lista"
                            >{{ old('descricao', $lista->descricao) }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('listas.show', $lista) }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-lg me-1"></i>Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg me-1"></i>Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
