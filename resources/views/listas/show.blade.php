@extends('layouts.app')

@section('titulo', '')

@section('conteudo')
    <div class="mt-4 mb-5">
        <div class="text-center mb-4">
            <h1 class="display-3 fw-bold text-white mb-2">{{ $lista->titulo }}</h1>
            @if($lista->descricao)
                <p class="text-white-50 mb-0" style="opacity: 0.7; font-size: 0.95rem; max-width: 500px; margin: 0 auto;">{{ $lista->descricao }}</p>
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3 list-actions-header">
            <a href="{{ route('listas.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Voltar às Listas
            </a>
            <a href="{{ route('tarefas.create') }}?lista_id={{ $lista->id }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Nova Tarefa
            </a>
        </div>
    </div>

    @if($lista->tarefas->count() > 0)
        <div class="card">
            <div class="card-body">
                @foreach($lista->tarefas as $tarefa)
                    <div class="task-item">
                        <div class="d-flex align-items-center">
                            <div class="form-check me-3">
                                <input 
                                    class="form-check-input task-checkbox" 
                                    type="checkbox" 
                                    data-task-id="{{ $tarefa->id }}"
                                    {{ $tarefa->concluida ? 'checked' : '' }}
                                >
                            </div>
                            <div class="task-content flex-grow-1">
                                <h6 class="mb-1 {{ $tarefa->concluida ? 'text-completed' : '' }} text-white">
                                    {{ $tarefa->titulo }}
                                </h6>
                                @if($tarefa->descricao)
                                    <small class="text-muted {{ $tarefa->concluida ? 'text-completed' : '' }}">
                                        {{ $tarefa->descricao }}
                                    </small>
                                @endif
                            </div>
                            <div class="task-actions">
                                <form method="POST" action="{{ route('tarefas.destroy', $tarefa) }}" class="d-inline" 
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Excluir tarefa">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-check2-square display-4 text-primary opacity-50"></i>
            </div>
            <h5 class="text-muted">Nenhuma tarefa criada ainda</h5>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.task-checkbox');
            
            checkboxes.forEach(function(checkbox) {
                updateCheckboxVisual(checkbox);
                
                checkbox.addEventListener('change', function() {
                    const taskId = this.dataset.taskId;
                    const isChecked = this.checked;
                    
                    updateCheckboxVisual(this);
                    updateTaskTextState(this, isChecked);
                    
                    fetch(`/tarefas/${taskId}/toggle`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) {
                            this.checked = !isChecked;
                            updateCheckboxVisual(this);
                            updateTaskTextState(this, !isChecked);
                        }
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                        this.checked = !isChecked;
                        updateCheckboxVisual(this);
                        updateTaskTextState(this, !isChecked);
                    });
                });
            });
            
            function updateCheckboxVisual(checkbox) {
                if (checkbox.checked) {
                    checkbox.style.background = 'linear-gradient(135deg, var(--purple-4), var(--purple-5))';
                } else {
                    checkbox.style.background = 'var(--card-dark)';
                }
            }
            
            function updateTaskTextState(checkbox, isChecked) {
                const taskItem = checkbox.closest('.task-item');
                const textElements = taskItem.querySelectorAll('h6, small');
                
                textElements.forEach(function(element) {
                    if (isChecked) {
                        element.classList.add('text-completed');
                    } else {
                        element.classList.remove('text-completed');
                    }
                });
            }
        });
    </script>
@endsection
